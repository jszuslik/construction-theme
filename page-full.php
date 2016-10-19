<?php
/*
 * Template Name: Full width
 */

?>
<?php get_header(); ?>

	<section id="wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container-fluid">
				<div class="title-wrapper">
					<div class="container">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        		<div class="page-mainbar post">
          		<div class="post-content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
	</section>
<?php get_footer(); ?>
