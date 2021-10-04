<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockArchiveEpisodeSelect\getACFLayout(),
                    Components\BlockArtistSelect\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockLatestEpisodeSelect\getACFLayout(),
                    Components\BlockInfoShow\getACFLayout(),
                    Components\BlockPageSelect\getACFLayout(),
                    Components\BlockSchedule\getACFLayout(),
                    Components\BlockShowGrid\getACFLayout(),
                    Components\BlockSoundcloudOembed\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\FormContactForm7\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    Components\BlockPageLink\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'artist'
                ]
            ]
        ]
    ]);
});
