<?php

namespace Flynt\Components\BlockSoundcloudOembed;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockSoundcloudOembed',
        'label' => 'Block: Soundcloud Oembed',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Soundcloud', 'flynt'),
                'name' => 'soundcloudOembed',
                'type' => 'oembed',
                'required' => 1
            ]
        ]
    ];
}
