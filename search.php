<?php get_header(); ?>
	
	<div class="margin">
	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>
			<section class="searchItem">
				<h2><?php the_title(); ?></h2>

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</section>
		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h1>No posts found.</h1>

	<?php endif; ?>

<?php get_sidebar(); ?>

	</div><!--  End Margin -->

<?php get_footer(); ?>