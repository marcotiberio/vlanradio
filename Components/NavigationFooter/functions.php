<?php

namespace Flynt\Components\NavigationFooter;

use Flynt\Utils\Options;
use Timber\Menu;
use Flynt\Shortcodes;

add_action('init', function () {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function ($data) {
    $data['maxLevel'] = 0;
    $data['menu'] = new Menu('navigation_footer');

    return $data;
});

Options::addTranslatable('NavigationFooter', [
    [
        'label' => __('General', 'flynt'),
        'name' => 'generalTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Content Left', 'flynt'),
        'name' => 'contentHtml',
        'type' => 'wysiwyg',
        'media_upload' => 0,
        'delay' => 1,
        'toolbar' => 'basic',
        'default_value' => '©&nbsp;[year] [sitetitle]',
        'wrapper' => [
            'width' => 50
        ],
    ],
    [
        'label' => __('Content Center', 'flynt'),
        'name' => 'contentCenterHtml',
        'type' => 'wysiwyg',
        'media_upload' => 0,
        'delay' => 1,
        'toolbar' => 'basic',
        'default_value' => 'VLAN (Vienna Local Artist Network) is a non-commercial online radio project founded in October 2020.',
        'wrapper' => [
            'width' => 50
        ],
    ],
    [
        'label' => __('Supported by', 'flynt'),
        'name' => 'repeaterSupporters',
        'type' => 'repeater',
        'layout' => 'table',
        'button_label' => __('Add Support Logo', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Supporter Logo', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'small',
                'library' => 'all',
                'min' => 1,
                'wrapper' => [
                    'width' => '50',
                ]
            ],
            [
                'label' => __('Supporter Link', 'flynt'),
                'name' => 'supporterLink',
                'type' => 'text',
                'wrapper' => [
                    'width' => '50',
                ]
            ]
        ]
    ],
    [
        'label' => __('Content Examples', 'flynt'),
        'name' => 'templateTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
    ],
    [
        'label' => __('Content Examples', 'flynt'),
        'name' => 'groupContentExamples',
        'instructions' => __('Want some content inspiration? Here they are!', 'flynt'),
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => sprintf(__('© %s Website Name', 'flynt'), date_i18n('Y')),
                'name' => 'messageShortcodeCopyrightYearWebsiteName',
                'type' => 'message',
                'message' => '<code>©' . htmlspecialchars('&nbsp;') . '[year] [sitetitle]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => sprintf(__('© %s Website Name — Subtitle', 'flynt'), date_i18n('Y')),
                'name' => 'messageShortcodeCopyrightYearWebsiteNameTagLine',
                'type' => 'message',
                'message' => '<code>©' . htmlspecialchars('&nbsp;') . '[year] [sitetitle] ' . htmlspecialchars('&mdash;') . ' [tagline]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ]
            ]
        ]
    ],
    Shortcodes\getShortcodeReference(),
]);
