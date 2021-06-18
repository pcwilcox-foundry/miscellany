<?php


namespace App\Services\Entity;


use App\Models\Character;
use App\Models\Conversation;
use App\Models\DiceRoll;
use App\Models\Entity;
use App\Models\Family;
use App\Models\Item;
use App\Models\Journal;
use App\Models\Organisation;
use App\Models\OrganisationMember;
use App\Models\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class EntityRelationService
{
    /** @var Entity */
    protected $entity;

    /** @var array Entities */
    protected $entities = [];

    /** @var array Relations */
    protected $relations = [];

    /** @var array Loaded relation IDS */
    protected $relationIds = [];

    /** @var array Mirrored IDs */
    protected $mirrors = [];

    protected $family = false;
    protected $organisation = false;

    /** @var array Entities that have had their relations already loaded */
    protected $entityIds = [];

    /** @var bool Enable or disable relations */
    protected $withRelations = true;

    /** @var bool Enable loading entities on relations */
    protected $withEntity = false;

    /**
     * @param Entity $entity
     * @return $this
     */
    public function entity(Entity $entity): self
    {
        $this->entity = $entity;
        return $this;
    }

    protected function family(bool $family = true): self
    {
        $this->family = $family;
        return $this;
    }

    protected function organisation(bool $organisation = true): self
    {
        $this->organisation = $organisation;
        return $this;
    }

    protected function withoutRelations(bool $without = true): self
    {
        $this->withRelations = !$without;
        return $this;
    }

    protected function withEntity(bool $with = true): self
    {
        $this->withEntity = $with;
        return $this;
    }

    /**
     * @return array
     */
    public function map(): array
    {
        $entityHook = 'init' . $this->entity->entityType();
        if (method_exists($this, $entityHook)) {
            $this->$entityHook();
        }

        // Other: just relations
        else {
            $this->addEntity($this->entity)
                ->withEntity()
                ->addRelations($this->entity)
                ->addParent()
                ->addLocation();
        }

        $this->cleanup();

        return ['relations' => $this->relations, 'entities' => $this->entities];
    }

    /**
     * Remove any relations that don't match up
     */
    protected function cleanup()
    {
        $relations = [];
        foreach($this->relations as $relation) {
            if (
                isset($this->entities[$relation['source']]) &&
                isset($this->entities[$relation['target']])
            ) {
                $relations[] = $relation;
            }
        }

        $this->relations = $relations;
    }

    /**
     * @param Entity $entity
     */
    protected function addEntity(Entity $entity, string $image = null): self
    {
        //dump('add entity ' . $entity->name);
        if (Arr::has($this->entities, $entity->id)) {
            return $this;
        }
        if (empty($entity->child)) {
            return $this;
        }

        $img = $image ?? $entity->child->getImageUrl(80, 80);
        if (empty($img)) {
            // Fallback?
            $img = '';
        }
        $this->entities[$entity->id] = [
            'id' => $entity->id,
            'name' => $entity->name . "\n(" . __('entities.' . $entity->type) . ')',
            'image' => $img,
            'link' => route('entities.relations.index', $entity->id),
            //'tooltip' => route('entities.tooltip', $entity->id)
        ];
        return $this;
    }

    /**
     * @param Entity $entity
     * @param bool $limitToExisting
     */
    protected function addRelations(Entity $entity): self
    {
        //dump('add relations for ' . $entity->name);
        if (Arr::has($this->entityIds, $entity->id)) {
            return $this;
        }
        $this->entityIds[$entity->id] = true;

        // Get the relations directly from this entity
        /** @var Relation[] $relations */
        $relations = $entity->relationships()
            ->select('relations.*')
            ->with('target')
            ->has('target')
            ->leftJoin('entities as t', 't.id', '=', 'relations.target_id')
            ->acl()
            ->get();

        foreach ($relations as $relation) {
            if (!$relation->target) {
                continue;
            }

            // Don't add mirrored relations
            if ($relation->mirrored()) {
                if (Arr::has($this->mirrors, $relation->mirror_id . '-' . $relation->id)) {
                    continue;
                }
            }
            // Relation already loaded
            if (in_array($relation->id, $this->relationIds)) {
                continue;
            }

            if ($this->withEntity) {
                $this->addEntity($relation->target);
            }

            $this->relations[] = [
                'source' => $relation->owner_id,
                'target' => $relation->target_id,
                'text' => $relation->relation,
                'colour' => $relation->colour,
                'attitude' => $relation->attitude,
                'type' => 'entity-relation',
                'is_mirrored' => $relation->mirrored(),
                'shape' => $relation->mirrored() ? 'none' : 'triangle',
                'edit_url' => route('entities.relations.edit', ['entity' => $relation->owner_id, 'relation' => $relation, 'from' => $this->entity->id])
            ];

            if ($relation->mirrored()) {
                $this->mirrors[$relation->id . '-' . $relation->mirror_id] = true;
            }
            $this->relationIds[] = $relation->id;
        }

        return $this;
    }

    /**
     * @return $this
     */
    protected function addFamily() : self
    {
        if (empty($this->entity->child->family)) {
            return $this;
        }

        $family = $this->entity->child->family;

        $this->addFamilyRelations($family);

        // Add relation to the family
        return $this;
    }

    /**
     * Add the family or a character and the family's members
     * @param Family $family
     */
    protected function addFamilyRelations(Family $family)
    {
        /** @var Family $family */
        $this->family()->addEntity($family->entity)->addRelations($family->entity);

        $this->addFamilyMembers($family);
    }

    /**
     * @return $this
     */
    protected function addOrganisation() : self
    {
        /** @var Character $character */
        $character = $this->entity->child;
        $organisations = $character->organisations()
            ->has('organisation')
            ->with(['organisation', 'organisation.entity'])
            ->get();
        foreach ($organisations as $org) {
            if ($org->organisation && $org->organisation->entity) {
                $this->addOrganisationRelations($org->organisation);
            }
        }
        return $this;
    }

    /**
     * @param Organisation $organisation
     */
    protected function addOrganisationRelations(Organisation $organisation)
    {
        if (empty($organisation) || empty($organisation->entity)) {
            return;
        }
        $this->organisation()->addEntity($organisation->entity);

        /** @var OrganisationMember $member */
        foreach ($organisation->members()->with('character.entity')->has('character.entity')->get() as $member) {
            if (empty($member->character->entity)) {
                return;
            }
            $this->addEntity($member->character->entity, $member->character->getImageUrl(80, 80));


            // Add relation
            $this->relations[] = [
                'source' => $organisation->entity->id,
                'target' => $member->character->entity->id,
                'text' => $member->role,
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'org-member',
                'shape' => 'none',
            ];

            // Show relations of org members if the target is shown here
            $this->addRelations($member->character->entity);

        }
    }

    /**
     * Prepare a family
     */
    protected function initFamily(): self
    {
        $this->addEntity($this->entity)
            ->withEntity()
            ->addRelations($this->entity)
            ->withEntity(false);

        $this->addFamilyMembers($this->entity->child, true);

        $this->addFamilies()
            ->addParent()
            ->addLocation()
        ;
        return $this;
    }

    /**
     * @param Family $family
     * @return $this
     */
    protected function addFamilyMembers(Family $family): self
    {
        /** @var Character $member */
        foreach ($family->members()->with(['entity', 'entity.character'])->has('entity')->get() as $member) {
            $this
                ->addEntity($member->entity, $member->entity->character->getImageUrl(80, 80))
                ->addRelations($member->entity);

            // Add relation
            $this->relations[] = [
                'source' => $family->entity->id,
                'target' => $member->entity->id,
                'text' => __('entities/relations.types.family_member'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'family-member',
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addFamilies(): self
    {
        /** @var Family $family */
        $family = $this->entity->child;

        foreach ($family->families()->with('entity')->has('entity')->get() as $subfamily) {
            $this->addEntity($subfamily->entity);
            $this->addRelations($subfamily->entity);

            $this->relations[] = [
                'source' => $subfamily->entity->id,
                'target' => $this->entity->id,
                'text' => __('families.fields.family'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'sub-family',
                'shape' => 'triangle',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function initCharacter(): self
    {
        $this->addEntity($this->entity)
            ->withEntity()
            ->addRelations($this->entity)
            ->withEntity(false)
            ->relatedRelations();

        $this->addFamily()
            ->addOrganisation()
            ->addItems()
            ->addJournals()
            ->addLocation()
            ->addDiceRolls()
            ->addConversations()
        ;

        return $this;
    }

    /**
     * @return $this
     */
    protected function initLocation(): self
    {
        $this->addEntity($this->entity)
            ->withEntity()
            ->addRelations($this->entity)
            ->withEntity(false)
            ->relatedRelations();

        $this->addItems()->addJournals()->addParent();

        return $this;
    }

    /**
     * Prepare en organisation
     * @return $this
     */
    protected function initOrganisation(): self
    {
        $this->addEntity($this->entity)
            ->withEntity()
            ->addRelations($this->entity)
            ->withEntity(false);

        $this->addOrganisationMembers($this->entity, true);

        $this->addOrganisations()->addParent();
        return $this;
    }

    protected function addOrganisationMembers(Entity $entity): self
    {
        /** @var Organisation $organisation */
        $organisation = $entity->child;

        /** @var OrganisationMember $member */
        foreach ($organisation->members()->with(['character', 'character.entity'])->has('character')->get() as $member) {
            $this
                ->addEntity($member->character->entity, $member->character->getImageUrl(80, 80))
                ->addRelations($member->character->entity);

            // Add relation
            $this->relations[] = [
                'source' => $entity->id,
                'target' => $member->character->entity->id,
                'text' => __('entities/relations.types.organisation_member'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'family-member',
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addOrganisations(): self
    {
        /** @var Organisation $organisation */
        $organisation = $this->entity->child;

        foreach ($organisation->organisations()->with('entity')->has('entity')->get() as $sub) {
            $this->addEntity($sub->entity);
            $this->addRelations($sub->entity);

            $this->relations[] = [
                'source' => $sub->entity->id,
                'target' => $this->entity->id,
                'text' => __('entities/relations.types.organisation_member'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'sub-org',
                'shape' => 'triangle',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addItems(): self
    {
        /** @var Item $item */
        foreach ($this->entity->child->items()->with('entity')->has('entity')->get() as $item) {
            $this->addEntity($item->entity);
            $this->relations[] = [
                'source' => $this->entity->id,
                'target' => $item->entity->id,
                'text' => __('crud.fields.item'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'journal-author',
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addJournals(): self
    {
        /** @var Journal $journal */
        $isCharacter = $this->entity->typeId() == config('entities.ids.character');
        foreach ($this->entity->child->journals()->with('entity')->has('entity')->get() as $journal) {
            $this->addEntity($journal->entity);
            $this->relations[] = [
                'source' => $this->entity->id,
                'target' => $journal->entity->id,
                'text' => $isCharacter ? __('journals.fields.author') : __('crud.fields.journal'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'journal-' . ($isCharacter ? 'author' : 'location'),
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addLocation(): self
    {
        if (!array_key_exists('location_id', $this->entity->child->getAttributes())) {
            return $this;
        }
        if (empty($this->entity->child->location_id) || empty($this->entity->child->location)) {
            return $this;
        }

        $this->addEntity($this->entity->child->location->entity);
        $this->relations[] = [
            'source' => $this->entity->id,
            'target' => $this->entity->child->location->entity->id,
            'text' => __('crud.fields.location'),
            'colour' => '#ccc',
            'attitude' => null,
            'type' => 'entity-location',
            'shape' => 'none',
        ];

        return $this;
    }

    /**
     * Add the entity's parent if it has one
     * @return $this
     */
    protected function addParent()
    {
        if (!method_exists($this->entity->child, 'getParentIdName')) {
            // If not part of the node model, check for the {self}_id attribute
            if (!array_key_exists($this->entity->type . '_id', $this->entity->child->getAttributes())) {
                return $this;
            }
        }

        $relationName = $this->entity->entityType();
        $parent = $this->entity->child->$relationName;
        if (empty($parent)) {
            return $this;
        }

        $transKey = $this->entity->pluralType() . '.fields.' . $this->entity->type;

        $this->addEntity($parent->entity);
        $this->relations[] = [
            'source' => $this->entity->id,
            'target' => $parent->entity->id,
            'text' => __($transKey),
            'colour' => '#ccc',
            'attitude' => null,
            'type' => 'entity-parent',
            'shape' => 'triangle',
        ];
        return $this;
    }

    /**
     * @return $this
     */
    protected function addDiceRolls(): self
    {
        /** @var DiceRoll $related */
        foreach ($this->entity->child->diceRolls()->with('entity')->has('entity')->get() as $related) {
            $this->addEntity($related->entity);
            $this->relations[] = [
                'source' => $this->entity->id,
                'target' => $related->entity->id,
                'text' => __('characters.show.tabs.dice_rolls'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'character-diceroll',
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * @return $this
     */
    protected function addConversations(): self
    {
        /** @var Conversation $related */
        foreach ($this->entity->child->conversations()->with('entity')->has('entity')->get() as $related) {
            $this->addEntity($related->entity);
            $this->relations[] = [
                'source' => $this->entity->id,
                'target' => $related->entity->id,
                'text' => __('characters.show.tabs.conversations'),
                'colour' => '#ccc',
                'attitude' => null,
                'type' => 'character-diceroll',
                'shape' => 'none',
            ];
        }
        return $this;
    }

    /**
     * Load relations between linked entities
     * @return $this
     */
    protected function relatedRelations(): self
    {
        // Go through the entities loaded and re-check their relations
        /** @var Relation $relation */
        $relatedEntityIds = [];
        foreach ($this->relations as $relation) {
            $relatedEntityIds[] = $relation['target'];
        }

        $entities = Entity::whereIn('id', $relatedEntityIds)->get();
        foreach ($entities as $entity) {
            $this->addRelations($entity);
        }
        return $this;
    }
}
