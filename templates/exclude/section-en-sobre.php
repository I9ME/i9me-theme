<?php $page_id = get_page_by_path('en/agricola-famosa');?>
<?php $page    = new WP_Query(array('p' => $page_id->ID, 'post_type' => 'page', 'orderby' => 'menu_order'));?>
<?php while ($page->have_posts()) : $page->the_post(); ?>
<section class="section sobre sobre--home">
        <?php $thumb   = get_post_meta(get_the_id(), 'thumb_institucional', true);?>
        <div class="container">
            <div class="sobre__thumb">
                <?php echo '<img src="'.wp_get_attachment_url($thumb).'"  alt="'.get_the_title().'" />'; ?>
            </div>
            <div class="sobre__coluna">
                <h2 class="sobre__titulo">
                    Grow Up. That is <b>our nature</b>
                </h2>
                <div class="sobre__desc">
                    <?php the_content(); ?>
                </div>
                <div class="sobre__btn">
                    <a href="<?php the_permalink();?>" class="btn">Ler Mais</a>
                </div>
            </div>
        </div>
</section>
<?php endwhile; wp_reset_postdata();?>
