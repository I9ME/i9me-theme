<?php

add_filter( 'rwmb_meta_boxes', 'wpcf_meta_boxes_pages' );
function wpcf_meta_boxes_pages($meta_boxes) {

//=========================================================================================
// PAGES: CONTATO
//=========================================================================================

$meta_boxes[] = array(
    'id' => 'contato',
    'title' => 'Formulário',
    'pages' => array( 'page' ),
    'context' => 'side',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-contato.php','page-contato-en.php'),
    ),
    'fields' => array(
        array(
            'name'              => 'Código do Formulário',
            'id'                => 'form',
            'type'              => 'text',
        ),
    )
);

//=========================================================================================
// PAGES: PRODUTO
//=========================================================================================

$meta_boxes[] = array(
    'id' => 'produto-single-prod',
    'title' => 'Produção',
    'pages' => array( 'page' ),
    'context' => 'side',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-produto-interna.php','page-produto-interna-en.php'),
    ),
    'fields' => array(
        array(
            'name'          => '',
            'id'            => 'producao',
            'type'          => 'checkbox_list',
            'options'       => array('Jan' => 'Janeiro', 'Fevereiro' => 'Fev','Mar' => 'Março', 'Abr' => 'Abril','Mai' => 'Maio', 'Jun' => 'Junho', 'Jul' => 'Julho', 'Ago' => 'Agosto', 'Set' => 'Setembro', 'Out' => 'Outubro', 'Nov' => 'Novembro', 'Dez' => 'Dezembro')
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'produto-single',
    'title' => 'Características Gerais',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-produto-interna.php','page-produto-interna-en.php'),
    ),
    'fields' => array(
        array(
            'name'          => '',
            'id'            => 'caracteristicas',
            'type'          => 'group',
            'fields' => array(
                array(
                    'name'          => 'Peso',
                    'id'            => 'peso',
                    'type'          => 'text',
                ),
                array(
                    'name'          => 'Cor da Casca',
                    'id'            => 'casca',
                    'type'          => 'textarea',
                ),
                array(
                    'name'          => 'Cor da Polpa',
                    'id'            => 'polpa',
                    'type'          => 'textarea',
                ),
                array(
                    'name'          => 'Outras Informações',
                    'id'            => 'infos',
                    'type'          => 'textarea',
                ),
                array(
                    'name'          => 'Tipo',
                    'id'            => 'tipo',
                    'type'          => 'text',
                ),
            )
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'produto-single-pacote',
    'title' => 'Empacotamento',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-produto-interna.php','page-produto-interna-en.php'),
    ),
    'fields' => array(
        array(
            'name'          => '',
            'id'            => 'empacotamento',
            'type'          => 'group',
            'fields' => array(
                array(
                    'name'          => 'Embalagens',
                    'id'            => 'embalagens',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 7,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'name'          => 'Caixas/Pallet',
                    'id'            => 'caixas',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 7,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'name'          => 'Pallets/Container',
                    'id'            => 'pallets',
                    'type'          => 'text',
                    // 'options'   => array(
                    //     'textarea_rows' => 7,
                    //     'teeny'         => true,
                    //     'media_buttons' => false,
                    // ),
                ),
                array(
                    'name'          => 'Temperatura',
                    'id'            => 'temperatura',
                    'type'          => 'text',
                ),
            )
        ),
    )
);

//=========================================================================================
// PAGES: SOBRE
//=========================================================================================

$meta_boxes[] = array(

    'id' => 'img-sobre',
    'title' => 'Imagem Destaque',
    'pages' => array( 'page' ),
    'context' => 'side',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-institucional.php','page-institucional-en.php'),
    ),
    'fields' => array(
        array(
            'name'              => '',
            'id'                => 'thumb_institucional',
            'type'              => 'image_advanced',
            'max_file_uploads'  => 1,
        ),
    )
);



$meta_boxes[] = array(
    'id' => 'infra-sobre',
    'title' => 'Infraestrutura',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-institucional.php','page-institucional-en.php'),
    ),
    // List of meta fields
    'fields' => array(
        array(
            'type' => 'heading',
            'name' => 'Descrição',
        ),
        array(
            'name'          => '',
            'id'            => 'infra_tit',
            'desc'          => 'Descrição',
            'type'          => 'textarea',
        ),
        array(
            'name'          => '',
            'id'            => 'infra',
            'type'          => 'group',
            'clone'         => true,
            'fields' => array(
                array(
                    'name'          => '',
                    'id'            => 'info',
                    'desc'          => 'Texto',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 7,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'name'              => '',
                    'id'                => 'thumb',
                    'type'              => 'image_advanced',
                    'max_file_uploads'  => 1,
                ),
            ),
        ),
        array(
            'name'          => '',
            'id'            => 'infra_sub',
            'type'          => 'group',
            'fields' => array(
                array(
                    'type' => 'heading',
                    'name' => 'Melões nobres e Mamões',
                ),
                array(
                    'name'          => '',
                    'id'            => 'melao_mamao',
                    'desc'          => '',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'type' => 'heading',
                    'name' => 'Frutos Quentes',
                ),
                array(
                    'name'          => '',
                    'id'            => 'frutos_quentes',
                    'desc'          => '',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'type' => 'heading',
                    'name' => 'Parque Frio',
                ),
                array(
                    'name'          => '',
                    'id'            => 'parque_frio',
                    'desc'          => '',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
            ),
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'parcerias-sobre',
    'title' => 'Parcerias',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-institucional.php','page-institucional-en.php'),
    ),
    'fields' => array(
        array(
            'name'          => '',
            'id'            => 'parcerias',
            'type'          => 'group',
            'fields' => array(
                array(
                    'name'          => '',
                    'id'            => 'desc',
                    'desc'          => 'Texto',
                    'type'          => 'wysiwyg',
                    'options'   => array(
                        'textarea_rows' => 7,
                        'teeny'         => true,
                        'media_buttons' => false,
                    ),
                ),
                array(
                    'name'              => '',
                    'id'                => 'thumb',
                    'type'              => 'image_advanced',
                    'max_file_uploads'  => 1,
                ),
            ),
        ),
    )
);

$meta_boxes[] = array(
    'id' => 'desempenho-sobre',
    'title' => 'Desempenho',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-institucional.php','page-institucional-en.php'),
    ),
    'fields' => array(
         array(
            'name'          => '',
            'id'            => 'desempenho',
            'desc'          => 'Texto',
            'type'          => 'wysiwyg',
            'options'   => array(
                'textarea_rows' => 7,
                'teeny'         => true,
                'media_buttons' => false,
            ),
        ),
    )
);


$meta_boxes[] = array(
    'id' => 'local-sobre',
    'title' => 'Local',
    'pages' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-institucional.php','page-institucional-en.php'),
    ),
    'fields' => array(
        array(
            'name'          => '',
            'id'            => 'local_tit',
            'desc'          => 'Subtitulo',
            'type'          => 'textarea',
        ),
        array(
            'name'          => '',
            'id'            => 'local',
            'desc'          => 'Texto',
            'type'          => 'wysiwyg',
            'options'   => array(
                'textarea_rows' => 7,
                'teeny'         => true,
                'media_buttons' => false,
            ),
        ),
    )
);

//=========================================================================================
// END DEFINITION OF META BOXES
//=========================================================================================
    return $meta_boxes;
}