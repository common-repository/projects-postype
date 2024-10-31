<?php


/* Projects Postype Custom Taxonomies
----------------------------------------------------------- */

if ( !function_exists( 'projects_postype_create_custom_taxonomies' ) ) {

    function projects_postype_create_custom_taxonomies() {

        $labels = array(
            'name'              => __( 'Project Type', 'projects-postype' ),
            'singular_name'     => __( 'Project Type', 'projects-postype' ),
            'add_new_item'      => __( 'Add Project Type', 'projects-postype' ),
            'edit_item'         => __( 'Edit Project Type', 'projects-postype' ),
            'new_item_name'     => __( 'New Project Type', 'projects-postype' ),
            'all_items'         => __( 'All Project Types', 'projects-postype' ),
            'search_items'      => __( 'Search Project Type', 'projects-postype' ),
            'update_item'       => __( 'Update Project Type', 'projects-postype' ),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical'     => true,
            'query_var'        => true,
            'rewrite'          => array('slug' => 'project-type', 'hierarchical'  => true)
        );

        register_taxonomy( 'project-type', 'projects', $args );

    }

}

add_action( 'init', 'projects_postype_create_custom_taxonomies' );


?>
