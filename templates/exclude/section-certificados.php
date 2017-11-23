<section class="certificados">
    <div class="header">
        <?php $english = isEnglish(); ?>
        <h2 class="header__titulo">
            <?php echo ($english == true ? 'Certifications' : 'Certificações'); ?>
        </h2>
    </div>
    <div class="container">
        <ul id="owl-certificados" class="certificados__lista">
        <?php $certificados = new WP_Query(array('posts_per_page'=> 8,'post_type' => 'certificados'));?>
        <?php while ( $certificados->have_posts()) : $certificados->the_post();?>
            <li class="certificados__item">
                <div class="certificados__thumb"><?php the_post_thumbnail('full', array('alt' => get_the_title(), 'title' => get_the_title())); ?></div>
                <div class="certificados__titulo"><?php the_title(); ?></div>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>