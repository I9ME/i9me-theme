<?php

add_filter( 'mb_settings_pages', 'prefix_settings_pages' );
function prefix_settings_pages( $settings_pages ) {
    $settings_pages[] = array(
        'id'            => 'general',
        'option_name'   => 'options_general',
        // 'menu_title'    => 'Opções do Site',
        'icon_url'      => 'dashicons-images-alt',
        'menu_title'    => __( 'Opções do Tema', 'textdomain' ),
        'parent'        => 'themes.php',
    );
    return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'prefix_options_meta_boxes' );
function prefix_options_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'id'             => 'capas',
        'title'          => 'Capas Novidades',
        'settings_pages' => 'general',
        'context'        => 'side',
        'fields'         => array(
            array(
                'name' => '',
                'id'   => 'option_image_news',
                'type' => 'image_advanced',
                'desc' => 'Capa Novidades',
                'max_file_uploads' => 1,
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'endereco',
        'title'          => 'Endereço',
        'settings_pages' => 'general',
        'context'        => 'normal',
        'fields'         => array(
            array(
                'name'          => '',
                'desc'          => 'Endereço (pt-br)',
                'id'            => 'option_endereco',
                'type'          => 'textarea',
            ),
            array(
                'name'          => '',
                'desc'          => 'Endereço (english)',
                'id'            => 'option_endereco_en',
                'type'          => 'textarea',
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'news',
        'title'          => 'Desrição News',
        'settings_pages' => 'general',
        'context'        => 'normal',
        'fields'         => array(
            array(
                'name'          => '',
                'desc'          => 'Descritivo News (pt-br)',
                'id'            => 'option_desc_news',
                'type'          => 'wysiwyg',
                'options'       => array(
                    'textarea_rows' => 7,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),
            array(
                'name'          => '',
                'desc'          => 'Descritivo News (english)',
                'id'            => 'option_desc_news_en',
                'type'          => 'wysiwyg',
                'options'       => array(
                    'textarea_rows' => 7,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'             => 'localizacao',
        'title'          => 'Fazendas',
        'settings_pages' => 'general',
        'context'        => 'normal',
        'fields'         => array(
            array(
                'name'          => '',
                'desc'          => '',
                'id'            => 'option_fazendas',
                'type'          => 'group',
                'clone'         => true,
                'fields' => array(
                    array(
                        'name'   => 'Endereço',
                        'id'     => 'endereco',
                        'desc'   => 'Endereço da unidade. Ex: <b>Sítio Gravier - Zona Rural</b>',
                        'type'   => 'text',
                    ),
                    array(
                        'name'   => 'Cidade/UF',
                        'id'     => 'cidade',
                        'std'    => '',
                        'desc'   => 'Cidade e Estado da Unidade. Ex: <b>Icapuí-CE</b>',
                        'type'   => 'text',
                    ),
                    array(
                        'name'  => 'Latitude/Longitude',
                        'id'    => 'lat_long',
                        'desc'   => 'Latitude e Longitude da unidade. Ex: -3.72367,-38.528597',
                        'type'  => 'text',
                        'clone' => false,
                    ),
                )
            ),

        ),
    );

    return $meta_boxes;
}