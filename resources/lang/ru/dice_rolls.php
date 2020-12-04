<?php

return [
    'create'        => [
        'description'   => 'Создание нового броска костей',
        'success'       => 'Бросок костей ":name" создан',
        'title'         => 'Новый бросок костей',
    ],
    'destroy'       => [
        'dice_roll' => 'Бросок костей удален',
        'success'   => 'Бросок костей ":name" удален',
    ],
    'edit'          => [
        'description'   => 'Редактирование броска костей',
        'success'       => 'Бросок костей ":name" обновлен',
        'title'         => 'Редактирование броска костей :name',
    ],
    'fields'        => [
        'created_at'    => 'Бросок совершен в',
        'name'          => 'Название',
        'parameters'    => 'Параметры костей (дайсов)',
        'results'       => 'Результаты',
        'rolls'         => 'Броски',
    ],
    'hints'         => [
        'parameters'    => 'Какие варианты бросков у меня есть?',
    ],
    'index'         => [
        'actions'       => [
            'dice'      => 'Броски костей',
            'results'   => 'Результаты',
        ],
        'add'           => 'Новый бросок костей',
        'description'   => 'Управление бросками костей :name.',
        'header'        => 'Броски костей :name',
        'title'         => 'Броски костей',
    ],
    'placeholders'  => [
        'dice_roll' => 'Бросок костей',
        'name'      => 'Название броска костей',
        'parameters'=> '4d6+3',
    ],
    'results'       => [
        'actions'   => [
            'add'   => 'Бросить кости',
        ],
        'error'     => 'Не удалось выполнить бросок. Недействительные параметры.',
        'fields'    => [
            'creator'   => 'Создатель',
            'date'      => 'Дата',
            'result'    => 'Результат',
        ],
        'hint'      => 'Все броски для этого шаблона бросков выполнены.',
        'success'   => 'Кости брошены',
    ],
    'show'          => [
        'description'   => 'Детальный вид броска костей',
        'tabs'          => [
            'results'   => 'Результаты',
        ],
        'title'         => 'Бросок костей :name',
    ],
];
