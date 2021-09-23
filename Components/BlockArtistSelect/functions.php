<?php

namespace Flynt\Components\BlockArtistSelect;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'artist';

add_filter('Flynt/addComponentData?name=BlockArtistSelect', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlockArtistSelect',
        'label' => 'Block: Artist Select',
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
                'label' => __('Artist', 'flynt'),
                'name' => 'artist',
                'type' => 'relationship',
                'post_type' => [
                    'artist'
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
