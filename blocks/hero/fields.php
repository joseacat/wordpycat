<?php
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_hero_block',
        'title' => 'Hero',
        'fields' => [
            [
                'key' => 'field_background_desktop',
                'label' => 'Background Desktop',
                'name' => 'background-desktop',
                'type' => 'image',
                'return_format' => 'id',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_background_mobile',
                'label' => 'Background Mobile',
                'name' => 'background-mobile',
                'type' => 'image',
                'return_format' => 'id',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/' . BISIESTHEME_SLUG . '-hero',
                ],
            ],
        ],
    ]);
}