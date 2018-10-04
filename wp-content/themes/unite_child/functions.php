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

//Add shortcode to show last 5 films
function add_last_films_shortcode() {
    $html = "";
    $args = array(
        'posts_per_page'   => 5,
        'offset'           => 0,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'film',
        'post_status'      => 'publish',
    );
    $last_films = new WP_Query($args);

    if( $last_films->have_posts() ) : while( $last_films->have_posts() ) : $last_films->the_post();
        $href = apply_filters('the_permalink', get_permalink());
        $title = '<p class="last-films-title">' . get_the_title() . '</p>';
        $image = '<p class="last-films-image">' . get_the_post_thumbnail(get_the_ID(), "thumbnail") . '</p> ';
        $date = get_post_meta(get_the_ID(), 'release_date', true);
        if(!empty($date)) $releaseDate = '<p class="last-films-date">' .'Release date: '.$date. '</p>';
        else $releaseDate = '';
        $html .= '<div class="last-films-item"><a href="' . $href. '" class="button">'.$title . $image. $releaseDate.'</a></div>';
        endwhile;
        $html ='<aside id="last-films">'.$html.'</aside>';
    endif;

    return $html;
}
add_shortcode('last-films', 'add_last_films_shortcode');

//Add extra info after description
function get_extra_info($postId){
    if ('film' != get_post_type()) return "";
    if (is_search()) return "";
    $separator = ", ";

    //get and prepare Country and Genre
    $taxonomy_terms = wp_get_post_terms($postId, ['country', 'genre']);
    $countries = array_filter($taxonomy_terms, function ($term) { return $term->taxonomy === 'country'; });
    $genres = array_filter($taxonomy_terms, function ($term) { return $term->taxonomy === 'genre'; });

    $countries = array_slice($countries, 0, 5);
    $genres = array_slice($genres, 0, 5);

    $countries = array_map(function ($country) { return "<a href='/country/{$country->slug}'>{$country->name}</a>"; }, $countries);
    $genres = array_map(function ($genre) { return "<a href='/genre/{$genre->slug}'>{$genre->name}</a>"; }, $genres);

    $countries_genresArr = [];
    if (count($countries)) $countries_genresArr[] = "Country: " . join($separator, $countries);
    if (count($genres)) $countries_genresArr[] = "Genre: " . join($separator, $genres);

    if(count($countries_genresArr)) $countries_genresText = '<br />'.join($separator, $countries_genresArr);
    else $countries_genresText = '';

    //get Price ticket and Release date
    $price_dateArr =[];
    $price = get_post_meta($postId, 'ticket_price', true);
    if(!empty($price)) $price_dateArr['price'] = 'Ticket price: '.$price;

    $releaseDate = get_post_meta($postId, 'release_date', true);
    if(!empty($releaseDate)) $price_dateArr['releaseDate'] = 'Release date: '.$releaseDate;

    if(count($price_dateArr)) $price_dateText = '<br />'.join($separator, $price_dateArr);
    else $price_dateText = '';

    return $price_dateText.$countries_genresText;
}
add_filter('the_content', 'film_extra_info');
function film_extra_info($content) {
    $extra_info = get_extra_info(get_the_ID());
    if (is_front_page()) {
        return $content . $extra_info;
    } else {
        return $content;
    }
}

//Unregister existing in main template sidebar
function unregister_templates_sidebar() {
    unregister_sidebar('sidebar-1');
}
add_action( 'widgets_init', 'unregister_templates_sidebar',11 );