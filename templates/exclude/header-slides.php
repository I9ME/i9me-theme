<?php //slides frontpage
$args = array('posts_per_page'=> -1,'post_type' => 'slides');
$header = new WP_Query($args);
$thumbs = "";
?>
<div class="topo__banner">
    <div id="owl-slides" class="owl-carousel slides">
        <?php while ( $header->have_posts()) : $header->the_post();
            $slide_desc        = get_post_meta( get_the_id(), 'slide_desc', true);
            $slide_subtitle    = get_post_meta( get_the_id(), 'slide_subtitle', true);
            $slide_title_thumb = get_post_meta( get_the_id(), 'slide_title_thumb', true);
            $slide_link        = get_post_meta( get_the_id(), 'slide_link', true);
            $slide_target      = get_post_meta( get_the_id(), 'slide_target', true);
            $slide_btn         = get_post_meta( get_the_id(), 'slide_btn', true);
            $slide_subtitle    = get_post_meta( get_the_id(), 'slide_subtitle', true);

            $thumb_id  = get_post_thumbnail_id($post->ID);
            $thumb_url = wp_get_attachment_image_url( $thumb_id, 'thumb-385x180' );
            $thumbs[] = array('title' => $slide_title_thumb, 'thumb' => $thumb_url);

            echo '<div class="slides__box">
                    <div class="slides__frase">
                        <div class="container">
                            <div class="slides__bloco">
                                <h2 class="slides__titulo">'.get_the_title().'</h2>
                                <h3 class="slides__titulo slides__titulo--sub">'.$slide_subtitle.'</h3>
                                <div class="slides__desc">'.$slide_desc.'</div>
                                '.($slide_link ? '<a class="btn btn--red" href="'.$slide_link.'" target="'.$slide_target.'">'.$slide_btn.'</a>' : '').'
                            </div>
                        </div>
                    </div>';
            the_post_thumbnail('full', array('alt' => get_the_title(), 'title' => get_the_title()));
            echo '</div>';
        endwhile; wp_reset_postdata();
    ?>
    </div>
    <div id="owl-thumbs" class="owl-carousel thumbs">
        <?php //thumbs
            foreach ($thumbs as $t) {
                echo '
                <div class="thumbs__item">
                    <div class="thumbs__title">
                        '.$t['title'].'
                    </div>
                    <div class="thumbs__thumb">
                        <img class="thumbs__img" src="'.$t['thumb'].'" />
                    </div>
                </div>';
            }
        ?>
    </div>
</div>