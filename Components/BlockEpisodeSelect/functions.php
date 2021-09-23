<?php

namespace Flynt\Components\BlockEpisodeSelect;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'episode';

add_filter('Flynt/addComponentData?name=BlockEpisodeSelect', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockEpisodeSelect',
        'label' => 'Block: Episode Select',
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
                'type' => 'group',
                'name' => 'titlegroup',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 0,
                        'step' => 1,
                    ],
                    [
                        'label' => __('Text Color', 'flynt'),
                        'name' => 'textColor',
                        'type' => 'color_picker',
                        'required' => 0,
                        'wrapper' => [
                            'width' => 50
                        ]
                    ],
                    [
                        'label' => __('Background Color', 'flynt'),
                        'name' => 'backgroundColor',
                        'type' => 'color_picker',
                        'required' => 0,
                        'step' => 1,
                        'wrapper' => [
                            'width' => 50
                        ]
                    ],
                ],
            ],
            [
                'label' => __('Content Selection', 'flynt'),
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
            ]
        ]
    ];
}
