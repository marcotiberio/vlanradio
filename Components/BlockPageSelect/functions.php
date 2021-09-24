<?php

namespace Flynt\Components\BlockPageSelect;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'page';

add_filter('Flynt/addComponentData?name=BlockPageSelect', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockPageSelect',
        'label' => 'Block: Page Select',
        'sub_fields' => [
            [
                'label' => __('Title', 'flynt'),
                'name' => 'titleTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 0,
                'step' => 1,
            ],
            [
                'label' => __('Content Selection', 'flynt'),
                'name' => 'contentSelectionTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Artist', 'flynt'),
                'name' => 'artist',
                'type' => 'relationship',
                // 'post_type' => [
                //     'post'
                // ],
                'allow_null' => 0,
                'multiple' => 0,
                // 'return_format' => 'post_object',
                'ui' => 1,
                'required' => 0,
            ]
        ]
    ];
}
