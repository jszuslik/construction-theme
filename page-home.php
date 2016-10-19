<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>


<section>
	<div id="banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
					<?php $home_ID = $post->ID; ?>
					<?php if( have_rows('home_slider', $home_ID) ) : ?>
						<div id="home-banner" class="owl-carousel owl-theme">
							<?php $rows = 0; ?>
							<?php while ( have_rows('home_slider', $home_ID) ) : the_row(); ?>
								<?php $slide = get_sub_field('slide_image', $home_ID); ?>
								<img style="width: 100%" src="<?php echo $slide['sizes']['home-slide']; ?>" alt="<?php $slide['alt']; ?>" >
							<?php endwhile; ?>
						</div>
						<div class="container">
							<div class="caption-flag hidden-xs hidden-sm visible-md visible-lg">
								<img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/bannerflag.png" alt="Pinnacle Construction" />

							</div>
							<div id="caption-banner" class="owl-carousel owl-theme hidden-xs hidden-sm visible-md visible-lg">
								<?php $rows = 0; ?>
								<?php while ( have_rows('home_slider', $home_ID) ) : the_row(); ?>
									<?php $slide_title = get_sub_field('slide_title', $home_ID); ?>
									<?php $slide_caption = get_sub_field('slide_caption', $home_ID); ?>
									<?php $slide_link = get_sub_field('slide_link', $home_ID); ?>
									<div class="item">
										<a class="desktop-only" href="<?php echo $slide_link; ?>">
											<h2 class="caption-title desktop-only"><?php echo $slide_title; ?></h2>
										</a>
										<a class="desktop-only" href="<?php echo $slide_link; ?>">
											<h3 class="caption-desc desktop-only"><?php echo $slide_caption; ?></h3>
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
		  </div>
		</div>
	</div><!-- /#banner -->
</section>
<section id="wrapper">
	<div class="container">
		<div class="row">
			<?php
				$funnels = array();
				$funnels[] = get_field('funnel_1');
				$funnels[] = get_field('funnel_2');
				$funnels[] = get_field('funnel_3');
				$funnels[] = get_field('funnel_4');
				$funnels[] = get_field('funnel_5');
				$funnels[] = get_field('funnel_6');
				//echo '<pre>';var_dump($funnels);echo '</pre>';

				foreach ($funnels as $funnel) {
					$fun_ID = $funnel->ID;
					$fun_excerpt = wp_trim_words( $funnel->post_content, 39, '...' );
					$fun_link = get_the_permalink($fun_ID);
					$fun_thumb_id = get_post_thumbnail_id($fun_ID);
					$fun_title = get_the_title($fun_ID);
					$fun_thumb = wp_get_attachment_image_src($fun_thumb_id, 'funnel-thumb', true); ?>

					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="thumbnail">
							<a href="<?php echo $fun_link; ?>">
							<img src="<?php echo $fun_thumb[0]; ?>" class="img-responsive" alt="<?php echo $fun_title; ?>">
							<span class="sldcaption slide-caption">
							<p><?php echo $fun_excerpt; ?></p></span>
							<div class="caption">
								<h2><?php echo $fun_title; ?></h2>
							</div></a>
						</div>
					</div>

			<?php	} ?>

			<!-- <?php $args = array(	//Set the arguments to the query, i.e. what posts are you looking for, how many, etc.
					'post_type' => 'funnel',
			        'order'   => 'ASC',
					'post_count' => -1 //Set to -1 for unlimited
					);

					$funnel_loop = null;
					$funnel_loop = new WP_Query($args);		//Create a new query, passing it the arguments you specified above

				while ( $funnel_loop->have_posts() ) : $funnel_loop->the_post();
					get_field('test_field'); ?>


					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="thumbnail">
							<a href="<?php the_field('link'); ?>">
							<img src="<?php the_field('image')?>" class="img-responsive" alt="<?php the_title(); ?>">
							<span class="sldcaption slide-caption">
							<p><?php the_field('caption')?></p></span>
							<div class="caption">
								<h2><?php the_title(); ?></h2>
							</div></a>
						</div>
					</div>

				<?php endwhile; ?>
			<?php wp_reset_query(); ?> -->

		</div><!-- row -->
	</div>
</section>
<section id="association_wrapper">
	<div class="container">
		<div class="row">
			<div id="licensedareas" class="col-md-12">
				<div class="row">
					<div class="wearelicensed col-xs-12 col-sm-12 col-md-2">
						<p>We Are</p>
						<p>Licensed In...</p>
					</div>
					<div class="states col-xs-12 col-sm-12 col-md-10">
						<p><span>Wisconsin</span> | <span>Illinois</span> | <span>Michigan</span> | <span>Minnesota</span> | <span>Indiana</span> | <span>Missouri</span> | <span>Ohio</span> | <span>Iowa</span> | <span>Arkansas</span> | <span>Kentucky</span> | <span>Tennessee</span> | <span>West Virginia</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
	        <div id="owlCarousel" class="col-md-12 col-lg-12">
	        <img src="<?php get_site_url(); ?>/wp-content/themes/Pinnacle Construction/images/associationbkg.png" alt="carousel" class="background_carousel" />
	            <div id="owl-association" class="owl-carousel">
					<?php
						$args = array(
							'post_type' => 'post'
						);
						$loop = null;
						$loop = new WP_Query($args);
						while($loop->have_posts()): $loop->the_post();
							$thumb_url = get_the_post_thumbnail_url();
					?>
	                <div class="item">
						<div class="owlhelper">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
	                </div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
	            <div class="customNavigation">
	                <a class="btn prev left">
	                	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    				<span class="sr-only">Previous</span>
	    			</a>
	                <a class="btn next right">
	                	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    				<span class="sr-only">Next</span>
	    			</a>
	            </div>
			</div>
	    </div>
	</div><!-- /container -->
</section>


<?php get_footer(); ?>
