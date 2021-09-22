<?php

namespace Flynt\Components\ListSocialArtist;

use Flynt\FieldVariables;
use Flynt\ComponentManager;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=ListSocialArtist', function ($data) {
    if (!empty($data['social'])) {
        $data['social'] = array_map(function ($item) {
            $componentManager = ComponentManager::getInstance();
            $componentPathFull = $componentManager->getComponentDirPath('ListSocialArtist');
            $componentPath = str_replace(trailingslashit(get_template_directory()), '', $componentPathFull);
            $item['icon'] = Asset::getContents("{$componentPath}Assets/{$item['platform']['value']}.svg");
            return $item;
        }, $data['social']);
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'listSocialArtist',
        'label' => 'Artist Social Media',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 1,
            ],
            [
                'label' => __('Social Platform', 'flynt'),
                'type' => 'repeater',
                'name' => 'social',
                'layout' => 'table',
                'button_label' => __('Add Social Link', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Platform', 'flynt'),
                        'name' => 'platform',
                        'type' => 'select',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'return_format' => 'array',
                        'choices' => [
                            'facebook' => 'Facebook',
                            'instagram' => 'Instagram',
                            'twitter' => 'Twitter',
                            'youtube' => 'Youtube',
                            'mail' => 'E-Mail',
                            'linkedin' => 'LinkedIn',
                            'xing' => 'Xing'
                        ]
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'url',
                        'type' => 'text',
                        'required' => 1
                    ]
                ]
            ]
        ]
    ];
}
