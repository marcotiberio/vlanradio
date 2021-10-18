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
$time = date('H:i:s');

$nextepisode = date('H:i:s', strtotime('+1 hours'));
$nextepisodez = date('H:i:s', strtotime('+2 hours'));

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
            'key' => 'timeEpisodeStart',
            'compare' => '>=',
            'value' => $nextepisode,
            'type' => 'TIME'
        )
    )
]);

$context['comingEpisodes'] = Timber::get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'ASC',
    // 'offset' => 1,
    // 'posts_per_page' => 3,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dateEpisode',
            'value' => $today,
            'compare' => '=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'timeEpisodeStart',
            'compare' => '>=',
            'value' => $nextepisodez,
            'type' => 'TIME'
        ),
    )
]);

Timber::render('templates/page-live.twig', $context);
