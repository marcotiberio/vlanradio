<?php

namespace Flynt\Components\BlockShowGrid;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'episode';

add_filter('Flynt/addComponentData?name=BlockShowGrid', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockShowGrid',
        'label' => 'Block: Show Grid',
        'sub_fields' => [
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 0,
                'step' => 1,
            ],
            [
                'label' => __('Episodes', 'flynt'),
                'name' => 'contentSelectionTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Episode', 'flynt'),
                'name' => 'episode',
                'type' => 'relationship',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'post_object',
                'ui' => 1,
                'required' => 0,
            ],
        ]
    ];
}
