<?php
/**
 * The template for displaying all testimonials
 *
 * @package WordPress
 * @subpackage Century_Fence
 * @since Century Fence 1.0
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
        			<div class="page-mainbar post">
							<?php
								$include_gallery = get_field('include_gallery');
								$portfolio_gallery = get_field('portfolio_gallery');

							?>
							<?php if($include_gallery[0] == 'true'): ?>
								<div id="portfolio-owl" class="owl-carousel owl-theme">
								<?php foreach( $portfolio_gallery as $image): ?>

									<div class="item">
										<?php
											$content = '<a href="'.$image['url'].'">';
											$content .= '<img src="'.$image['sizes']['thumbnail'].'" alt="'.$images['alt'].'">';
											$content .= '</a>';
											if (function_exists('slb_activate')){
												$content = slb_activate($content);
											}
											echo $content;
										?>
									</div>
								<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php
								// Start the loop.


								get_template_part( 'content', get_post_format() );

                        		
								the_post_navigation( array(
								'next_text' => '<span class="screen-reader-text">' . __( 'Next:', 'pinnacle' ) . '</span> ' . '<span class="post-title">%title</span>',
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous:', 'pinnacele' ) . '</span> ' . '<span class="post-title">%title</span>',
								) );
							

							?>
							<br>
							<br>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<?php
										$post_thumb_url = get_the_post_thumbnail_url();
									?>
									<img class="img-responsive" src="<?php echo $post_thumb_url; ?>" alt="<?php the_title(); ?>" >
								</div>
								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
									<?php if(get_field('description')){ ?>
										<p><strong>Description: </strong><?php the_field('description'); ?></p>
									<?php } ?>
									<?php if(get_field('services_performed')){ ?>
										<p><strong>Services Performed: </strong><?php the_field('services_performed'); ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
									<?php if(have_rows('locations')): ?>
									<table class="table">
										<thead>
											<tr>
												<th>Completed Location</th>
												<th>Size</th>
												<th>Date Completed</th>
											</tr>
										</thead>
										<tbody>
											<?php while ( have_rows('locations')) : the_row(); ?>
											<tr>
												<td><?php the_sub_field('location'); ?></td>
												<?php if(get_sub_field('size')){ ?>
													<td><?php the_sub_field('size'); ?></td>
												<?php } else { ?>
													<td>N/A</td>
												<?php } ?>
												<?php if(get_sub_field('date_completed')){ ?>
													<td><?php the_sub_field('date_completed'); ?></td>
												<?php } else { ?>
													<td>N/A</td>
												<?php } ?>
											</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
									<?php endif; ?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
			<?php endwhile; endif; ?>
	</section>
<?php get_footer(); ?>