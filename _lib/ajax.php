<?php
/*
* AJAX functions
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//=========================================================================================
// MAILCHIMP
//=========================================================================================

function mailchimp_ajax_newsletter() {

    $mailchimp  = new mailchimp_form();
    $email      = $_POST['email'];
    $uf         = $_POST['uf'];
    $cidade     = $_POST['cidade'];

    echo json_encode( array(
            'error' => array (
            'add_list'  => $mailchimp->lead($email, $uf, $cidade),
            )
        ));
    exit;
}

add_action('wp_ajax_newsletter', 'mailchimp_ajax_newsletter');
add_action('wp_ajax_nopriv_newsletter', 'mailchimp_ajax_newsletter');

//=========================================================================================
// GET UF/CIDADES
//=========================================================================================

function getcidadesAjax() {

    global $wpdb;
    $tabela  = $wpdb->prefix."ajaxcidade";
    $estados = $_POST['estado'];

    if($estados == '') : echo '<option value="">Cidade</option>'; else :
        $myrows  = $wpdb->get_results( "SELECT * FROM $tabela WHERE estados_cod_estados=$estados GROUP BY nome ORDER BY nome");

        // print_r($myrows);

        echo '<option value="" selected="selected">Cidade</option>';
        foreach ($myrows as $row) {
            echo '<option value="'.$row->nome.'">'.$row->nome.'</option>';
        }
    endif;
    exit;
}

add_action('wp_ajax_getcidades', 'getcidadesAjax');
add_action('wp_ajax_nopriv_getcidades', 'getcidadesAjax');
