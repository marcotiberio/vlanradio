<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

$context = Timber::get_context();
$context['post'] = new Post();
$context['posts'] = new PostQuery();
$today = date('d.m.Y', strtotime('+2 hours'));
$now = date('g:i a');

$context['nowEpisode'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'offset' => 1,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dateEpisode',
            'value' => date('Y-m-d'),
            'compare' => '=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'timeEpisode',
            'value' => date('g:i a'),
            'compare' => '>=',
            'type' => 'TIME'
        ),
    )
    // 'meta_query' => array(
    //     'relation' => 'AND',
    //     array(
    //         'key' => 'dateEpisode',
    //         'value' => $today,
    //         'compare' => '>=',
    //         'type' => 'DATE'
    //     ),
    // array(
    //     'key' => 'timeEpisode',
    //     'value' => $now,
    //     'compare' => '=',
    //     'type' => 'TIME'
    // ),
    // array(
    //     'key' => 'timeEpisode',
    //     'value' => date('g:i a', strtotime('+1 hours')),
    //     'compare' => '<',
    //     'type' => 'TIME'
    // )
]);

$context['comingEpisodes'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'offset' => 1,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dateEpisode',
            'value' => date('Y-m-d'),
            'compare' => '>=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'timeEpisode',
            'value' => date('g:i a'),
            'compare' => '>=',
            'type' => 'TIME'
        ),
    )
]);

Timber::render('templates/page-liveeez.twig', $context);
