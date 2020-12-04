<?php

return [
    'actions'       => [
        'add'   => 'Новая заметка объекта',
    ],
    'create'        => [
        'description'   => 'Создание новой заметки объекта',
        'success'       => 'Заметка ":name" добавлена объекту ":entity"',
        'title'         => 'Новая заметка объекта :name',
    ],
    'destroy'       => [
        'success'   => 'Заметка ":name" объекта ":entity" удалена',
    ],
    'edit'          => [
        'description'   => 'Обновление существующей заметки объекта',
        'success'       => 'Заметка ":name" объекта ":entity" обновлена',
        'title'         => 'Обновление заметки объекта :name',
    ],
    'fields'        => [
        'creator'   => 'Создатель',
        'entry'     => 'Текст',
        'name'      => 'Название',
    ],
    'hint'          => 'Информацию, которая не подходит под стандартные поля объекта или должна быть приватной, можно добавить в заметки объекта.',
    'index'         => [
        'title' => 'Заметки объекта :name',
    ],
    'placeholders'  => [
        'name'  => 'Название заметки, наблюдения или поправки',
    ],
    'show'          => [
        'title' => 'Заметка :name объекта :entity',
    ],
];
