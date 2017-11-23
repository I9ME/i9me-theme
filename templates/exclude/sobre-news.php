<section class="news news--sobre">
    <div class="container">
        <div>
            <?php
            $args = array(
                'post_type'      => 'news',
                'posts_per_page' => 3,
                'meta_key'       => 'news_posicao',
                'meta_query'     => array(
                    array(
                        'key' => 'news_posicao',
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
            <div class="news__item">
                <div class="news__thumb">
                    <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>">
                        <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                    </a>
                </div>
                <div class="news__infos">
                    <div class="news__tag" style="background: <?php echo $cor;?>">Loja</div>
                    <h3 class="news__titulo">
                        <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                    </h3>
                    <div class="news__desc"><?php the_excerpt();?></div>
                </div>
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="news__btn btn">
                    <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                </a>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
</section>