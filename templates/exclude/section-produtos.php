<section class="section produtos">
    <?php
    $page_id = get_page_by_path('produtos');
    $page    = new WP_Query(array('p' => $page_id->ID, 'post_type' => 'page', 'orderby' => 'menu_order'));
    while ($page->have_posts()) : $page->the_post();
    ?>
        <div class="container">
            <div class="header">
                <h2 class="header__titulo">Nossos <b>Produtos</b></h2>
                <div class="header__desc">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
    <ul class="produtos__lista">
    <?php $produtos = new WP_Query(array('post_parent' => $page_id->ID, 'post_type' => 'page',   'orderby' => 'date', 'order' => 'desc'));?>
        <?php while ( $produtos->have_posts()) : $produtos->the_post();?>
            <li class="produtos__item">
                <a class="produtos__link" href="<?php echo get_the_permalink();?>">
                    <?php the_post_thumbnail('full', array('class' => 'produtos__thumb')); ?>
                    <div class="produtos__infos">
                        <?php the_title(); ?>
                    </div>
                </a>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</section>