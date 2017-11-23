<?php
/*
* Custom Function's Metabox
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//RESETA O CAMPO "CURSO" CASO O EVENTO NÃO SEJA ATRIBUIDO A UM CURSO
function reset_evento( $post_ID, $post, $update ) {

  $agenda_tipo = get_post_meta( $post_ID, 'agenda_tipo', true);

  if($agenda_tipo == 1) :
    update_post_meta($post_ID, 'agenda_curso', '');
  endif;
}

add_action( 'save_post', 'reset_evento', 10, 3 );