<?php include (TEMPLATEPATH . '/header2.php'); ?>


<h1 class="entry-title"><?php bp_page_title() ?></h1>

<div class="title_box_shadow"></div>
<div id="container">
<div id="content" class="left" >
<div class="entry-content">

<div class="activity no-ajax">
	<?php if ( bp_has_activities( 'display_comments=threaded&include=' . bp_current_action() ) ) : ?>

		<ul id="activity-stream" class="activity-list item-list">
		<?php while ( bp_activities() ) : bp_the_activity(); ?>

			<?php locate_template( array( 'activity/entry.php' ), true ) ?>

		<?php endwhile; ?>
		</ul>

	<?php endif; ?>
</div>
		</div><!--.entry content-->
		</div><!-- #content -->
		<div id="sidebar_right">
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
		</div><!--#sidebar_right-->

	</div><!-- #container -->
<?php get_footer() ?>