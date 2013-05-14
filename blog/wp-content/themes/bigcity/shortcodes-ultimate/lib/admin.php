<?php

	/**
	 * Register administration page
	 */
	function shortcodes_ultimate_add_admin() {
		add_theme_page( __( 'Shortcodes', 'shortcodes-ultimate' ), __( 'Shortcodes', 'shortcodes-ultimate' ), 'manage_options', 'shortcodes-ultimate', 'shortcodes_ultimate_admin_page' );
	}

	/**
	 * Administration page
	 */
	function shortcodes_ultimate_admin_page() {

		$checked_formatting = ( get_option( 'su_disable_custom_formatting' ) == 'on' ) ? ' checked="checked"' : '';
		$checked_compatibility = ( get_option( 'su_compatibility_mode' ) == 'on' ) ? ' checked="checked"' : '';
		?>

		<!-- .wrap -->
		<div class="wrap">

			<div id="icon-options-general" class="icon32"><br /></div>
			<h2><?php _e( 'Shortcodes', 'shortcodes-ultimate' ); ?></h2>

			<!-- #su-wrapper -->
			<div id="su-wrapper">

				<?php su_save_notification(); ?>

				<div class="su-pane">
					<table class="widefat fixed">
						<tr>
							<th width="100"><?php _e( 'Shortcode', 'shortcodes-ultimate' ); ?></th>
							<th width="200"><?php _e( 'Parameters', 'shortcodes-ultimate' ); ?></th>
							<th><?php _e( 'Usage', 'shortcodes-ultimate' ); ?></th>
						</tr>						
						<tr>
							<td>frame</td>
							<td>align="left|center|none|right"</td>
							<td>[frame align="center"] &lt;img src="image.jpg" alt="" /&gt; [/frame]<br/> </td>
						</tr>
						<tr>
							<td>tabs, tab</td>
							<td>title</td>
							<td>[tabs] [tab title="<?php _e( 'Tab name', 'shortcodes-ultimate' ); ?>"] <?php _e( 'Tab content', 'shortcodes-ultimate' ); ?> [/tab] [/tabs]</td>
						</tr>
						<tr>
							<td>spoiler</td>
							<td>title</td>
							<td>[spoiler title="<?php _e( 'Spoiler title', 'shortcodes-ultimate' ); ?>"] <?php _e( 'Hidden text', 'shortcodes-ultimate' ); ?> [/spoiler]</td>
						</tr>
						<tr>
							<td>divider</td>
							<td>top (<?php _e( 'optional', 'shortcodes-ultimate' ); ?>)</td>
							<td>[divider] or [divider2] To add "to top" function use [divider top="1"]</td>
						</tr>
						<tr>
							<td>spacer</td>
							<td>size</td>
							<td>[spacer size="20"]</td>
						</tr>
						<tr>
							<td>quote</td>
							<td>&mdash;</td>
							<td>[quote] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/quote]</td>
						</tr>
						<tr>
							<td>pullquote</td>
							<td>align="left|right"</td>
							<td>[pullquote align="left"] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/pullquote]</td>
						</tr>						
						<tr>
							<td>button</td>
							<td>link<br/>color="#HEX"<br/>size="1-12"<br/>style="1|2|3|4"<br/>dark (<?php _e( 'optional', 'shortcodes-ultimate' ); ?>)<br/>square (<?php _e( 'optional', 'shortcodes-ultimate' ); ?>)<br/>icon (<?php _e( 'optional', 'shortcodes-ultimate' ); ?>)</td>
							<td>[button link="#" color="#b00" size="3" style="3" dark="1" square="1" icon="image.png"] <?php _e( 'Button text', 'shortcodes-ultimate' ); ?> [/button]</td>
						</tr>
						<tr>
							<td>fancy_link</td>
							<td>color="black|white"<br/>link</td>
							<td>[fancy_link color="black" link="http://example.com/"] <?php _e( 'Read more', 'shortcodes-ultimate' ); ?> [/fancy_link]</td>
						</tr>
						<tr>
							<td>service</td>
							<td>title<br/>icon (<?php _e( 'image url', 'shortcodes-ultimate' ); ?>)<br/>size (<?php _e( 'icon size', 'shortcodes-ultimate' ); ?>)</td>
							<td>[service title="<?php _e( 'Service name', 'shortcodes-ultimate' ); ?>" icon="images/service-1.png" size="32"] <?php _e( 'Service description', 'shortcodes-ultimate' ); ?> [/service]</td>
						</tr>
						<tr>
							<td>box</td>
							<td>title<br/>color="#HEX"</td>
							<td>[box title="<?php _e( 'Box title', 'shortcodes-ultimate' ); ?>" color="#f00"] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/box]</td>
						</tr>
						<tr>
							<td>note</td>
							<td>color="#HEX"</td>
							<td>[note color="#D1F26D"] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/note]</td>
						</tr>
						<tr>
							<td>list</td>
							<td>style="star|arrow|check|cross|black|blue|green|orange|purple|red|white|yellow"</td>
							<td>[list style="check"] &lt;ul&gt; &lt;li&gt; <?php _e( 'List item', 'shortcodes-ultimate' ); ?> &lt;/li&gt; &lt;/ul&gt; [/list]</td>
						</tr>
						<tr>
							<td>column</td>
							<td>size="1-2|1-3|1-4|1-5|1-6|2-3|3-4|2-5|3-5|4-5|5-6"<br/>last (<?php _e( 'add this to last columns', 'shortcodes-ultimate' ); ?>)</td>
							<td>[column size="1-2"] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/column]<br/>[column size="1-2" last="1"] <?php _e( 'Content', 'shortcodes-ultimate' ); ?> [/column]</td>
						</tr>						
						<tr>
							<td>media</td>
							<td>url<br/>width<br/>height</td>
							<td>[media url="http://www.youtube.com/watch?v=2c2EEacfC1M"]<br/>[media url="http://vimeo.com/15069551"]<br/> You can also use width and height =""</td>
						</tr>						
					</table>
				</div>
			</div>				

			<!-- /#su-wrapper -->

		</div>
		<!-- /.wrap -->
		<?php
	}

	add_action( 'admin_menu', 'shortcodes_ultimate_add_admin' );
?>