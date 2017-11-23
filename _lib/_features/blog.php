<?php
/*
* Blog Functions
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//=========================================================================================
// ARTIGOS MAIS VISTOS
//=========================================================================================

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//=========================================================================================
// IS_BLOG
//=========================================================================================

function is_blog () {
    global $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post') ) ? true : false ;
}

//=========================================================================================
// IFRAMES
//=========================================================================================

function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="frame-video"><div class="youtube__iframe load">' . $match . '</div></div>';
        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;
}
add_filter('the_content', 'div_wrapper');

//=========================================================================================
// BUSCA
//=========================================================================================

if (!is_admin()):
    //reescrita da url de busca
    function search_url_rewrite_rule() {
        if ( is_search() && !empty($_GET['s'])) {
            wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
        }
    }
    add_action('template_redirect', 'search_url_rewrite_rule');

    function SearchFilter($query) {
        if ($query->is_search) {
            $query->set('post_type', array('post'));
        }
        return $query;
    }
    add_filter('pre_get_posts','SearchFilter');

    //redirect blog posts
    // function redirect_single_post() {
    //     if (is_search()) {
    //         global $wp_query;
    //         if ($wp_query->post_count == 1) {
    //             wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    //         }
    //     }
    // }
    // add_action('template_redirect', 'redirect_single_post');
endif;