<?php

namespace Flynt\Components\GridRelatedEpisodes;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=GridRelatedEpisodes', function ($data) {
    $postType = POST_TYPE;

    $data['taxonomies'] = $data['taxonomies'] ?: [];

    $data['items'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        'tax_query' => array(
            array(
                'taxonomy' => 'artist_taxonomy',
                'field' => 'label',
                'terms' => join(',', array_map(function ($taxonomy) {
                    return $taxonomy->term_id;
                }, $data['taxonomies'])),
            )
        ),
        'posts_per_page' => $data['options']['columns'],
        'ignore_sticky_posts' => 1,
        'post__not_in' => array(get_the_ID())
    ]);

    $data['postTypeArchiveLink'] = get_post_type_archive_link($postType);

    return $data;
});

// add_filter('Flynt/addComponentData?name=GridRelatedPosts', function ($data) {
//     $postType = POST_TYPE;

//     $data['taxonomies'] = $data['taxonomies'] ?: [];

//     $data['items'] = Timber::get_posts([
//         'post_status' => 'publish',
//         'post_type' => $postType,
//         'category' => join(',', array_map(function ($taxonomy) {
//             return $taxonomy->term_id;
//         }, $data['taxonomies'])),
//         'posts_per_page' => $data['options']['columns'],
//         'ignore_sticky_posts' => 1,
//         'post__not_in' => array(get_the_ID())
//     ]);

//     $data['postTypeArchiveLink'] = get_post_type_archive_link($postType);

//     return $data;
// });

function getACFLayout()
{
    return [
        'name' => 'GridRelatedEpisodes',
        'label' => 'Grid: Related Episodes',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'preContent',
                'type' => 'text',
                'media_upload' => 0,
                'delay' => 1,
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
            ],
            [
                'label' => __('Categories', 'flynt'),
                'name' => 'taxonomies',
                'type' => 'taxonomy',
                'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
                'taxonomy' => 'artist_taxonomy',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'multiple' => 1,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object'
            ],
            // [
            //     'label' => __('Categories', 'flynt'),
            //     'name' => 'taxonomies',
            //     'type' => 'taxonomy',
            //     'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
            //     'taxonomy' => 'category',
            //     'field_type' => 'multi_select',
            //     'allow_null' => 1,
            //     'multiple' => 1,
            //     'add_term' => 0,
            //     'save_terms' => 0,
            //     'load_terms' => 0,
            //     'return_format' => 'object'
            // ],
        ]
    ];
}

Options::addTranslatable('GridRelatedEpisodes', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Reading Time', 'flynt'),
                'name' => 'readingTime',
                'type' => 'text',
                'default_value' => 'min',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('All Posts', 'flynt'),
                'name' => 'allPosts',
                'type' => 'text',
                'default_value' => 'See More Posts',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Read More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => 'Read More',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ]
        ],
    ]
]);
