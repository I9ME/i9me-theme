<?php //Capas
$pageid    = $wp_query->get_queried_object_id();
$post      = get_post($pageid);
$query_arg = $post->post_type;

if(is_single() && $query_arg == 'post') {$pageid = get_option( 'page_for_posts' );}
if(is_search())   : $sistema = 'search'; endif;
if(is_category()) : $sistema = 'category';  endif;
// if(is_tax('midias')) : $sistema = 'midias';  endif;

$args = array(
    'posts_per_page'  => 1,
    'post_type'       => 'header',
    'meta_query'      => array(
    'relation'        => 'OR',
        array(
            'key'     => 'pages',
            'value'   => $pageid,
            'compare' => 'IN',
        ),
        array(
            'key'     => 'posts',
            'value'   => $pageid,
            'compare' => 'IN',
        ),
        array(
            'key'     => 'archives',
            'value'   => array($query_arg),
            'compare' => 'IN',
        ),
        array(
            'key'     => 'sistema',
            'value'   => $sistema,
            'compare' => 'IN',
        ),
    ),
);
$header = new WP_Query($args);
while ( $header->have_posts()) : $header->the_post();
    $video    = get_post_meta(get_the_id(), 'video', 'true');
    $video_id = get_post_meta(get_the_id(), 'video_id', 'true');

    echo '<div class="topo__banner">
            <div class="topo__headline">
                <div class="container">
                    <h2 class="topo__titulo '.($video == 1 ? 'topo__titulo--video' : '').'">'.
                    ($video_id ? '<a href="#" class="topo__link"><i class="fa fa-play"></i><span>'.get_the_content().'</span></a>' : ''.get_the_content().'')
                    .'</h2>
                </div>
            </div>';
            the_post_thumbnail('full', array('class' => 'topo__image', 'alt' => get_the_title(), 'title' => get_the_title()));
    echo '</div>';
endwhile; wp_reset_postdata(); ?>