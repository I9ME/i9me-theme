<?php $color = get_post_meta( get_the_id(), 'opt_cor', true);?>
<div class="curso__item">
    <div class="curso__infos">
        <div class="curso__line" style="border-color: <?php echo $color;?>;"></div>
        <div class="curso__titulo">
            <a href="<?php the_permalink();?>">
                <?php echo get_the_title();?>
            </a>
        </div>
        <div class="curso__desc"><?php echo get_excerpt_nbtn(200);?></div>
        <div class="curso__btn">
            <a href="<?php the_permalink();?>" class="btn" style="border-color: <?php echo $color;?>;">Saiba mais</a>
        </div>
    </div>
    <div class="curso__thumb">
        <?php thumblazy($curso, 'full', 'fade', get_the_title($curso));?>
    </div>
</div>