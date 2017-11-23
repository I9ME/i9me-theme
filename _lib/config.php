<?php
/*
* Configurações do Tema
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//=========================================================================================
// INCLUDE FUNCTIONS
//=========================================================================================

//===================================Painel================================================
require_once locate_template('/_lib/dashboard.php');
//================================Funções Dashboard========================================
require_once locate_template('/_lib/admin.php');//..................STYLE LOGIN/ADMIN
require_once locate_template('/_lib/filtros.php');//................FILTROS FIELDS
//===================================Features==============================================
require_once locate_template('/_lib/_features/social.php');//.......SOCIAL FIELDS
require_once locate_template('/_lib/_features/blog.php');//.........BLOG FUNCTIONS
require_once locate_template('/_lib/_features/remove.php');//.......CLEAN FUNCTIONS
require_once locate_template('/_lib/_features/excerpt.php');//......EXCERPT FUNCTIONS
require_once locate_template('/_lib/_features/share.php');//........SHARE FUNCTIONS
require_once locate_template('/_lib/_features/bem.php');//..........MENU BEM CSS
require_once locate_template('/_lib/_features/breadcrumbs.php');//..BREADCRUMBS
require_once locate_template('/_lib/_features/cforms.php');//.......CF7 SELECTS
require_once locate_template('/_lib/_features/dataformat.php');//...DATA FORMAT EVENTOS
// require_once locate_template('/_lib/_features/select.php');//....SELECT AJAX
require_once locate_template('/_lib/_features/pagnav.php');//.......PAGINATION
//===================================API's===============================================
// require_once locate_template('/_lib/_api/youtube/youtube.php');//....YOUTUBE
// require_once locate_template('/_lib/_api/facebook/facebook.php');//..FACEBOOK
// require_once locate_template('/_lib/_api/twitter/twitter.php');//....TWITTER
// require_once locate_template('/_lib/_api/instagram/instagram.php');//INSTAGRAM
//===================================Backend===============================================
require_once locate_template('/_lib/posts.php');//..................POST TYPE FUNCTIONS
require_once locate_template('/_lib/taxonomies.php');//.............TAXONOMIES FUNCTIONS
require_once locate_template('/_lib/thumbs.php');//.................THUMBNAIL FUNCTIONS
require_once locate_template('/_lib/shortcodes.php');//.............SHORTCODES FUNCTIONS
//===================================Tema==================================================
require_once locate_template('/_lib/scripts.php');//................SCRIPTS E CSS
require_once locate_template('/_lib/ajax.php');//...................FUNÇÕES AJAX

//=========================================================================================
// ADICIONANDO FAVICON
//=========================================================================================

function blog_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/_lib/_admin/favicon.png" />';
}
add_action('wp_head', 'blog_favicon');

//=========================================================================================
// CONFIGURAÇÕES DO TEMA
//=========================================================================================

function tema_setup() {

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'menu_1' => 'Menu Principal',
    'menu_2' => 'Menu Footer',
    
  ));

  add_editor_style('/assets/css/editor-style.css');//..Tell the TinyMCE editor to use a custom stylesheet
  add_theme_support('post-thumbnails');//..............Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  set_post_thumbnail_size(1200, 0, true);

  //***Switch default core markup for search form, comment form, and comments to output valid HTML5.
  //add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption'));
  //***Add post formats (http://codex.wordpress.org/Post_Formats)
  //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

}

add_action('after_setup_theme', 'tema_setup');

//=========================================================================================
// METABOX CLASS (Fields + Taxonomies Fields)
//=========================================================================================

if (is_admin()):
  define('RWMBC_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_metabox'));
  define('RWMBC_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_metabox'));
  require_once RWMBC_DIR . 'functions.php';
  require_once RWMBC_DIR . 'campos.php';
  require_once RWMBC_DIR . 'campos-pages.php';
  require_once RWMBC_DIR . 'campos-taxonomy.php';
  require_once RWMBC_DIR . 'settings.php';
endif;

//=========================================================================================
// MAILCHIMP
//=========================================================================================

add_action( 'customize_register', 'custom_tema_mailchimp' );
function custom_tema_mailchimp( $wp_customize ) {
    //mailchimp config
    $wp_customize->add_section('mailchimp' , array(
        'title' => 'ID do MAILCHIMP',
    ));

    $wp_customize->add_setting('info_mailchimp', array());
    $wp_customize->add_control('info_mailchimp', array(
      'label'      => 'Inserir ID do MAILCHIMP',
      'section'    => 'mailchimp',
      'settings'   => 'info_mailchimp',
    ));

    $wp_customize->add_setting('lista_mailchimp', array());
    $wp_customize->add_control('lista_mailchimp', array(
      'label'      => 'Inserir ID da Lista do MAILCHIMP',
      'section'    => 'mailchimp',
      'settings'   => 'lista_mailchimp',
    ));
}

define('MAILCHIMP_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib'));
define('MAILCHIMP_DIR', trailingslashit( STYLESHEETPATH . '/_lib'));
require_once MAILCHIMP_DIR . 'mailchimp.php';
