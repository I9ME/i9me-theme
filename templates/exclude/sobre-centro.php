<?php //loop page
$loop = new WP_Query( array( 'post_type' => 'page', 'p' => '126'));
while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <section class="centro">
        <div class="centro__wrap">
            <div class="container">
                <div class="centro__content">
                    <div class="centro__titulos">
                        <h2><?php the_title();?></h2>
                        <h3>A mais avançada experiência de coaching no mundo.</h3>
                    </div>
                    <div class="centro__info">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
            <div class="centro__thumb">
                <?php the_post_thumbnail('full');?>
            </div>
        </div>
        <div class="container">
            <div class="centro__lista">
                <?php //áreas
                    $areas         = array(
                        'Livraria'              => 'livraria',
                        'Café'                  => 'cafe',
                        'Salas de Treinamento'  => 'treino',
                        'Sala para sessões'     => 'sessoes'
                    );

                     foreach ($areas as $section => $area) {
                        $icone  = get_post_meta(get_the_id(), $area.'_image', 'true');
                        $desc   = get_post_meta(get_the_id(), $area.'_descricao', 'true');
                        $bloco  = '<div class="centro__bloco">';
                            $bloco .= '<div class="centro__icone">';
                                $bloco .= '<div class="centro__circle">';
                                $bloco .= wp_get_attachment_image( $icone, 'full');
                                $bloco .= '</div>';
                            $bloco .= '</div>';
                            $bloco .= '<h3 class="centro__area">'.$section.'</h3>';
                            $bloco .= '<div class="centro__desc">'.$desc.'</div>';
                        $bloco .= '</div>';
                        echo $bloco;
                     }
                ?>
            </div>
            <div class="centro__more">
                <a href="<?php the_permalink();?>" class="btn">Mais sobre o centro conceito</a>
            </div>
        </div>
    </section>
<?php endwhile; ?>