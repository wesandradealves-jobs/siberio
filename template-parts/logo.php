            <a class="custom-logo-link no-t-logo" rel="home" itemprop="url" href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                <?php if(get_theme_mod('logo')) : ?>
                    <img src="<?php echo get_theme_mod('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                <?php else : ?>
                    <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                <?php endif; ?>
            </a> 