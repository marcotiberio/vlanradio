<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'artistMeta',
        'title' => 'Info Artist',
        'style' => '',
        'fields' => [
            [
                'label' => __('Social Media', 'flynt'),
                'name' => 'socialMedia',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Soundcloud', 'flynt'),
                'name' => 'artistSoundcloud',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ],
            [
                'label' => __('Instagram', 'flynt'),
                'name' => 'artistInstagram',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ],
            [
                'label' => __('Facebook', 'flynt'),
                'name' => 'artistFacebook',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ],
            [
                'label' => __('Mixcloud', 'flynt'),
                'name' => 'artistMixcloud',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ],
            [
                'label' => __('Bandcamp', 'flynt'),
                'name' => 'artistBandcamp',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ],
            [
                'label' => __('Website', 'flynt'),
                'name' => 'artistWebsite',
                'type' => 'url',
                'wrapper' => [
                    'width' => '33',
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'artist',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'acf_after_title',
    ]);
    ACFComposer::registerFieldGroup([
        'name' => 'artistComponents',
        'title' => 'Artist Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'artistComponents',
                'label' => __('Artist Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockArtistSelect\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockLatestEpisodeSelect\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\GridRelatedEpisodes\getACFLayout(),
                    Components\ListSocialArtist\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'artist',
                ],
            ],
        ],
    ]);
});
