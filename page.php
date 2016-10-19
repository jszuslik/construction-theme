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
			<?php
			$parent_title = get_the_title($post->post_parent);
			$parent_id = get_post($post->ID)->post_parent;
			?>
			<div class="row breadcrumbs">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<?php if($parent_id != '0') { ?>
							<li><a href="<?php echo esc_url( get_permalink( get_page_by_title( $parent_title ) ) ); ?>"><?php echo $parent_title; ?></a></li>
						<?php } ?>
						<li class="active"><?php the_title(); ?></li>
					</ol>
				</div>
			</div><!-- .row .breadcrumbs -->
			<div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_sidebar(); ?>
				<div class="col-md-9 col-lg-9">
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
