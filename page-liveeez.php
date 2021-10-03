<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

$context = Timber::get_context();
$context['post'] = new Post();
$context['posts'] = new PostQuery();

$context['nowEpisode'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => 1,
    'order' => 'DESC',
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
        // array(
        //     'key' => 'timeEpisode',
        //     'value' => date('g:i a', strtotime('+1 hours')),
        //     'compare' => '<',
        //     'type' => 'TIME'
        // )
    )
]);

$context['comingEpisodes'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_key' => 'dateEpisode',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'offset' => 1,
    'meta_query' => array(
        'key' => 'dateEpisode',
        'value' => date('Y-m-d'),
        'compare' => '>=',
        'type' => 'DATE'
    )
]);

Timber::render('templates/page-liveeez.twig', $context);
