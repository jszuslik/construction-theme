
			<div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      			<div class="col-md-3 col-lg-3">
        			<?php get_sidebar(); ?>
      			</div><!-- /col-md-3 -->
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-md-9 col-lg-9">
        			<div class="page-mainbar post">
          				<h3><?php the_title(); ?></h3>
          				<div class="post-content">
							<?php the_content(); ?>
					
						</div>
					</div>
				</div>	
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<?php endwhile; endif; ?>
			</div>
