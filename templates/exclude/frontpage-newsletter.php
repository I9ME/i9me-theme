<section class="newsletter">
    <div class="container">
        <div class="newsletter__infos">
            <?php
            $args = array(
                'post_type'      => 'livros',
                'posts_per_page' => 1,
                'meta_key'       => 'books_posicao',
                'meta_query'     => array(
                    array(
                        'key' => 'books_posicao',
                        'value' => '1',
                        'compare' => 'IN'
                    ),
                ),
                'order'          => 'DESC',
                'orderby'        => 'date',
            );
            $books = new WP_Query( $args );
            while ($books->have_posts()) : $books->the_post(); ?>
            <div class="livros livros--ebook">
                <div class="livros__thumb">
                    <?php thumblazy(get_the_id(), 'full', 'fade', get_the_title());?>
                </div>
                <div class="livros__desc">
                    <h3 class="livros__titulo"><?php the_title('[Ebook Gratuito]<br>');?></h3>
                    <div class="livros__text"><?php the_content();?></div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>

        <div class="newsletter__form">
            <form action="">
                <div class="newsletter__input">
                    <input type="text" placeholder="Nome">
                </div>
                <div class="newsletter__input">
                    <input type="text" placeholder="E-mail">
                </div>
                <div class="newsletter__input">
                    <input type="text" placeholder="Estado">
                </div>
                <div class="newsletter__input">
                    <input type="text" placeholder="Cidade">
                </div>
                <div class="newsletter__input newsletter__input--full">
                    <input type="submit" value="Baixar E-Book">
                </div>
            </form>
        </div>
    </div>
</section>