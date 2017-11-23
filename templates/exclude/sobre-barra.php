<section class="news news--barra">
    <div class="container">
        <div>
            <?php
            $args = array(
                'post_type'      => 'news',
                'posts_per_page' => 1,
                'meta_key'       => 'news_posicao',
                'meta_query'     => array(
                    array(
                        'key' => 'news_posicao',
                        'value' => '7',
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
            ?>
            <div class="news__item">
                <div class="news__infos">
                    <h3 class="news__titulo">
                        <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                    </h3>
                    <div class="news__btn">
                        <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="btn">
                            <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
</section>