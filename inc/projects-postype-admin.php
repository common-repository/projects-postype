<?php


if ( !function_exists( 'projects_postype_manage_columns_for_projects' ) ) {

    function projects_postype_manage_columns_for_projects( $columns ) {

        unset( $columns['comments'] );
        unset( $columns['author'] );

        $columns['project_type'] = 'Project Type';
        $columns['client_name'] = 'Client';
        $columns['featured_image'] = 'Featured Image';

        return $columns;

    }

}


if ( !function_exists( 'projects_postype_populate_projects_columns' ) ) {

    function projects_postype_populate_projects_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'project_type' :
                $projects_postype_project_type = get_the_term_list( $post_id, 'project-type', '', ' / ', '' );
                if( is_string( $projects_postype_project_type ) ) {
                    echo $projects_postype_project_type;
                } else {
                    echo _e( 'This projects has no project type', 'projects-postype' );
                }
                break;

            case 'client_name' :
                $projects_postype_client_name = get_post_meta( $post_id, 'client_name', true );
                if( $projects_postype_client_name != '' ) {
                    echo $projects_postype_client_name;
                } else {
                    echo _e( 'This projects has no client', 'projects-postype' );
                }
                break;

            case 'featured_image' :
                $projects_postype_featured_image = get_the_post_thumbnail( $post_id, array(100,100) );
                if ( has_post_thumbnail( $post_id ) )
                    echo $projects_postype_featured_image;
                else
                    _e( 'This page has no featured image', 'projects-postype' );
                break;

        }

    }

}


if ( !function_exists( 'projects_postype_custom_admin_css' ) ) {

    function projects_postype_custom_admin_css() {

        echo
        '<style>
            .post-type-projects .column-title,
            .post-type-projects .column-date,
            .post-type-projects .column-featured_image,
            .post-type-projects .column-project_type,
            .post-type-projects .column-client_name { width: 25% !important; }
        </style>';

    }

}


add_filter( 'manage_projects_posts_columns', 'projects_postype_manage_columns_for_projects' );
add_action( 'manage_projects_posts_custom_column' , 'projects_postype_populate_projects_columns', 10, 2 );
add_action( 'admin_head', 'projects_postype_custom_admin_css' );


?>
