<?php
/**
 * Implement theme metabox.
 *
 * @package corporate-hub
 */

if ( ! function_exists( 'corporate_hub_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'theme-settings',
				esc_html__( 'Single Page/Post Settings', 'corporate-hub' ),
				'corporate_hub_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'corporate_hub_add_theme_meta_box' );

if ( ! function_exists( 'corporate_hub_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function corporate_hub_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$corporate_hub_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'corporate_hub_meta_box_nonce' );
		// Fetch Options list.
		$corporate_hub_global_layout = corporate_hub_get_option('global-layout');
		$corporate_hub_single_image_layout = corporate_hub_get_option('single-post-image-layout');
	?>
	<div id="corporate-hub-settings-metabox-container" class="corporate-hub-settings-metabox-container">
		<div id="corporate-hub-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'corporate-hub' ); ?></h4>
			<div class="corporate-hub-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="corporate-hub-row-content">
				         <label for="corporate-hub-meta-checkbox">
				             <input type="checkbox" name="corporate-hub-meta-checkbox" id="corporate-hub-meta-checkbox" value="yes" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-checkbox'] ) ) checked( $corporate_hub_post_meta_value['corporate-hub-meta-checkbox'][0], 'yes' ); ?> />
				             <?php _e( 'Check To Use Featured Image As Banner Image', 'corporate-hub' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="corporate-hub-meta-select-layout" class="corporate-hub-row-title">
			                <?php _e( 'Single Page/Post Layout', 'corporate-hub' )?>
			            </label>
			            <select name="corporate-hub-meta-select-layout" id="corporate-hub-meta-select-layout">
			            	<?php if ($corporate_hub_global_layout == 'right-sidebar') { ?>
			                	<option value="right-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'corporate-hub' )?></option>';
				                <option value="left-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'corporate-hub' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'corporate-hub' )?></option>';
			            	<?php }
			            		elseif ($corporate_hub_global_layout == 'left-sidebar') { ?>
				                <option value="left-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'corporate-hub' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'corporate-hub' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'corporate-hub' )?></option>';
			            	<?php }
			            		elseif ($corporate_hub_global_layout == 'no-sidebar'){ ?>
				                <option value="no-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'corporate-hub' )?></option>';
			            	    <option value="left-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'corporate-hub' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'corporate-hub' )?></option>';
			            	<?php } ?>
			            </select>
			        </p>

		         <!-- Select Field-->
		            <p>
		                <label for="corporate-hub-meta-image-layout" class="corporate-hub-row-title">
		                    <?php _e( 'Single Page/Post Image Layout', 'corporate-hub' )?>
		                </label>
		                <select name="corporate-hub-meta-image-layout" id="corporate-hub-meta-image-layout">
		                	<?php if ($corporate_hub_single_image_layout == 'full') { ?>
		                    	<option value="full" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'corporate-hub' )?></option>';
		    	                <option value="right" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'corporate-hub' )?></option>';
		    	                <option value="left" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'corporate-hub' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'corporate-hub' )?></option>';
		                	<?php }
		                		elseif ($corporate_hub_single_image_layout == 'right') { ?>
		    	                <option value="right" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'corporate-hub' )?></option>';
		    	                <option value="full" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'corporate-hub' )?></option>';
		    	                <option value="left" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'corporate-hub' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'corporate-hub' )?></option>';
		                	<?php }
		                		elseif ($corporate_hub_single_image_layout == 'left'){ ?>
		                		<option value="left" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'corporate-hub' )?></option>';
		                		<option value="right" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'corporate-hub' )?></option>';
		                		<option value="full" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'corporate-hub' )?></option>';
		                		<option value="no-image" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'corporate-hub' )?></option>';
		                	<?php }
		                		elseif ($corporate_hub_single_image_layout == 'no-image'){ ?>
		                		<option value="no-image" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'corporate-hub' )?></option>';
		                		<option value="right" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'corporate-hub' )?></option>';
		                		<option value="full" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'corporate-hub' )?></option>';
		                		<option value="left" <?php if ( isset ( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'] ) ) selected( $corporate_hub_post_meta_value['corporate-hub-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'corporate-hub' )?></option>';
		                	<?php } ?>
		                </select>
		            </p> 
			</div><!-- .corporate-hub-row-content -->
		</div><!-- #corporate-hub-settings-metabox-tab-layout -->
	</div><!-- #corporate-hub-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'corporate_hub_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function corporate_hub_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['corporate_hub_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['corporate_hub_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

			// Checks for input and saves (checkbox)
			    if( isset( $_POST[ 'corporate-hub-meta-checkbox' ] ) ) {
			    	   $valid_values = array(
                       'yes',
                       '',
   						);
			    	$new = sanitize_text_field($_POST['corporate-hub-meta-checkbox'],'yes');
			    	if( in_array( $new, $valid_values ) ) {
				    	update_post_meta($post_id, 'corporate-hub-meta-checkbox', $new);
			    	}
			    } else {
			    	$valid_values = array(
                       'yes',
                       '',
   					);
			    	$new = sanitize_text_field($_POST['corporate-hub-meta-checkbox'],'');
			    	if( in_array( $new, $valid_values ) ) {
			    		update_post_meta($post_id, 'corporate-hub-meta-checkbox', $new);
			    	}
			    }

			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'corporate-hub-meta-select-layout' ] ) ) {
			  		$valid_values = array(
                       'right-sidebar',
                       'left-sidebar',
                       'no-sidebar',
   					);
			  		$new = sanitize_text_field($_POST['corporate-hub-meta-select-layout']);
			  		if( in_array( $new, $valid_values ) ) {
			  			update_post_meta($post_id, 'corporate-hub-meta-select-layout', $new);
			  		}
			  	}
			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'corporate-hub-meta-image-layout' ] ) ) {
			  		$valid_values = array(
                       'full',
                       'right',
                       'left',
                       'no-image',
   					);
			  		$new = sanitize_text_field($_POST['corporate-hub-meta-image-layout']);
			  		if( in_array( $new, $valid_values ) ) {
				  		update_post_meta($post_id, 'corporate-hub-meta-image-layout', $new);
			  		}
			  	}
	}

endif;

add_action( 'save_post', 'corporate_hub_save_theme_settings_meta', 10, 3 );