<?php

namespace Flynt\Components\BlockInfoShow;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockInfoShow',
        'label' => 'Block: Info Show',
        'sub_fields' => [
            [
                'label' => __('Title', 'flynt'),
                'name' => 'titleTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Show Link', 'flynt'),
                'name' => 'showLink',
                'type' => 'link',
                'return_format' => 'url',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Show Title', 'flynt'),
                'name' => 'showTitle',
                'type' => 'text',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Frequency', 'flynt'),
                'name' => 'frequencyTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Frequency', 'flynt'),
                'name' => 'showFrequency',
                'type' => 'text',
                'wrapper' => [
                    'width' => '100',
                ]
            ],
            [
                'label' => __('Next Epidose', 'flynt'),
                'name' => 'nextEpisodeTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Date', 'flynt'),
                'name' => 'showNextEpisode',
                'type' => 'date_picker',
                'wrapper' => [
                    'width' => '100',
                ]
            ],
        ]
    ];
}
