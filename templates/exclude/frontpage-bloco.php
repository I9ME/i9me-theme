<section class="news news--bloco">
    <div class="container">
    <div class="news__head">
        <h3 class="news__headline">Vídeos e Novidades</h3>
        <div class="news__youtube">
            <span>O maior canal de Coaching do Brasil:</span>
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="g-ytsubscribe" data-channel="pauloipv" data-layout="default" data-count="default"></div>
        </div>
    </div>
    <?php
        $args = array(
            'post_type'      => 'news',
            'posts_per_page' => 4,
            'meta_key'       => 'news_posicao',
            'meta_query'     => array(
                array(
                    'key' => 'news_posicao',
                    'value' => '2',
                    'compare' => 'IN'
                ),
            ),
            'order'          => 'DESC',
            'orderby'        => 'date',
        );
        $news = new WP_Query( $args );
        $count = 1;
        while ($news->have_posts()) : $news->the_post();?>
        <?php //Custom fields
            $tag        = 'Youtube';
            $opt_tipo   = get_post_meta(get_the_id(), 'news_tipo', 'true');
            $opt_link   = get_post_meta(get_the_id(), 'opt_link', 'true');
            $opt_target = get_post_meta(get_the_id(), 'opt_target', 'true');
        ?>
        <div class="news__item <?php echo ($count == 1 || $count == 4 ? 'news__item--large' : 'news__item--small'); echo ($opt_tipo ? ' news__bloco--video' : '');?> ">
            <a href="<?php echo $link;?>" target="<?php echo $target;?>">
                <div class="news__thumb">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </div>
                <div class="news__infos">
                    <div class="news__tag"><?php echo $tag;?></div>
                    <h3 class="news__titulo"><?php the_title();?></h3>
                </div>
            </a>
        </div>
        <?php $count++; endwhile; wp_reset_query(); ?>
    </div>
</section>