<?php //loop page
$loop = new WP_Query( array( 'post_type' => 'page', 'p' => '138'));
while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php //Custom Fields
    $coluna1         = get_post_meta( get_the_id(), 'coluna1_descricao', 'true');
    $imagem1         = get_post_meta( get_the_id(), 'coluna1_image', 'true');
    $coluna2         = get_post_meta( get_the_id(), 'coluna2_descricao', 'true');
    $imagem2         = get_post_meta( get_the_id(), 'coluna2_image', 'true');
    ?>
    <section class="pages pages--social">
        <div class="container">
            <div class="pages__header">
                <div class="pages__titulo">Coaching Social: A Febracis fazendo sua parte por um mundo melhor.</div>
            </div>
            <div class="pages__content">
                <div class="pages__row">
                    <div class="pages__coluna">
                        <?php echo $coluna1;?>
                    </div>
                    <div class="pages__coluna">
                        <?php echo $coluna2;?>
                    </div>
                </div>
                <div class="pages__row">
                    <div class="pages__coluna">
                        <div class="pages__image">
                            <?php imglazy($imagem1, 'full', 'fade', get_the_title());?>
                        </div>
                        <small>Foto: Coach Pela Paz</small>
                    </div>
                    <div class="pages__coluna">
                        <div class="pages__image">
                            <?php imglazy($imagem2, 'full', 'fade', get_the_title());?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pages__row pages__row--button">
                <a class="pages__btn" href="<?php the_permalink();?>" class="pages__btn">Saiba Mais</a>
            </div>
        </div>
    </section>
<?php endwhile; wp_reset_postdata(); ?>