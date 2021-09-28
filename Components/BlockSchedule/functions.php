<?php

namespace Flynt\Components\BlockSchedule;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'episode';

add_filter('Flynt/addComponentData?name=BlockSchedule', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockSchedule',
        'label' => 'Block: Schedule',
        'sub_fields' => [
            [
                'label' => __('Date', 'flynt'),
                'name' => 'titleTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Month', 'flynt'),
                'name' => 'title',
                'type' => 'date_picker',
                'required' => 0,
                'display_format' => 'm.Y',
                'return_format' => 'm.Y',
                'first_day' => 1,
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
                'post_type' => [
                    'post'
                ],
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'post_object',
                'ui' => 1,
                'required' => 0,
            ],
            // [
            //     'label' => __('Options', 'flynt'),
            //     'name' => 'optionsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => '',
            //     'name' => 'options',
            //     'type' => 'group',
            //     'layout' => 'row',
            //     'sub_fields' => [
            //         [
            //             'label' => __('Columns', 'flynt'),
            //             'name' => 'columns',
            //             'type' => 'number',
            //             'default_value' => 3,
            //             'min' => 1,
            //             'max' => 4,
            //             'step' => 1
            //         ],
            //     ]
            // ]
        ]
    ];
}
