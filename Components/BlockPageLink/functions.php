<?php

namespace Flynt\Components\BlockPageLink;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockPageLink',
        'label' => 'Block: Page Link',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Page Link', 'flynt'),
                'name' => 'pageLink',
                'type' => 'link',
                'return_format' => 'url',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Page Title', 'flynt'),
                'name' => 'pageTitle',
                'type' => 'text',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ]
            ]
        ]
    ];
}
