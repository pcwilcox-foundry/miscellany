<?php

return [
    'actions'                   => [
        'actions'           => 'Acciones',
        'apply'             => 'Aplicar',
        'back'              => 'Atrás',
        'copy'              => 'Copiar',
        'copy_mention'      => 'Copiar mención [ ]',
        'copy_to_campaign'  => 'Copiar a campaña',
        'explore_view'      => 'Vista anidada',
        'export'            => 'Exportar',
        'find_out_more'     => 'Saber más',
        'go_to'             => 'Ir a :name',
        'json-export'       => 'Exportar (JSON)',
        'move'              => 'Mover',
        'new'               => 'Nuevo',
        'next'              => 'Siguiente',
        'reset'             => 'Restablecer',
    ],
    'add'                       => 'Añadir',
    'alerts'                    => [
        'copy_mention'  => 'La mención avanzada de la entidad se ha copiado al portapapeles.',
    ],
    'attributes'                => [
        'actions'       => [
            'add'               => 'Añadir atributo',
            'add_block'         => 'Añadir bloque',
            'add_checkbox'      => 'Añadir casilla',
            'add_text'          => 'Añadir texto',
            'apply_template'    => 'Aplicar plantilla de atributos',
            'manage'            => 'Administrar',
            'more'              => 'Más opciones',
            'remove_all'        => 'Eliminar todos',
        ],
        'create'        => [
            'description'   => 'Crear nuevo atributo',
            'success'       => 'Atributo :name añadido a :entity.',
            'title'         => 'Nuevo atributo para :name',
        ],
        'destroy'       => [
            'success'   => 'Atributo :name de :entity eliminado.',
        ],
        'edit'          => [
            'description'   => 'Actualizar un atributo existente',
            'success'       => 'Atributo :name de :entity actualizado.',
            'title'         => 'Actualizar atributo de :name',
        ],
        'fields'        => [
            'attribute'             => 'Atributo',
            'community_templates'   => 'Plantillas de la comunidad',
            'is_private'            => 'Atributos privados',
            'is_star'               => 'Fijado',
            'template'              => 'Plantilla',
            'value'                 => 'Valor',
        ],
        'helpers'       => [
            'delete_all'    => '¿Seguro que quieres eliminar todos los atributos de esta entidad?',
        ],
        'hints'         => [
            'is_private'    => 'Oculta todos los atributos de una entidad a todos los miembros no administradores haciéndola privada.',
        ],
        'index'         => [
            'success'   => 'Atributos de :entity actualizados.',
            'title'     => 'Atributos de :name',
        ],
        'placeholders'  => [
            'attribute' => 'Número de conquistas, Iniciativa, Población...',
            'block'     => 'Nombre del bloque',
            'checkbox'  => 'Nombre de la casilla',
            'section'   => 'Nombre de la sección',
            'template'  => 'Seleccionar plantilla',
            'value'     => 'Valor del atributo',
        ],
        'template'      => [
            'success'   => 'Plantilla de atributos :name aplicada a :entity',
            'title'     => 'Aplicar plantilla de atributos a :name',
        ],
        'types'         => [
            'attribute' => 'Atributo',
            'block'     => 'Bloque',
            'checkbox'  => 'Casilla',
            'section'   => 'Sección',
            'text'      => 'Texto multilínea',
        ],
        'visibility'    => [
            'entry'     => 'El atributo se muestra en el menú de la entidad.',
            'private'   => 'Atributo visible solo para miembros con el rol "Admin".',
            'public'    => 'Atributo visible por todos los miembros.',
            'tab'       => 'El atributo se muestra solo en la pestaña de Atributos.',
        ],
    ],
    'boosted'                   => 'mejorada',
    'boosted_campaigns'         => 'Campañas mejoradas',
    'bulk'                      => [
        'actions'       => [
            'edit'  => 'Editar y etiquetar en lote',
        ],
        'age'           => [
            'helper'    => 'Puedes usar + y - antes del número para modificar la edad.',
        ],
        'delete'        => [
            'title'     => 'Eliminar múltiples entidades',
            'warning'   => '¿Seguro que quieres eliminar las entidades seleccionadas?',
        ],
        'edit'          => [
            'tagging'   => 'Acción para las etiquetas',
            'tags'      => [
                'add'       => 'Añadir',
                'remove'    => 'Eliminar',
            ],
            'title'     => 'Edición múltiple',
        ],
        'errors'        => [
            'admin'     => 'Solamente los administradores de la campaña pueden cambiar el estatus privado de las entidades.',
            'general'   => 'Ha habido un error al procesar la acción. Vuelve a intentarlo o contáctanos si el problema persiste. Mensaje de error: :hint.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Ignorar',
            ],
            'helpers'   => [
                'override'  => 'Si está seleccionado, los permisos de las entidades seleccionadas serán ignorados y usarán estos ajustes en su lugar. Si no está seleccionado, estos permisos se añadirán a los existentes.',
            ],
            'title'     => 'Cambiar permisos a varias entidades',
        ],
        'success'       => [
            'copy_to_campaign'  => '{1} :count entidad copiada a :campaign.|[2,*] :count entidades copiadas a :campaign.',
            'editing'           => '{1} Se ha actualizado :count entidad .|[2,*] Se han actualizado :count entidades.',
            'permissions'       => '{1} Permisos cambiados en :count entidad.|[2,*] Permisos cambiados en :count entidades.',
            'private'           => '{1} Ahora :count entidad es privada.|[2,*] Ahora :count entidades son privadas.',
            'public'            => '{1} Ahora :count entidad es visible|[2,*] Ahora :count son visibles.',
        ],
    ],
    'cancel'                    => 'Cancelar',
    'click_modal'               => [
        'close'     => 'Cerrar',
        'confirm'   => 'Confirmar',
        'title'     => 'Confirmar acción',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Copiar entidades a otra campaña',
        'panel'         => 'Copiar',
        'title'         => 'Copiar ":name" a otra campaña',
    ],
    'create'                    => 'Crear',
    'datagrid'                  => [
        'empty' => 'Aún no hay nada que mostrar.',
    ],
    'delete_modal'              => [
        'close'         => 'Cerrar',
        'delete'        => 'Eliminar',
        'description'   => '¿Seguro que quieres eliminar :tag?',
        'mirrored'      => 'Eliminar relación reflejada',
        'title'         => 'Eliminar',
    ],
    'destroy_many'              => [
        'success'   => '{1} Se ha eliminado :count entidad .|[2,*] Se han eliminado :count entidades.',
    ],
    'edit'                      => 'Editar',
    'errors'                    => [
        'boosted'                       => 'Esta función solo está disponible para las campañas mejoradas.',
        'node_must_not_be_a_descendant' => 'Nodo inválido (etiqueta, localización superior): sería un descendiente de sí mismo.',
    ],
    'events'                    => [
        'hint'  => 'Los eventos del calendario asociados a esta entidad se muestran aquí.',
    ],
    'export'                    => 'Exportar',
    'fields'                    => [
        'ability'               => 'Habilidad',
        'attribute_template'    => 'Plantilla de atributos',
        'calendar'              => 'Calendario',
        'calendar_date'         => 'Fecha del calendario',
        'character'             => 'Personaje',
        'colour'                => 'Color',
        'copy_attributes'       => 'Copiar atributos',
        'copy_notes'            => 'Copiar notas de la entidad',
        'creator'               => 'Creador',
        'dice_roll'             => 'Tirada de dados',
        'entity'                => 'Entidad',
        'entity_type'           => 'Tipo de entidad',
        'entry'                 => 'Entrada',
        'event'                 => 'Evento',
        'excerpt'               => 'Extracto',
        'family'                => 'Familia',
        'files'                 => 'Archivos',
        'has_image'             => 'Tiene imagen',
        'header_image'          => 'Imagen de cabecera',
        'image'                 => 'Imagen',
        'is_private'            => 'Privado',
        'is_star'               => 'Fijada',
        'item'                  => 'Objeto',
        'location'              => 'Localización',
        'map'                   => 'Mapa',
        'name'                  => 'Nombre',
        'organisation'          => 'Organización',
        'position'              => 'Posición',
        'race'                  => 'Raza',
        'tag'                   => 'Etiqueta',
        'tags'                  => 'Etiquetas',
        'timeline'              => 'Línea de tiempo',
        'tooltip'               => 'Descripción emergente',
        'type'                  => 'Tipo',
        'visibility'            => 'Visibilidad',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Haz clic para añadir o arrastra un archivo',
            'manage'    => 'Administrar archivos de la entidad',
        ],
        'errors'    => [
            'max'       => 'Has alcanzado el número máximo (:max) de archivos para esta entidad.',
            'no_files'  => 'No hay archivos.',
        ],
        'files'     => 'Archivos subidos',
        'hints'     => [
            'limit'         => 'Cada entidad puede tener un máximo de :max archivos.',
            'limitations'   => 'Formatos soportados: jpg, png, gif y pdf. Tamaño máximo de archivo: :size',
        ],
        'title'     => 'Archivos de :name',
    ],
    'filter'                    => 'Filtrar',
    'filters'                   => [
        'all'       => 'Mostrar todos los descendientes',
        'clear'     => 'Quitar filtros',
        'direct'    => 'Filtrar solo los descendientes directos',
        'filtered'  => 'Mostrando :count de :total :entity.',
        'hide'      => 'Ocultar filtros',
        'options'   => [
            'exclude'   => 'Excluir',
            'include'   => 'Incluir',
            'none'      => 'Nada',
        ],
        'show'      => 'Mostrar filtros',
        'sorting'   => [
            'asc'       => 'Ascendiente por :field',
            'desc'      => 'Descendiente por :field',
            'helper'    => 'Controla en qué orden aparecen los resultados.',
        ],
        'title'     => 'Filtros',
    ],
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Añadir fecha de calendario',
        ],
        'copy_options'  => 'Opciones de copia',
    ],
    'hidden'                    => 'Oculto',
    'hints'                     => [
        'attribute_template'    => 'Aplica una plantilla de atributos directamente al crear esta entidad.',
        'calendar_date'         => 'Las fechas de calendario hacen que sea más fácil filtrar las listas, y también fijan los eventos al calendario seleccionado.',
        'header_image'          => 'Esta imagen está situada sobre la entidad. Para obtener mejores resultados, usa una imagen apaisada.',
        'image_limitations'     => 'Formatos soportados: jpg, png y gif. Tamaño máximo del archivo: :size.',
        'image_patreon'         => '¿Cómo se puede aumentar el tamaño máximo de los archivos?',
        'is_private'            => 'Si es privada, esta entidad solo se mostrará a los miembros de la campaña que tengan el rol "Admin".',
        'is_star'               => 'Los elementos fijados aparecerán en el menú principal de la entidad.',
        'map_limitations'       => 'Formatos soportados: jpg, png, gif y svg. Tamaño máximo del archivo: :size.',
        'tooltip'               => 'Reemplaza la descripción emergente automática con el siguiente contenido.',
        'visibility'            => 'Al seleccionar "Administrador", solo los miembros con el rol de administrador podrán ver esto. "Solo yo" significa que solo tú puedes ver esto.',
    ],
    'history'                   => [
        'created'       => 'Creado por <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'created_date'  => 'Creado el <span data-toggle="tooltip" title=":realdate">:date</span>',
        'unknown'       => 'Desconocido',
        'updated'       => 'Última modificación por <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'updated_date'  => 'Última modificación <span data-toggle="tooltip" title=":realdate">:date</span>',
        'view'          => 'Historial de cambios de la entidad',
    ],
    'image'                     => [
        'error' => 'No hemos podido obtener la imagen. Puede que la página web no nos permita descargarla (típico de Squarespace o DeviantArt), o que el enlace ya no sea válido. Asegúrate también de que la imagen no supera los :size.',
    ],
    'is_not_private'            => 'Esta entidad no es privada.',
    'is_private'                => 'Esta entidad es privada y solo pueden verla los administradores.',
    'linking_help'              => '¿Como se enlazan otras entradas?',
    'manage'                    => 'Administrar',
    'move'                      => [
        'description'   => 'Mover esta entidad a otro lugar',
        'errors'        => [
            'permission'        => 'No tienes permiso para crear entidades de este tipo en la campaña seleccionada.',
            'same_campaign'     => 'Debes seleccionar otra campaña donde mover la entidad.',
            'unknown_campaign'  => 'Campaña desconocida.',
        ],
        'fields'        => [
            'campaign'  => 'Nueva campaña',
            'copy'      => 'Hacer una copia',
            'target'    => 'Nuevo tipo',
        ],
        'hints'         => [
            'campaign'  => 'También puedes intentar mover esta entidad a otra campaña.',
            'copy'      => 'Selecciona esta opción si quieres crear una copia en la nueva campaña.',
            'target'    => 'Ten en cuenta que algunos datos pueden perderse al mover un elemento de un tipo a otro.',
        ],
        'panels'        => [
            'change'    => 'Cambiar tipo de entidad',
            'move'      => 'Mover a otra campaña',
        ],
        'success'       => 'Entidad \':name\' movida.',
        'success_copy'  => 'Entidad \':name\' copiada.',
        'title'         => 'Mover :name',
    ],
    'new_entity'                => [
        'error' => 'Revisa los datos introducidos.',
        'fields'=> [
            'name'  => 'Nombre',
        ],
        'title' => 'Nueva entidad',
    ],
    'or_cancel'                 => 'o <a href=":url">Cancelar</a>',
    'panels'                    => [
        'appearance'            => 'Apariencia',
        'attribute_template'    => 'Plantilla de atributos',
        'calendar_date'         => 'Fecha de calendario',
        'entry'                 => 'Presentación',
        'general_information'   => 'Información general',
        'move'                  => 'Mover',
        'system'                => 'Sistema',
    ],
    'permissions'               => [
        'action'            => 'Acción',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Permitir',
                'deny'      => 'Denegar',
                'ignore'    => 'Ignorar',
                'remove'    => 'Quitar',
            ],
            'bulk_entity'   => [
                'allow'     => 'Permitir',
                'deny'      => 'Denegar',
                'inherit'   => 'Heredar',
            ],
            'delete'        => 'Eliminar',
            'edit'          => 'Editar',
            'entity_note'   => 'Notas de entidad',
            'read'          => 'Leer',
            'toggle'        => 'Cambiar',
        ],
        'allowed'           => 'Permitido',
        'fields'            => [
            'member'    => 'Miembro',
            'role'      => 'Rol',
        ],
        'helper'            => 'Desde aquí puedes afinar qué usuarios y roles pueden interactuar con esta entidad.',
        'helpers'           => [
            'entity_note'   => 'Permite a los usuarios crear notas dentro de esta entidad. Sin este permiso, podrán seguir viendo las notas de entidad que se muestren a todos.',
            'setup'         => 'Desde aquí puedes afinar cómo los diferentes roles y usuarios pueden interactuar con esta entidad. :allow les permitirá hacer dicha acción; :deny se la denegará, y :inherit usará el permiso que ya tenga el rol o usuario. Un usuario con una acción puesta en :allow podrá hacerla, aunque su rol esté en :deny.',
        ],
        'inherited'         => 'Este rol ya tiene este permiso en esta entidad.',
        'inherited_by'      => 'Este usuario forma parte del rol ":role", que le otorga este permiso en esta entidad.',
        'success'           => 'Permisos guardados.',
        'title'             => 'Permisos',
        'too_many_members'  => 'Esta campaña tiene demasiados miembros (>10) para poder mostrarlos todos aquí. Usa el botón de permisos en la vista de entidad para controlar los permisos detalladamente.',
    ],
    'placeholders'              => [
        'ability'       => 'Escoge una habilidad',
        'calendar'      => 'Escoge un calendario',
        'character'     => 'Escoge un personaje',
        'entity'        => 'Entidad',
        'event'         => 'Elige un evento',
        'family'        => 'Elige una familia',
        'image_url'     => 'Puedes subir una imagen desde una URL',
        'item'          => 'Elige un objeto',
        'journal'       => 'Elige un diario',
        'location'      => 'Elige una localización',
        'map'           => 'Elige un mapa',
        'organisation'  => 'Elige una organización',
        'race'          => 'Elige una raza',
        'tag'           => 'Elige una etiqueta',
    ],
    'relations'                 => [
        'actions'   => [
            'add'   => 'Añadir relación',
        ],
        'fields'    => [
            'location'  => 'Localización',
            'name'      => 'Nombre',
            'relation'  => 'Relación',
        ],
        'hint'      => 'Se pueden relacionar entidades para representar sus conexiones.',
    ],
    'remove'                    => 'Eliminar',
    'rename'                    => 'Renombrar',
    'save'                      => 'Guardar',
    'save_and_close'            => 'Guardar y cerrar',
    'save_and_copy'             => 'Guardar y copiar',
    'save_and_new'              => 'Guardar y crear nuevo',
    'save_and_update'           => 'Guardar y seguir editando',
    'save_and_view'             => 'Guardar y ver',
    'search'                    => 'Buscar',
    'select'                    => 'Seleccionar',
    'superboosted_campaigns'    => 'Campañas supermejoradas',
    'tabs'                      => [
        'abilities'     => 'Habilidades',
        'attributes'    => 'Atributos',
        'boost'         => 'Mejorar',
        'calendars'     => 'Calendarios',
        'default'       => 'Por defecto',
        'events'        => 'Eventos',
        'inventory'     => 'Inventario',
        'map-points'    => 'Puntos del mapa',
        'mentions'      => 'Menciones',
        'menu'          => 'Menú',
        'notes'         => 'Notas',
        'permissions'   => 'Permisos',
        'relations'     => 'Relaciones',
        'reminders'     => 'Recordatorios',
        'timelines'     => 'Líneas de tiempo',
        'tooltip'       => 'Descripción emergente',
    ],
    'update'                    => 'Actualizar',
    'users'                     => [
        'unknown'   => 'Desconocido',
    ],
    'view'                      => 'Ver',
    'visibilities'              => [
        'admin'         => 'Admin',
        'admin-self'    => 'Yo + Admin',
        'all'           => 'Todos',
        'self'          => 'Solo yo',
    ],
];
