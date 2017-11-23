<section class="livros livros--sobre">
    <div class="container">
        <?php
        $args = array(
            'post_type'      => 'livros',
            'posts_per_page' => 1,
            'meta_key'       => 'books_posicao',
            'meta_query'     => array(
                array(
                    'key' => 'books_posicao',
                    'value' => '5',
                    'compare' => 'IN'
                ),
            ),
            'order'          => 'DESC',
            'orderby'        => 'date',
        );
        $news = new WP_Query( $args );
        while ($news->have_posts()) : $news->the_post(); ?>
        <?php //Custom fields
            $opt_link   = get_post_meta(get_the_id(), 'opt_link', 'true');
            $opt_target = get_post_meta(get_the_id(), 'opt_target', 'true');
            $opt_text   = get_post_meta(get_the_id(), 'opt_text', 'true');
            $cor        = get_post_meta( get_the_id(), 'opt_cor', true);
        ?>
        <div class="livros__item">
            <div class="livros__thumb">
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </a>
            </div>
            <div class="livros__infos">
                <h3 class="livros__titulo">
                    <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                </h3>
                <div class="livros__desc"><?php echo get_the_excerpt();?></div>
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="livros__btn btn btn--red">
                    <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                </a>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>