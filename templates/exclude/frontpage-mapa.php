<?php
$args = array(
    'post_type'      => 'news',
    'posts_per_page' => 1,
    'meta_key'       => 'news_posicao',
    'meta_query'     => array(
        array(
            'key' => 'news_posicao',
            'value' => '3',
            'compare' => 'IN'
        ),
    ),
    'order'          => 'DESC',
    'orderby'        => 'date',
);
$full = new WP_Query( $args );
while ($full->have_posts()) : $full->the_post(); ?>
<section class="news news--full">
    <div class="container">
        <?php //Custom fields
            $opt_link   = get_post_meta(get_the_id(), 'opt_link', 'true');
            $posicao    = get_post_meta(get_the_id(), 'news_posicao', 'false');
            $opt_target = get_post_meta(get_the_id(), 'opt_target', 'true');
            $opt_text   = get_post_meta(get_the_id(), 'opt_text', 'true');
            $background = get_post_meta(get_the_id(), 'news_background', 'true');
        ?>
        <div class="news__item">
            <div class="news__bg">
                <?php
                $thumb = wp_get_attachment_image_src($background, 'full');
                $url = $thumb['0'];
                echo '<img src="'.$url.'">';
                ?>
            </div>
            <div class="news__thumb">
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </a>
            </div>
            <div class="news__infos">
                <h3 class="news__titulo">
                    <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                </h3>
                <div class="news__desc"><?php echo get_excerpt_nbtn(350);?></div>
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="news__btn btn">
                    <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endwhile; wp_reset_query(); ?>
<section class="mapa">
    <div class="mapa__wrap">
        <div class="mapa__infos">
            <h3 class="mapa__titulo">
                A Febracis está presente em todo o Brasil e no exterior
            </h3>
            <div class="mapa__desc">
                Com núcleos em São Paulo, Ceará, Rondônia, Distrito Federal, Minas Gerais e Paraná. No exterior a Febracis está concentrada em Orlando - Flórida.
            </div>
        </div>
        <a class="mapa__btn" href="#"><i class="mapa__icone fa fa-map-marker"></i>Conheça a Febracis mais perto de você  ></a>
    </div>
</section>