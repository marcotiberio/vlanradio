<?php

namespace Flynt\Components\BlockSoundcloudOembed;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockSoundcloudOembed',
        'label' => 'Block: Soundcloud Oembed',
        'sub_fields' => [
            // [
            //     'label' => __('Soundcloud', 'flynt'),
            //     'name' => 'soundcloudOembed',
            //     'type' => 'oembed',
            //     'required' => 0
            // ],
            [
                'label' => '',
                'name' => 'soundcloudOembedText',
                'type' => 'textarea',
                'instructions' => __('Copy here the embed code from Soundcloud.', 'flynt'),
                'required' => 0
            ]
        ]
    ];
}
