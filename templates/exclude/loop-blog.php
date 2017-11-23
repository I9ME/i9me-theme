 <?php $english = isEnglish(get_post()); ?>
<div class="news__bloco">
    <div class="news__thumb">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail('full', array('alt' => get_the_title(), 'title' => get_the_title())); ?>
        </a>
    </div>
    <div class="news__content">
        <div class="news__data"><?php if($english == false){the_time('l'); echo ' | ';} ?><?php the_time('d/m/Y') ?></div>
        <div class="news__titulo"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
        <div class="news__texto"><?php echo get_excerpt_nbtn(100);?></div>
    </div>
    <div class="news__btn">
        <a class="btn" href="<?php the_permalink();?>"><?php echo ($english == true ? 'Read More' : 'Saiba Mais');?></a>
    </div>
</div>