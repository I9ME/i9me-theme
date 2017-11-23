<?php
/*
* Configurações de Taxonomias
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//=========================================================================================
// MODELO
//=========================================================================================

// $labels = array( 'name' => _x( 'NOME DA TAXONOMIA', 'Taxonomy General Name', 'text_domain' ));
// $args   = array(
//   'labels'            => $labels,
//   'hierarchical'      => true,
//   'public'            => true,
//   'show_ui'           => true,
//   'show_admin_column' => true,
//   'show_in_nav_menus' => true,
//   'show_tagcloud'     => true,
//   'rewrite'           => array('slug' => 'SLUG DA TAX'),
// );

// register_taxonomy( 'TAXONOMIA', array('TIPO DE POST OU POST TYPE'), $args);

//=========================================================================================
// TAXONOMIAS CURSOS
//=========================================================================================

$labels = array(
  'name'              => _x( 'Produtos', 'Taxonomy General Name', 'text_domain' ),
  'menu_name'         => __( 'Categorias', 'textdomain' ),
);
$args   = array(
  'labels'            => $labels,
  'hierarchical'      => true,
  'public'            => true,
  'show_ui'           => true,
  'show_admin_column' => true,
  'show_in_nav_menus' => true,
  'show_tagcloud'     => true,
  'rewrite'           => array('slug' => 'produto'),
);

register_taxonomy( 'categorias', array( 'produtos' ), $args );

//=========================================================================================
// FLUSH REWRITE
//=========================================================================================

function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'custom_taxonomy_flush_rewrite');