<?php
$get_data   = date('Y-m-d');
$args = array(
    'posts_per_page'=> -1,
    'post_type'  => 'agenda',
    'meta_key'   => 'agenda_data',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key'     => 'agenda_data_fim',
            'value'   => $get_data,
            'compare' => '>=',
        ),
        array(
            'key'     => 'agenda_data',
            'value'   => $get_data,
            'compare' => '>=',
        )
    ), 'orderby' => 'meta_value', 'order' => 'ASC'
);
$agenda = new WP_Query($args);
?>
<?php //mensagem outros eventos
if($agenda->have_posts()) :
    echo '<div class="agenda__headline agenda__headline--subtitle">Confira nossos próximos eventos</div>';
endif;
?>
<div>
    <?php while ($agenda->have_posts()) : $agenda->the_post();
        $tipo    = get_post_meta( get_the_id(), 'agenda_tipo', true);
        $data    = get_post_meta( get_the_id(), 'agenda_data', true);
        $dataf   = get_post_meta( get_the_id(), 'agenda_data_fim', true);
        $local   = get_post_meta( get_the_id(), 'agenda_local', true);
        $curso   = get_post_meta( get_the_id(), 'agenda_curso', true);
        $cor     = get_post_meta( get_the_id(), 'opt_cor', true);
        $cor_c   = get_post_meta( $curso, 'opt_cor', true);
        if($cor) : $color = $cor; else : $color = $cor_c; endif;
    ?>

    <div class="agenda__item">
        <div class="agenda__infos">
            <div class="agenda__label" style="background-color: <?php echo $color;?>;">
                <?php echo ($tipo == 2 ? 'Cursos' : 'Evento'); ?>
            </div>
            <div class="agenda__local">
                <i style="color: <?php echo $color;?>;" class="fa fa-map-marker"></i><?php echo $local;?>
            </div>
            <div class="agenda__data">
                <i style="color: <?php echo $color;?>;" class="fa fa-calendar-o"></i><?php formata_data($data, $dataf);?>
            </div>
            <div class="agenda__titulo"><?php echo get_the_title($curso);?></div>
            <div class="agenda__btn">
                <a href="<?php the_permalink();?>" class="btn" style="border-color: <?php echo $color;?>;">Saiba mais</a>
            </div>
        </div>
        <div class="agenda__thumb">
            <?php //echo $curso; ?>
            <?php //thumbnail
                if(has_post_thumbnail()) :
                    thumblazy(get_the_id(), 'full', 'fade', get_the_title($curso));
                else :
                    thumblazy($curso, 'full', 'fade', get_the_title($curso));
                endif;
            ?>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata();?>
</div>