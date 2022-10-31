<?php

namespace Flynt\Components\BlockCleverReach;

function getACFLayout()
{
    return [
        'name' => 'blockCleverReach',
        'label' => 'Block: Clever Reach',
        'sub_fields' => [
            [
                [
                    'label' => __('Newsletter Form by CleverReach', 'flynt'),
                    'name' => 'message',
                    'type' => 'message',
                    'message' => __('This is a standard block containing the newsletter form by CleverReach', 'flynt'),
                    'new_lines' => 'wpautop',
                    'esc_html' => 1
                ]
            ],
        ]
    ];
}
