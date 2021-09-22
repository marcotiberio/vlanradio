<?php

/*** Rename Default Post Type ***/

add_filter('post_type_labels_post', 'episode_rename_labels');

/**
* Rename default post type to news
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function episode_rename_labels($labels)
{
    # Labels
    $labels->name = 'Episodes';
    $labels->singular_name = 'Episode';

    # Menu
    $labels->menu_name = 'Episodes';
    $labels->name_admin_bar = 'Episode';

    return $labels;
}
