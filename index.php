<?php

$post_id = get_the_ID();

$basic_options = get_option( 'dgtheme_basic_options' );
$blog_options = get_option( 'dgtheme_blog_options' );

$layout_style = ( isset( $basic_options['dgt_layout_style'] ) ) ? $basic_options['dgt_layout_style'] : '';

$left_sidebar = ( isset( $blog_options['dgt_show_left_sidebar'] ) ) ? $blog_options['dgt_show_left_sidebar'] : '';
$right_sidebar = ( isset( $blog_options['dgt_show_right_sidebar'] ) ) ? $blog_options['dgt_show_right_sidebar'] : '';

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
<div class="dgt_container<?php echo ( $layout_style == 2 ) ? ' wide' : ''; ?>">

	<?php if ( $layout_style == 2 ) : ?>
	<!-- START WIDE STYLE -->
	<div class="dgt_wide">
	<?php endif; ?>

		<!-- START LEFT BLOG SIDEBAR -->
		<?php if ( $left_sidebar == 1 ) get_template_part('parts/sidebars/sidebar', 'blog-left'); ?>
		<!-- END LEFT BLOG SIDEBAR -->

		<!-- START CONTENT -->
		<div class="dgt_content col-md-<?php echo esc_attr( $columns ); ?><?php echo ( $left_sidebar && !$right_sidebar ) ? ' pull-right' : ''; ?>">

			<!-- START LOOP -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- START POST -->
				<div id="post-<?php the_ID(); ?>" <?php post_class('dgt_post'); ?>>

					<!-- start post container -->
					<div class="dgt_post_container">

						<?php if ( has_post_thumbnail() ) : ?>
						<!-- start post thumbnail -->
		            	<div class="dgt_post_thumbnail">

		            		<!-- start thumbnail link -->
		            		<a class="dgt_thumbnail_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		            			<?php the_post_thumbnail( 'dgtheme-blog-image' ); ?>
		            			<!-- start thumbnail mask -->
		            			<div class="dgt_mask"><div class="dgt_mask_icon"></div></div>
		            			<!-- end thumbnail mask -->
		            		</a>
		            		<!-- end thumbnail link -->

		            		<!-- start thumbnail date -->
		            		<div class="dgt_date">
		            			<div class="dgt_day"><?php the_time('d'); ?></div>
		            			<div class="dgt_month"><?php the_time('M'); ?></div>
		            			<div class="dgt_year"><?php the_time('Y'); ?></div>
		            		</div>
		            		<!-- end thumbnail date -->

		            	</div>
		            	<!-- end post thumbnail -->
		            	<?php endif; ?>

		            		<!-- start sticky post -->
		            		<div class="dgt_sticky_post"><i class="dgt_icon_thumb-tack"></i></div>
		            		<!-- end sticky post -->

		            	<!-- start post content -->
		            	<div class="dgt_post_content">

		            		<?php if ( get_the_title() ) : ?>
		            		<!-- start post title -->
		            		<div class="dgt_post_title">
		            			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
		            		</div>
		            		<!-- end post title -->
		            		<?php endif; ?>

		            		<!-- start content -->
		            		<?php the_excerpt(); ?>
		            		<!-- end content -->

		            	</div>
		            	<!-- end post content -->

		            	<!-- start post footer -->
		            	<div class="dgt_post_footer">

		            		<!-- start post meta -->
		            		<div class="dgt_post_meta">
		            			<div class="dgt_meta">
									<?php if ( has_category() ) : ?><div class="dgt_meta_categories"><i class="dgt_icon_folder"></i><?php the_terms( $post->ID, 'category', '', ', ' ); ?></div><?php endif; ?>
									<?php if ( has_tag() ) : ?><div class="dgt_meta_categories"><i class="dgt_icon_tags"></i><?php the_tags( '', ', ', '' ); ?></div><?php endif; ?>
									<span class="dgt_meta_author"><a href="<?php echo site_url(); ?>/author/<?php the_author(); ?>"><i class="dgt_icon_user"></i> <?php the_author(); ?></a></span>
									<span class="dgt_meta_comments"><a href="<?php echo get_permalink(); ?>#dgt_comments"><i class="dgt_icon_comment"></i> <?php comments_number( '0', '1', '%' ); ?></a></span>
									<?php 
									if ( current_user_can('edit_others_pages') ) {
										echo '<span class="dgt_meta_edit">';
										echo edit_post_link('<i class="dgt_icon_pencil"></i> ' . esc_html__('Edit','dgtheme-greenarrow'));
										echo '</span>';
									}
									?>
								</div>
							</div>
		            		<!-- end post meta -->

		            		<!-- start read more link -->
							<a class="dgt_show_more" href="<?php the_permalink(); ?>"><div class="dgt_post_nav_ico"><i class="dgt_icon_share"></i></div><div class="dgt_post_nav_title"><?php esc_html_e('Read more','dgtheme-greenarrow'); ?> <i class="dgt_icon_share"></i></div><span class="screen-reader-text"> <?php esc_html_e('about','dgtheme-greenarrow'); ?> <?php the_title();?></span></a>
		            		<!-- end read more link -->

						</div>
		            	<!-- end post footer -->

					</div>
					<!-- end post container -->

				</div>
				<!-- END POST -->

			<?php endwhile; else : ?>

				<h2><?php esc_html_e('The page you are looking for is not found', 'dgtheme-greenarrow'); ?></h2>
				<p><?php esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Back to the homepage and see if you can find what you are looking for.', 'dgtheme-greenarrow'); ?></p>

			<?php endif; ?>
			<!-- END LOOP -->

			<!-- START PAGINATION -->
			<div id="dgt_pages">
				<?php 
				if (function_exists('dgtheme_pagination')) {
					dgtheme_pagination();
				} else {
					posts_nav_link();
				}
				?>
			</div>
			<!-- END PAGINATION -->

		</div>
		<!-- END CONTENT -->

		<!-- START RIGHT BLOG SIDEBAR -->
		<?php if ( $right_sidebar == 1 ) get_template_part('parts/sidebars/sidebar', 'blog-right'); ?>
		<!-- END RIGHT BLOG SIDEBAR -->

		<!-- START MOBILE BLOG SIDEBAR -->
		<?php get_template_part('parts/sidebars/sidebar', 'mobile-blog'); ?>
		<!-- END MOBILE BLOG SIDEBAR -->

	<?php if ( $layout_style == 2 ) : ?>
	</div>
	<!-- END WIDE STYLE -->
	<?php endif; ?>

</div>
<!-- END CONTAINER -->

<?php get_footer(); ?>