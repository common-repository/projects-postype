<?php


/* Projects Postype Meta Boxes
----------------------------------------------------------- */

if ( !function_exists( 'projects_postype_add_meta_boxes' ) ) {

    function projects_postype_add_meta_boxes() {

        // Project Colors Meta Box
        add_meta_box(
            'projects-postype-colors-meta-box',
            esc_html__('Colors', 'projects-postype' ),
            'projects_postype_colors_meta_box',
            'projects',
            'side',
            'low'
        );

        // Project Client Meta Box
        add_meta_box(
            'projects-postype-client-metabox',
            esc_html__('Client', 'projects-postype' ),
            'projects_postype_client_meta_box',
            'projects',
            'normal',
            'high'
        );

    }

}

add_action( 'add_meta_boxes', 'projects_postype_add_meta_boxes' );


if ( !function_exists( 'projects_postype_backend_scripts' ) ) {

    function projects_postype_backend_scripts( $hook ) {

            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/js/wp-color-picker-alpha.min.js', __DIR__ ), array( 'wp-color-picker' ), false, true );

    }

}

add_action( 'admin_enqueue_scripts', 'projects_postype_backend_scripts' );


// Project Colors Callback
if ( !function_exists( 'projects_postype_colors_meta_box' ) ) {

    function projects_postype_colors_meta_box( $post ) {

    	$projects_postype_custom = get_post_custom( $post->ID );
    	$projects_postype_color_1 = ( isset( $projects_postype_custom['color_1'][0] ) ) ? $projects_postype_custom['color_1'][0] : 'rgba(221,51,51,0.9)';
        $projects_postype_color_2 = ( isset( $projects_postype_custom['color_2'][0] ) ) ? $projects_postype_custom['color_2'][0] : 'rgba(129,215,66,0.9)';
    	wp_nonce_field( 'projects_postype_colors_meta_box', 'projects_postype_colors_meta_box_nonce' );
    	?>

    	<script>
    		jQuery(document).ready(function($) {
    		    $('.wp-color-picker').each(function() {
            		$(this).wpColorPicker();
        		});
    		});
    	</script>

    	<div>
    	    <p><?php esc_attr_e('Color 1', 'projects-postype' ); ?></p>
    	    <input class="wp-color-picker" data-default-color="rgba(221,51,51,0.9)" data-alpha="true" type="text" name="color_1" value="<?php echo $projects_postype_color_1; ?>"/>
    	</div>

        <div>
    	    <p><?php esc_attr_e('Color 2', 'projects-postype' ); ?></p>
    	    <input class="wp-color-picker" data-default-color="rgba(129,215,66,0.9)" data-alpha="true" type="text" name="color_2" value="<?php echo $projects_postype_color_2; ?>"/>
    	</div>

    	<?php

    }

}


// Project Client Callback
if ( !function_exists( 'projects_postype_client_meta_box' ) ) {

    function projects_postype_client_meta_box( $post ) {

    	$projects_postype_custom = get_post_custom( $post->ID );
    	$projects_postype_client_name = ( isset( $projects_postype_custom['client_name'][0] ) ) ? $projects_postype_custom['client_name'][0] : '';
        $projects_postype_client_website_link = ( isset( $projects_postype_custom['client_website_link'][0] ) ) ? $projects_postype_custom['client_website_link'][0] : '';
		$projects_postype_client_website_name = ( isset( $projects_postype_custom['client_website_name'][0] ) ) ? $projects_postype_custom['client_website_name'][0] : '';
    	wp_nonce_field( 'projects_postype_client_meta_box', 'projects_postype_client_meta_box_nonce' );
    	?>
        <div style="margin-bottom: 5px;">
			<label for="client_name" style="display: block; width:50%;">Name:</label>
			<input type="text" name="client_name" value="<?php echo $projects_postype_client_name; ?>" style="width:60%">
		</div>
        <div style="margin-bottom: 5px;">
			<label for="client_website_link" style="display: block; width:50%;">Website Link:</label>
			<input type="text" name="client_website_link" value="<?php echo $projects_postype_client_website_link; ?>" style="width:60%">
		</div>
		<div>
			<label for="client_website_name" style="display: block; width:50%;">Website Name:</label>
			<input type="text" name="client_website_name" value="<?php echo $projects_postype_client_website_name; ?>" style="width:60%">
		</div>
    	<?php

    }

}


// Save Meta Boxes
if ( !function_exists( 'projects_postype_save_meta_boxes' ) ) {

    function projects_postype_save_meta_boxes( $post_id ) {

    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return;
    	}

    	if( !current_user_can( 'edit_pages' ) ) {
    		return;
    	}

    	// Save Color 1
    	if ( !isset( $_POST['color_1'] ) || !wp_verify_nonce( $_POST['projects_postype_colors_meta_box_nonce'], 'projects_postype_colors_meta_box' ) ) {
    		return;
    	}
    	$projects_postype_color_1 = ( isset($_POST['color_1']) && $_POST['color_1']!='' ) ? $_POST['color_1'] : '';
    	update_post_meta($post_id, 'color_1', $projects_postype_color_1);

    	// Save Color 2
        if ( !isset( $_POST['color_2'] ) || !wp_verify_nonce( $_POST['projects_postype_colors_meta_box_nonce'], 'projects_postype_colors_meta_box' ) ) {
    		return;
    	}
    	$projects_postype_color_2 = ( isset($_POST['color_2']) && $_POST['color_2']!='' ) ? $_POST['color_2'] : '';
    	update_post_meta($post_id, 'color_2', $projects_postype_color_2);

        // Save Client Name
        if ( !isset( $_POST['client_name'] ) || !wp_verify_nonce( $_POST['projects_postype_client_meta_box_nonce'], 'projects_postype_client_meta_box' ) ) {
			return;
		}
		$projects_postype_client_name = ( isset($_POST['client_name']) && $_POST['client_name']!='' ) ? $_POST['client_name'] : '';
		update_post_meta($post_id, 'client_name', $projects_postype_client_name);

		// Save Client Website Link
        if ( !isset( $_POST['client_website_link'] ) || !wp_verify_nonce( $_POST['projects_postype_client_meta_box_nonce'], 'projects_postype_client_meta_box' ) ) {
			return;
		}
		$projects_postype_client_website_link = ( isset($_POST['client_website_link']) && $_POST['client_website_link']!='' ) ? $_POST['client_website_link'] : '';
		update_post_meta($post_id, 'client_website_link', $projects_postype_client_website_link);

		// Save Client Website Name
        if ( !isset( $_POST['client_website_name'] ) || !wp_verify_nonce( $_POST['projects_postype_client_meta_box_nonce'], 'projects_postype_client_meta_box' ) ) {
			return;
		}
		$projects_postype_client_website_name = ( isset($_POST['client_website_name']) && $_POST['client_website_name']!='' ) ? $_POST['client_website_name'] : '';
		update_post_meta($post_id, 'client_website_name', $projects_postype_client_website_name);

    }

}

add_action( 'save_post', 'projects_postype_save_meta_boxes' );


?>
