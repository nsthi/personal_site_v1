<?php

	/*
	  Plugin Name: WP Insert Post
	  Plugin URI: http://ilovecode.ru/
	  Version: 1.0.2
	  Author: Vladimir Anokhin
	  Author URI: http://ilovecode.ru/
	  Description: Front-end posting form for guests. Usage: <code>[wp_insert_post]</code>
	  Text Domain: wp-insert-post
	  Domain Path: /languages
	  License: GPL2
	 */

	// Enable shortcodes in text widgets
	add_filter( 'widget_text', 'do_shortcode' );


	// Enqueue stylesheet
	if ( !is_admin() )
		wp_enqueue_style( 'wp-insert-post' );

	/**
	 * WP Insert Post shortcode function
	 *
	 * @return string Posting form
	 */
	function wpip_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'exclude' => '',
		'status' =>'pending'
	), $atts ) );

		$return = '<div class="wp-insert-post">';

		// Posting form
		if ( empty( $_POST['save'] ) ) {

			$dropdown_cats_args = array(
				'hide_empty' => 0,
				'echo' => 0,
				'show_count' => 0,
				'hierarchical' => 1,
				'exclude' => $exclude ,
				'name' => 'category'
			);

			$return .= '<form action="#wpip-message" method="post" class="wpip-form">';
			$return .= '<div class="wpip-box"><span class="wpip-label">' . __( 'Title', 'wp-insert-post' ) . '</span><input type="text" name="title" size="40" /></div>';
			$return .= '<div class="wpip-box"><span class="wpip-label">' . __( 'Category', 'wp-insert-post' ) . '</span>' . wp_dropdown_categories( $dropdown_cats_args ) . '</div>';
			$return .= '<div class="wpip-box"><span class="wpip-label">' . __( 'Content', 'wp-insert-post' ) . '</span><br/><textarea name="content" rows="7" cols="70"></textarea></div>';
			$return .= '<div class="wpip-box"><input type="submit" value="' . __( 'Publish', 'wp-insert-post' ) . '" /></div>';
			$return .= '<input type="hidden" name="save" value="true" />';
			$return .= '</form>';
		}

		// Data sent
		else {

			// Not specified title
			if ( empty( $_POST['title'] ) ) {
				$return .= '<div id="wpip-message" class="wpip-error">' . __( 'Specify title!', 'wp-insert-post' ) . '<br/><a href="javascript:history.go(-1)">&lsaquo; ' . __( 'Go back', 'wp-insert-post' ) . '</a></div>';
			}

			// Not specified content
			elseif ( empty( $_POST['content'] ) ) {
				$return .= '<div id="wpip-message" class="wpip-error">' . __( 'Enter content!', 'wp-insert-post' ) . '<br/><a href="javascript:history.go(-1)">&lsaquo; ' . __( 'Go back', 'wp-insert-post' ) . '</a></div>';
			}

			// Title and content specified
			else {

				// New post args
				$post_args = array(
					'post_title' => apply_filters( 'the_title', $_POST['title'] ), // заголовок записи
					'post_content' => apply_filters( 'the_content', $_POST['content'] ), // контент записи
					'post_status' => $status, // статус публикуемой записи
					'post_author' => 1, // автор записи
					'post_category' => array( $_POST['category'] ) // категоия записи
				);

				// Post added
				if ( wp_insert_post( $post_args ) ) {

					// Sucessfull message
					$return .= '<div id="wpip-message" class="wpip-success">' . __( 'Entry successfull added!', 'wp-insert-post' ) . '<br/><a href="' . get_permalink() . '">' . __( 'Add another &raquo;', 'wp-insert-post' ) . '</a></div>';

					// Redirect
					$return .= '
						<script type="text/javascript">
							setTimeout( "location.href = \'' . get_permalink() . '\';", 2000 );
						</script>
					';
				}
			}
		}

		$return .= '</div>';

		return $return;
	}

	/**
	 * Register shortcode
	 */
	add_shortcode( 'wp_insert_post', 'wpip_shortcode' );

	/**
	 * Returns current plugin version.
	 *
	 * @return string Plugin version
	 */
	function wpip_get_version() {
		if ( !function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];
	}

	/**
	 * Returns current plugin url
	 *
	 * @return string Plugin url
	 */
	function wpip_plugin_url() {
		return plugins_url( basename( __FILE__, '.php' ), dirname( __FILE__ ) );
	}

	/**
	 * Hook to translate plugin information
	 */
	function wpip_add_locale_strings() {
		$strings = __( 'Vladimir Anokhin', 'wp-insert-post' ) . __( 'Front-end posting form for guests. Usage: <code>[wp_insert_post]</code>', 'wp-insert-post' );
	}

?>