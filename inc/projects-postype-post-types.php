<?php


/* Projects Postype Post Types
----------------------------------------------------------- */

if ( !function_exists( 'projects_postype_create_post_types' ) ) {

    function projects_postype_create_post_types() {

        $labels = array(
            'name'                => __( 'Projects', 'projects-postype' ),
            'singular_name'       => __( 'Project', 'projects-postype' ),
            'add_new'             => __( 'Add Project', 'projects-postype' ),
            'add_new_item'        => __( 'Add New Project' , 'projects-postype' ),
            'edit_item'           => __( 'Edit Project', 'projects-postype' ),
            'new_item'            => __( 'New Project', 'projects-postype' ),
            'all_items'           => __( 'All Projects', 'projects-postype' ),
            'view_item'           => __( 'View Project' , 'projects-postype' ),
            'search_items'        => __( 'Search Project' , 'projects-postype' ),
            'not_found'           => __( 'Project Not found', 'projects-postype' ),
            'not_found_in_trash'  => __( 'Project Not found in the trash', 'projects-postype' ),
        );

        $supports = array(
    		'title',
    		'editor',
    		'excerpt',
    		'thumbnail',
    		'comments',
    		'author',
    		'revisions',
    	);

        $args = array(
            'labels'             => $labels,
            'supports'           => $supports,
            'public'             => true,
            'rewrite'            => array('slug' => 'projects'),
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => 22,
            'menu_icon'          => 'dashicons-welcome-add-page',
        );

        register_post_type( 'projects', $args );

    }

}

add_action( 'init', 'projects_postype_create_post_types' );


?>
