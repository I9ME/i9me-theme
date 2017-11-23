<?php
$args = array(
    'posts_per_page'=> 1,
    'post_type'  => 'cursos',
    'meta_key'   => 'curso_destaque',
    'meta_value' => 1,
    'orderby' => 'date', 'order' => 'DESC'
);
?>
<section class="destaque">
    <div class="container">
        <div class="destaque__head">
            <div class="destaque__headline"><?php single_term_title('Cursos '); ?></div>
        </div>
        <?php
            $destaque = new WP_Query($args);
            while ($destaque->have_posts()) : $destaque->the_post(); $excluir = get_the_id();?>
            <div class="destaque__item">
            <div class="destaque__thumb">
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </a>
            </div>
            <div class="destaque__info">
                <h3 class="destaque__titulo">
                    <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>"><?php the_title();?></a>
                </h3>
                <div class="destaque__desc"><?php echo get_excerpt_nbtn(200);?></div>
                <a href="<?php echo $opt_link;?>" target="<?php echo $opt_target;?>" class="destaque__btn">
                    <?php echo ($opt_text ? $opt_text : 'Saiba Mais');?>
                </a>
            </div>
        </div>
            <?php endwhile; wp_reset_postdata();?>
    </div>
</section>
<?php
$args = array(
    'posts_per_page'=> -1,
    'post_type'  => 'cursos',
    'orderby' => 'title',
    'order' => 'ASC',
    'post__not_in' => array($excluir)
);
global $wp_query; query_posts( array_merge($wp_query->query, $args)); ?>
<section class="curso curso--page">
    <div class="container">
        <div class="curso__head">
            <div class="curso__headline"><?php single_term_title('Outros Cursos '); ?></div>
        </div>
        <div class="">
            <?php //Query
            while (have_posts()) : the_post();
                get_template_part('templates/loop','cursos');
            endwhile; wp_reset_postdata();
            ?>
        </div>
    </div>
</section>