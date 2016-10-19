<?php
/**
 * Template Name: Industrial Gallery
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
                        <div class="post-content">
                            <div class="row">
                                <?php the_content(); ?>
                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'category_name' => 'industrial'
                                    );
                                    $loop = null;
                                    $loop = new WP_Query($args);
                                ?>
                                <?php while ($loop->have_posts()) : $loop->the_post() ; ?>
                                <?php $thumbnail = get_the_post_thumbnail(); ?>
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 logo-div">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="helper">
                                                <?php echo $thumbnail; ?>
                                            </span>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
