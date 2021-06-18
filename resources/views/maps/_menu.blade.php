<div class="box box-solid">
    <div class="box-body box-profile">
        @if (!View::hasSection('entity-header'))
        @include ('cruds._image')
        @include('entities.components.links')
        @endif

        <ul class="list-group list-group-unbordered">
            @if (!empty($model->map))
                <li class="list-group-item">
                    <b>{{ trans('maps.fields.maps') }}</b>
                    <span class="pull-right">
                        {!! $model->map->tooltipedLink() !!}
                    </span>
                    <br class="clear" />
                </li>
            @endif
            @include('cruds.lists.location')
            @include('cruds.lists.type')
            @include('entities.components.relations')
            @include('entities.components.attributes')
            @include('entities.components.tags')
        </ul>
    </div>
</div>

@includeWhen(!isset($exporting), 'entities.components.menu')
@includeWhen(auth()->check() && !isset($exporting), 'entities.components.actions')
