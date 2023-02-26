<?php

/* Template Name: Template for KingComposer */

?>

<?php get_header(); ?>

<!-- START CONTAINER -->
<div class="dgt_container">

	<!-- START LOOP -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<!-- start content -->
		<?php the_content(); ?>
		<!-- end content -->

	<?php endwhile; endif; ?>
	<!-- END LOOP -->

</div>
<!-- END CONTAINER -->

<?php get_footer(); ?>