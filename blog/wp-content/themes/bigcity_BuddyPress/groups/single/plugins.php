<?php include (TEMPLATEPATH . '/header2.php'); ?>


<h1 class="entry-title"><?php bp_page_title() ?></h1>

<div class="title_box_shadow"></div>
<div id="container">
<div id="content" class="left" >
<div class="entry-content">
			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_plugin_template' ) ?>

			<div id="item-header">
				<?php locate_template( array( 'groups/single/group-header.php' ), true ) ?>
			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav">
					<ul>
						<?php bp_get_options_nav() ?>

						<?php do_action( 'bp_group_plugin_options_nav' ) ?>
					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body">

				<?php do_action( 'bp_before_group_body' ) ?>

				<?php do_action( 'bp_template_content' ) ?>

				<?php do_action( 'bp_after_group_body' ) ?>
			</div><!-- #item-body -->

			<?php endwhile; endif; ?>

			<?php do_action( 'bp_after_group_plugin_template' ) ?>

		</div><!--.entry content-->
		</div><!-- #content -->
		<div id="sidebar_right">
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
		</div><!--#sidebar_right-->

	</div><!-- #container -->

<?php get_footer() ?>