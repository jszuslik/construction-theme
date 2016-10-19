<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
    <?php if (is_page('who-we-are') || is_page('team') || is_page('testimonials') || is_page('licenses')): ?>
    <div id="secondary">
        <?php
        $sidebarNav = array(
            'theme-location' => 'sidebar-left',
            'menu' => 'Sidebar Menu',
            'menu_class' => 'level-1',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'depth'=> 3,
            'container'=> false,
            'walker'=> ''
        );
        ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complimentary">
            <?php wp_nav_menu( $sidebarNav ); ?>
        </div>
        <?php else : ?>
        <div id="secondary">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complimentary">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
