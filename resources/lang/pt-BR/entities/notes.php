<?php

return [
    'actions'       => [
        'add'       => 'Nova Nota de entidade',
        'add_role'  => 'Adicionar função',
        'add_user'  => 'Adicionar usuário',
    ],
    'create'        => [
        'description'   => 'Criar uma nova Nota de entidade',
        'success'       => 'Nota de entidade :name adicionada a :entity',
        'title'         => 'Nova nota de entidade de :name',
    ],
    'destroy'       => [
        'success'   => 'Nota de entidade :name de :entity removida',
    ],
    'edit'          => [
        'description'   => 'Atualize uma Nota existente',
        'success'       => 'Nota de entidade :name de :entity atualizada',
        'title'         => 'Atualizar Nota de :name',
    ],
    'fields'        => [
        'collapsed' => 'Fechar notas de entidade fixas por padrão',
        'creator'   => 'Criador',
        'entry'     => 'Entrada',
        'is_pinned' => 'Fixado',
        'name'      => 'Nome',
        'position'  => 'Posição fixada',
    ],
    'footer'        => [
        'created'   => 'Criado pelo :user em :date',
        'updated'   => 'Atualizado pelo :user em :date',
    ],
    'hint'          => 'As informações que não se enquadram nos campos padrão de uma entidade ou que devem ser mantidas em sigilo podem ser adicionadas como notas da entidade.',
    'hints'         => [
        'is_pinned' => 'As notas da entidade fixadas são exibidas abaixo do texto da entidade na visualização primária da entidade. Combine com o campo de posição para controlar em que ordem as notas da entidade fixadas aparecem.',
        'reorder'   => 'Você pode reordenar as notas da entidade de uma entidade clicando no ícone :icon ao lado da história no menu da entidade.',
    ],
    'index'         => [
        'title' => 'Notas de :name',
    ],
    'placeholders'  => [
        'name'  => 'Nome da Nota, observação ou comentário',
    ],
    'show'          => [
        'advanced'  => 'Permissões Avançadas',
        'title'     => 'Nota :name de :entity',
    ],
];
