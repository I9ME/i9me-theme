<?php $settings  = get_option( 'options_general'); ?>
<section class="section news news--home">
    <header class="header">
        <h2 class="header__titulo">
            Nossas <b>Novidades</b>
        </h2>
        <div class="header__desc">
            <?php echo wpautop($settings['option_desc_news']); ?>
        </div>
    </header>
    <div class="container">
        <?php $news = new WP_Query(array('posts_per_page'=> 3,'post_type' => 'post', 'category_name' => 'novidades'));?>
        <?php //loop blog
        while ( $news->have_posts()) : $news->the_post();
            get_template_part('templates/loop','blog');
        endwhile; wp_reset_postdata(); ?>
    </div>
</section>