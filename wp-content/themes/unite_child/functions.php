<?php

//  Add new type of post "Films".
add_action('init', 'add_films_post_type', 0);
function add_films_post_type() {
    register_post_type('film', [
        'label'     => 'Films',
        'labels'    => [
            'name'                  => 'Films',
            'singular_name'         => 'Film',
            'add_new'               => 'Add New Film',
            'add_new_item'          => 'Add Film',
            'edit_item'             => 'Edit Film',
            'new_item'              => 'New Film',
            'view_item'             => 'View Film',
            'search_items'          => 'Search Films',
            'not_found'             => 'No films found.',
            'not_found_in_trash'    => 'No films found.',
            //'parent_item_colon',
            'all_items' => 'All Films',
            'archives' => 'film archives',
            //'insert_into_item',
            //'uploaded_to_this_item',
            //'featured_image',
            //'set_featured_image',
            //'remove_featured_image',
            //'use_featured_image'
            //'filter_items_list',
            //'items_list_navigation',
            //'items_list',
            //'menu_name',
            //'name_admin_bar',
            //'view_items',
            //'attributes',
        ],
        'public'        => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-video-alt3',
        //hierarchical
        'supports'      => [
            'title',
            'editor',
            //'author',
            'thumbnail',
            'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'comments',
            //'revisions',
            //'page-attributes',
            //'post-formats',
        ],
    ]);
}

// Add following taxonimies to films: Genre, Country, Year and Actors
add_action('init', 'add_films_taxonomies', 0);
function add_films_taxonomies(){
    $genre_labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Genres', 'textdomain' ),
        'all_items'         => __( 'All Genres', 'textdomain' ),
        'edit_item'         => __( 'Edit Genre', 'textdomain' ),
        'update_item'       => __( 'Update Genre', 'textdomain' ),
        'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
        'menu_name'         => __( 'Genres', 'textdomain' ),
        'separate_items_with_commas' => __('Separate genres with commas'),
    );
    $genre_args = array(
        'labels'            => $genre_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );
    register_taxonomy( 'genre',  'film', $genre_args );

    $country_labels = array(
        'name'              => _x( 'Countries', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Country', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Countries', 'textdomain' ),
        'all_items'         => __( 'All Countries', 'textdomain' ),
        'edit_item'         => __( 'Edit Country', 'textdomain' ),
        'update_item'       => __( 'Update Country', 'textdomain' ),
        'add_new_item'      => __( 'Add New Country', 'textdomain' ),
        'new_item_name'     => __( 'New Country', 'textdomain' ),
        'menu_name'         => __( 'Countries', 'textdomain' ),
        'separate_items_with_commas' => __('Separate countries with commas'),
    );
    $country_args = array(
        'labels'            => $country_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'country' ),
    );
    register_taxonomy( 'country',  'film', $country_args );

    $year_labels = array(
        'name'              => _x( 'Years', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Years', 'textdomain' ),
        'all_items'         => __( 'All Years', 'textdomain' ),
        'edit_item'         => __( 'Edit Year', 'textdomain' ),
        'update_item'       => __( 'Update Year', 'textdomain' ),
        'add_new_item'      => __( 'Add New Year', 'textdomain' ),
        'new_item_name'     => __( 'New Year', 'textdomain' ),
        'menu_name'         => __( 'Years', 'textdomain' ),
        'separate_items_with_commas' => __('Separate years with commas'),
    );
    $year_args = array(
        'labels'            => $year_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'year' ),
    );
    register_taxonomy( 'year',  'film', $year_args );

    $actors_labels = array(
        'name'              => _x( 'Actors', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Actor', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Actors', 'textdomain' ),
        'all_items'         => __( 'All Actors', 'textdomain' ),
        'edit_item'         => __( 'Edit Actor', 'textdomain' ),
        'update_item'       => __( 'Update Actor', 'textdomain' ),
        'add_new_item'      => __( 'Add New Actor', 'textdomain' ),
        'new_item_name'     => __( 'New Actor Name', 'textdomain' ),
        'menu_name'         => __( 'Actors', 'textdomain' ),
        'separate_items_with_commas' => __('Separate actors with commas'),
    );
    $actors_args = array(
        'labels'            => $actors_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'actor' ),
    );
    register_taxonomy( 'actor',  'film', $actors_args );
}
