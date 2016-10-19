<?php
/*
 * Template Name: Portfolio
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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="portfolio post">
          					<div class="post-content">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="page-mainbar post">
											<?php the_content(); ?>
										</div>
									</div>
									<?php
										$funnels = array();
										$funnels[] = get_page_by_title('Retail');
										$funnels[] = get_page_by_title('Industrial');
										$funnels[] = get_page_by_title('Corporate');
										$funnels[] = get_page_by_title('Office');
										$funnels[] = get_page_by_title('Restaurant');
										$funnels[] = get_page_by_title('Institutional');
										// echo '<pre>';var_dump($funnnels);echo '</pre>';

										foreach ($funnels as $funnel) {
											$fun_ID = $funnel->ID;
											$fun_excerpt = wp_trim_words($funnel->post_content, 39, '...' );
											$fun_link = get_the_permalink($fun_ID);
											$fun_thumb_id = get_post_thumbnail_id($fun_ID);
											$fun_title = get_the_title($fun_ID);
											$fun_thumb = wp_get_attachment_image_src($fun_thumb_id, 'funnel-thumb', true);
											?>

											<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
												<div class="thumbnail">
													<a href="<?php echo $fun_link; ?>">
														<img src="<?php echo $fun_thumb[0]; ?>" class="img-responsive" alt="<?php echo $fun_title; ?>" >
														<span class="sldcaption slide-caption">
															<p><?php echo $fun_excerpt; ?></p>
														</span>
														<div class="caption">
															<h2><?php echo $fun_title; ?></h2>
														</div>
													</a>
												</div>
											</div>

									<?php	}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
	</section>
<?php get_footer(); ?>
