<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Entity;

class AttributeService
{
    /**
     * @param Entity $entity
     * @param $data
     * @throws \Exception
     */
    public function saveMany(Entity $entity, $data)
    {
        // Get the existing ones to build an array of ids
        $existing = [];
        foreach ($entity->attributes()->get() as $att) {
            $existing[$att->id] = $att;
        }

        $order = 0;
        $names = array_get($data, 'name', []);
        $values = array_get($data, 'value', []);
        $types = array_get($data, 'type', []);
        $privates = array_get($data, 'is_private', []);

        foreach ($names as $id => $name) {
            // Skip empties, which are probably the templates
            if (empty($name)) {
                continue;
            }

            $value = $values[$id];
            $type = $types[$id];
            $isPrivate = !empty($privates[$id]);

            if (!empty($existing[$id])) {
                // Edit an existing attribute
                /** @var \App\Models\Attribute $attribute */
                $attribute = $existing[$id];
                $attribute->type = $type;
                $attribute->name = $name;
                $attribute->value = $value;
                $attribute->is_private = $isPrivate;
                $attribute->default_order = $order;
                $attribute->save();

                // Remove it from the list of existing ids so it doesn't get deleted
                unset($existing[$id]);
            } else {
                $attribute = Attribute::create([
                    'entity_id' => $entity->id,
                    'type' => $type,
                    'name' => $name,
                    'value' => $value,
                    'is_private' => $isPrivate,
                    'default_order' => $order,
                ]);
            }
            $order++;
        }

        // Remaining existing have been deleted
        foreach ($existing as $id => $attribute) {
            $attribute->delete();
        }
    }
}
