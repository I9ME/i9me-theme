<?php
$args = array(
    'posts_per_page' => 1,
    'post_type'      => 'quotes',
    'orderby'        => 'rand'
);

$quotes = new WP_Query($args);
while ($quotes->have_posts()) : $quotes->the_post();
    $curso = get_post_meta( get_the_id(), 'agenda_curso', true);
    $cor   = get_post_meta( get_the_id(), 'opt_cor', true);
?>

<section class="depoimento depoimento--full">
    <div class="container">
        <div class="depoimento__item">
            <div class="depoimento__frase">
                "<?php echo get_the_content();?>"
            </div>
            <div class="depoimento__autor">
                <?php the_title();?>
            </div>
            <div class="depoimento__btn">
                <a href="<?php echo get_post_type_archive_link('quotes');?>" class="btn">
                    Veja esse e outros depoimentos
                </a>
            </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; wp_reset_postdata();?>