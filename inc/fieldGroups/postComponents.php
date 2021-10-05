<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'epsiodeMeta',
        'title' => 'Info Episode',
        'style' => '',
        'fields' => [
            [
                'label' => __('Date', 'flynt'),
                'name' => 'dateEpisode',
                'type' => 'date_picker',
                'first_day' => 1,
                'wrapper' => [
                    'width' => '100',
                ]
            ],
            [
                'label' => __('Time Start', 'flynt'),
                'name' => 'timeEpisodeStart',
                'type' => 'time_picker',
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Time End', 'flynt'),
                'name' => 'timeEpisodeEnd',
                'type' => 'time_picker',
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Artist', 'flynt'),
                'name' => 'artistEpisode',
                'type' => 'link',
                'return_format' => 'url',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Show', 'flynt'),
                'name' => 'showEpisode',
                'type' => 'link',
                'return_format' => 'url',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'acf_after_title',
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'postComponents',
        'title' => 'Post Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'postComponents',
                'label' => __('Post Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockArtistSelect\getACFLayout(),
                    Components\BlockCollapse\getACFLayout(),
                    Components\BlockLatestEpisodeSelect\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockPageLink\getACFLayout(),
                    Components\BlockSoundcloudOembed\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    Components\SliderImages\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);
});
