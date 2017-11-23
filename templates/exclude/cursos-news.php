<?php
$args = array(
    'post_type'      => 'news',
    'posts_per_page' => 2,
    'meta_key'       => 'news_posicao',
    'meta_query'     => array(
        array(
            'key' => 'news_posicao',
            'value' => '6',
            'compare' => 'IN'
        ),
    ),
    'order'          => 'DESC',
    'orderby'        => 'date',
);
$full = new WP_Query( $args );
?>
<section class="news news--cursos">
    <div class="container">
        <div class="news__head">
            <div class="news__headline">Descubra os Cursos Febracis</div>
        </div>
        <?php
            while ($full->have_posts()) : $full->the_post();
            //Custom fields
            $opt_link   = get_post_meta(get_the_id(), 'opt_link', 'true');
            $posicao    = get_post_meta(get_the_id(), 'news_posicao', 'false');
            $opt_target = get_post_meta(get_the_id(), 'opt_target', 'true');
            $opt_text   = get_post_meta(get_the_id(), 'opt_text', 'true');
            $background = get_post_meta(get_the_id(), 'news_background', 'true');
        ?>
        <div class="news__item">
            <div class="news__thumb">
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </a>
            </div>
            <div class="news__infos">
                <h3 class="news__titulo">
                    <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                </h3>
                <div class="news__desc"><?php echo get_excerpt_nbtn(200);?></div>
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="news__btn btn">
                    <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                </a>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>