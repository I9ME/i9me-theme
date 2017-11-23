<?php get_template_part('templates/html','header');?>


<article class="servico-single">
    <section class="">
        <?php while (have_posts()) : the_post(); ?>
            <?php setPostViews(get_the_ID()); ?>
            <div class="container">

<?php if ( get_post_type() == 'post'): ?>
                <div class="header header--interna">
                    <h2 class="header__titulo header__titulo--interna">
                        <?php the_title();?>
                    </h2>
                </div>
                <div class="">
                    <?php the_post_thumbnail('full', array('alt' => get_the_title(), 'title' => get_the_title())); ?>
                </div>
                <div class="">
                    <div class=""><?php the_content();?></div>
                </div>

<?php elseif ( get_post_type() == 'servico'): ?>

<h1>TIPO DE POST SERVIÇO</h1>

<?php elseif ( get_post_type() == 'portfolio'): ?>

<h1>TIPO DE POST PORTOLIO</h1>

<?php endif; ?>

            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>
</article>


<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>