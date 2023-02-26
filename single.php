<?php

$basic_options = get_option( 'dgtheme_basic_options' );
$blog_options = get_option( 'dgtheme_blog_options' );

$layout_style = ( isset( $basic_options['dgt_layout_style'] ) ) ? $basic_options['dgt_layout_style'] : '';

$sidebar_type = ( isset( $blog_options['dgt_single_sidebar_type'] ) ) ? $blog_options['dgt_single_sidebar_type'] : '';
$left_sidebar = ( isset( $blog_options['dgt_single_left_sidebar'] ) ) ? $blog_options['dgt_single_left_sidebar'] : '';
$right_sidebar = ( isset( $blog_options['dgt_single_right_sidebar'] ) ) ? $blog_options['dgt_single_right_sidebar'] : '';

if ( $left_sidebar && $right_sidebar ) {
	$columns = '6';
} elseif ( !$left_sidebar && !$right_sidebar ) {
	$columns = '12';
} else {
	$columns = '9';
}

?>

<?php get_header(); ?>

<!-- START CONTAINER -->
<div class="dgt_container">

		<!-- START CONTENT -->
		<div class="dgt_content">

		<!-- START LOOP -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- START POST -->
			<div id="post-<?php the_ID(); ?>" <?php post_class('dgt_post'); ?>>

				<?php if ( has_post_thumbnail() ) : ?>
				<?php
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'dgtheme-blog-image' );
					$image = ' style="background: url('. esc_url( $image_url[0] ) .') no-repeat fixed"';
				?>
				<!-- start post thumbnail -->
            	<div class="dgt_post_thumbnail"<?php echo wp_kses( $image, array('style' => array() ) ); ?>>

					<?php if ( get_the_title() ) : ?>
	        		<!-- start post title -->
	        		<div class="dgt_title_container">

			            <?php if ( $layout_style == 2 ) : ?>
						<!-- START WIDE STYLE -->
						<div class="dgt_wide">
						<?php endif; ?>

					        <div class="dgt_post_title"><h4><?php the_title(); ?></h4></div>

						<?php if ( $layout_style == 2 ) : ?>
						</div>
						<!-- END WIDE STYLE -->
						<?php endif; ?>

	        		</div>
	        		<!-- end post title -->
					<?php endif; ?>

            	</div>
            	<!-- end post thumbnail -->
            	<?php else : ?>

				<?php if ( get_the_title() ) : ?>
        		<!-- start post title -->
        		<div class="dgt_title_container">

		            <?php if ( $layout_style == 2 ) : ?>
					<!-- START WIDE STYLE -->
					<div class="dgt_wide">
					<?php endif; ?>

				        <div class="dgt_post_title"><h4><?php the_title(); ?></h4></div>

					<?php if ( $layout_style == 2 ) : ?>
					</div>
					<!-- END WIDE STYLE -->
					<?php endif; ?>

        		</div>
        		<!-- end post title -->
				<?php endif; ?>
            	<?php endif; ?>

				<!-- start post container -->
				<div class="dgt_post_container<?php echo ( $layout_style == 2 ) ? ' wide' : ''; ?>">

					<?php if ( $layout_style == 2 ) : ?>
					<!-- START WIDE STYLE -->
					<div class="dgt_wide">
					<?php endif; ?>

						<!-- START LEFT BLOG SIDEBAR -->
						<?php 
						if ( $left_sidebar == 1 ) :
							if ( $sidebar_type == 1 ) :
								get_template_part('parts/sidebars/sidebar', 'blog-left');
							else :
								get_template_part('parts/sidebars/sidebar', 'custom-left');
							endif;
						endif;
						?>
						<!-- END LEFT BLOG SIDEBAR -->

		            	<!-- start post content -->
		            	<div class="dgt_post_content col-md-<?php echo esc_attr( $columns ); ?><?php echo ( $left_sidebar && !$right_sidebar ) ? ' pull-right' : ''; ?>">

		            		<div class="dgt_post_box">
			            		<!-- start post footer meta -->
			            		<div class="dgt_post_meta">
			            			<div class="dgt_meta">
										<span class="dgt_meta_author"><a href="<?php echo site_url(); ?>/author/<?php the_author(); ?>"><i class="dgt_icon_user"></i> <?php the_author(); ?></a></span>
										<span class="dgt_meta_categories"><i class="dgt_icon_tags"></i><?php the_terms( $post->ID, 'category', '', ', ' ); ?></span>
									</div>
								</div>
			            		<!-- end post footer meta -->

								<!-- start content -->
			            		<?php the_content(); ?>
								<!-- end content -->

								<!-- start post pagination -->
								<?php wp_link_pages(); ?>
								<!-- start post pagination -->

								<?php if ( current_user_can('edit_others_pages') ) : ?>
				            	<!-- start post footer -->
				            	<div class="dgt_post_footer">

				            		<!-- start post footer meta -->
				            		<div class="dgt_post_meta">
				            			<div class="dgt_meta">
										<?php
											echo '<span class="dgt_meta_edit">';
											echo edit_post_link('<i class="dgt_icon_pencil"></i> ' . esc_html__('Edit','dgtheme-greenarrow'));
											echo '</span>';
										?>
										</div>
									</div>
				            		<!-- end post footer meta -->

								</div>
				            	<!-- end post footer -->
								<?php endif; ?>
							</div>

							<?php
							if ( comments_open() ) :
								comments_template();
							endif;
							?>

		            	</div>
		            	<!-- end post content -->

						<!-- START RIGHT BLOG SIDEBAR -->
						<?php 
						if ( $right_sidebar == 1 ) :
							if ( $sidebar_type == 1 ) :
								get_template_part('parts/sidebars/sidebar', 'blog-right');
							else :
								get_template_part('parts/sidebars/sidebar', 'custom-right');
							endif;
						endif;
						?>
						<!-- END RIGHT BLOG SIDEBAR -->

						<!-- START MOBILE SINGLE SIDEBAR -->
						<?php 
						if ( $sidebar_type == 1 ) :
							get_template_part('parts/sidebars/sidebar', 'mobile-single');
						else :
							get_template_part('parts/sidebars/sidebar', 'mobile-custom-single');
						endif;
						?>
						<!-- END MOBILE SINGLE SIDEBAR -->

					<?php if ( $layout_style == 2 ) : ?>
					</div>
					<!-- END WIDE STYLE -->
					<?php endif; ?>

				</div>
				<!-- end post container -->

			</div>
			<!-- END POST -->

		<?php endwhile; endif; ?>
		<!-- END LOOP -->

		</div>
		<!-- END CONTENT -->

		<!-- START PAGINATION -->
		<div id="dgt_pages">

			<?php if ( $layout_style == 2 ) : ?>
			<!-- START WIDE STYLE -->
			<div class="dgt_wide">
			<?php endif; ?>

				<?php dgtheme_pagination(); ?>

			<?php if ( $layout_style == 2 ) : ?>
			</div>
			<!-- END WIDE STYLE -->
			<?php endif; ?>

		</div>
		<!-- END PAGINATION -->

</div>
<!-- END CONTAINER -->

<?php get_footer(); ?>