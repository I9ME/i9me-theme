<section class="section painel">
    <ul id="slide" class="slide">
        <?php $slides = new WP_Query(array('posts_per_page'=> -1,'post_type' => 'slides'));?>
        <?php while ( $slides->have_posts()) : $slides->the_post();?>
            <?php
            $slide_desc        = get_post_meta( get_the_id(), 'slide_desc', true);
            $slide_subtitle    = get_post_meta( get_the_id(), 'slide_subtitle', true);
            $slide_title_thumb = get_post_meta( get_the_id(), 'slide_title_thumb', true);
            $slide_link        = get_post_meta( get_the_id(), 'slide_link', true);
            $slide_target      = get_post_meta( get_the_id(), 'slide_target', true);
            $slide_btn         = get_post_meta( get_the_id(), 'slide_btn', true);
            $slide_subtitle    = get_post_meta( get_the_id(), 'slide_subtitle', true);

            // $thumb_id  = get_post_thumbnail_id($post->ID);
            // $thumb_url = wp_get_attachment_image_url( $thumb_id, 'thumb-385x180' );
            // $thumbs[] = array('title' => $slide_title_thumb, 'thumb' => $thumb_url);

            ?>
            <li class="slide__item">
                <div class="container">
                    <div class="slide__infos">
                        <h2 class="slide__tit"><?php the_title(); ?></h2>
                        <div class="slide__desc">
                            <p><?php echo $slide_desc; ?></p>
                        </div>
                        <?php echo ($slide_link ? '<a class="slide__btn" href="'.$slide_link.'" target="'.$slide_target.'">'.$slide_btn.'</a>' : '');?>
                    </div>
                </div>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</section>