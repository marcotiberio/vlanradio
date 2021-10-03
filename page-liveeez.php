<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

$context = Timber::get_context();
$context['post'] = new Post();
$context['posts'] = new PostQuery();
$today = date('Ymd');

// $today = date('Ymd');

// Find today's day of the week.
// $today = date('l');
// $today = strtolower( $today );

// Find current time.
$time = date('H:i:s');

$context['nowEpisode'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => 1,
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dateEpisode',
            'value' => $today,
            'compare' => '=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'timeEpisode',
            'compare' => '>=',
            'value' => $time,
            'type' => 'TIME'
        ),
        array(
            'key' => 'timeEpisodeEnd',
            'compare' => '<=',
            'value' => $time,
            'type' => 'TIME'
        )
    )
]);

// $context['standard'] = Timber::get_posts([
//     'post_type' => 'post',
//     'posts_per_page' => -1,
//     'order' => 'ASC',
//     'meta_query' => array(
//         array(
//             'key' => 'dateEpisode',
//             'value' => $today,
//             'compare' => '=',
//             'type' => 'DATE'
//     ))
// ]);

// $context['nowEpisode'] = Timber::get_posts([
//     'post_type' => 'post',
//     'posts_per_page' => -1,
//     'orderby' => 'timeEpisode',
//     'order' => 'DESC',
//     'meta_query' => array(
//         'relation' => 'AND',
//         array(
//             'key' => 'dateEpisode',
//             'value' => date('Y-m-d'),
//             'compare' => '>=',
//             'type' => 'DATE'
//         ),
//         array(
//             'key' => 'timeEpisode',
//             'value' => date('g:i a'),
//             'compare' => '>=',
//             'type' => 'TIME'
//         ),
//     )
// ]);

$context['comingEpisodes'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'DESC',
    'offset' => 1,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dateEpisode',
            'value' => $today,
            'compare' => '=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'timeEpisode',
            'compare' => '>',
            'value' => $time,
            'type' => 'TIME'
        ),
        // array(
        //     'key' => 'timeEpisodeEnd',
        //     'compare' => '<=',
        //     'value' => $time,
        //     'type' => 'TIME'
        // )
    )
]);

Timber::render('templates/page-liveeez.twig', $context);
