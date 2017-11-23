<section class="agenda agenda--home">
    <div class="container">
        <div class="agenda__head">
            <h3 class="agenda__headline">Próximos Cursos</h3>

            <?php //PEGA LISTA DE CATEGORIAS DE RECEITAS
            $args_curso = array('taxonomy' => 'formacao', 'orderby' => 'title', 'order' => 'ASC', 'parent' => '0', 'hide_empty' => false);
            $cat_curso = get_categories($args_curso);

            $args_local = array('taxonomy' => 'eventos', 'orderby' => 'title', 'order' => 'ASC', 'parent' => '0', 'hide_empty' => false);
            $cat_local = get_categories($args_local);

            if (!empty($cat_curso) && !is_wp_error($cat_curso) || !empty($cat_local) && !is_wp_error($cat_local)) : ?>
            <div class="agenda__form">
                <form class="sform sform--home" action="<?php echo get_post_type_archive_link('agenda');?>" param="GET">
                    <div class="sform__select sform__select--cursos">
                        <select name="pilar" class="cs-select cs-skin-elastic">
                        <option value="" disabled selected>Tipo de Curso</option>
                            <?php //options
                                foreach ( $cat_curso as $categoria ) {
                                    echo '
                                    <option value="'.$categoria->term_id.'" data-class="flag-'.$categoria->slug.'">'.
                                    $categoria->name
                                    .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="sform__select sform__select--local">
                        <select name="local" class="cs-select cs-skin-elastic">
                        <option value="" disabled selected>Localização</option>
                            <?php //options
                                foreach ( $cat_local as $categoria ) {
                                    echo '
                                    <option value="'.$categoria->term_id.'" data-class="flag-'.$categoria->slug.'">'.
                                    $categoria->name
                                    .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <input class="btn sform__submit" type="submit"  value="Buscar">
                </form>
            </div>
            <?php endif;?>
        </div>
        <div>
        <?php
            $get_data   = date('Y-m-d');
            $get_mes    = date('m');
            $get_ano    = date("Y");
            $args = array(
                'posts_per_page'=> 6,
                'post_type'  => 'agenda',
                'meta_key'   => 'agenda_data',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
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
                    ),
                    array(
                        'key'     => 'agenda_tipo',
                        'value'   => '2',
                        'compare' => '==',
                    ),
                ), 'orderby' => 'meta_value', 'order' => 'ASC'
            );
            $agenda = new WP_Query($args);
            while ($agenda->have_posts()) : $agenda->the_post();
                $data  = get_post_meta( get_the_id(), 'agenda_data', true);
                $dataf = get_post_meta( get_the_id(), 'agenda_data_fim', true);
                $local = get_post_meta( get_the_id(), 'agenda_local', true);
                $curso = get_post_meta( get_the_id(), 'agenda_curso', true);
                $cor   = get_post_meta( get_the_id(), 'opt_cor', true);
                $cor_c = get_post_meta( $curso, 'opt_cor', true);
                if($cor) : $color = $cor; else : $color = $cor_c; endif;
            ?>

            <div class="agenda__item">
                <div class="agenda__infos">
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
                    <?php thumblazy($curso, 'full', 'fade', get_the_title($curso));?>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata();?>
        </div>
    </div>
</section>