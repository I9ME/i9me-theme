<?php get_template_part('templates/html','header');?>
	<?php 
		//Busca dados no campo personalizado da Página
		$resumoPost = get_post_custom_values('wpcf-resume');
		$resumoPost = $resumoPost[0];
		$slug_current = basename(get_permalink());

	 ?>
 	<?php 
		//Variaveis do Post
		$miniatura = get_post_custom_values('wpcf-miniatura');
		$miniatura = $miniatura[0];
		if ( $miniatura ) {
			//Imagem Destacada	
			$urlThumbnail = $miniatura;
			$bg_banner_single = 'style="background:url(' . $urlThumbnail . '); background-size: cover;"';
			} else {
				$urlThumbnail	= '';
				$bg_banner_single = '';
			}
	?>
<div class="banner-single" <?php echo $bg_banner_single; ?>>
	<header class="banner-single__header">
		<h2 class="banner-single__title"><?php the_title() ?></h2>
		<p class="banner-single__subtitle"><?php echo $resumoPost; ?></p>
	</header>
</div>
<article class="page-servico">
	
	<div class="breadcrumb">
		<div class="container">
			<?php get_template_part('breadcrumb');?>
		</div>
	</div>
	<section class="criacao">
		<div class="criacao__lista-servicos">
			<ul class="criacao__lista criacao__lista--interna">
				<?php

				$tax_slug =  'tipo-de-servico';
				$terms = get_the_terms( $post->ID, $tax_slug );
				$term = array_pop($terms);
				$term_slug = $term->slug;

				
            	$args = array( 'post_type' => 'servico', 'posts_per_page' => 10, 'order' => 'ASC', 'tax_query' => array(  array( 'taxonomy'  => $tax_slug, 'field' => 'slug','terms' => $term_slug),), );
				 ?>
				 <?php $loop = new WP_Query( $args );
          				while ( $loop->have_posts() ) : $loop->the_post();
          					
          					//Variaveis do Post
							$icone = get_post_custom_values('wpcf-icone');
							$icone = $icone[0];

							$icone_hover = get_post_custom_values('wpcf-icone-hover');
							$icone_hover = $icone_hover[0];

          					$slug = basename(get_permalink());

          		?>	
				<li class="<?php echo $slug; ?><?php if( $slug == $slug_current ) { echo ' active'; } ?>">
					<a href="<?php echo get_permalink(); ?>">
				 		<i class="criacao__<?php echo $slug; ?>">
				 			<img src="<?php echo $icone; ?>" alt="<?php echo the_title(); ?>" />
				 		</i>
						<h5><?php echo the_title(); ?></h5>
					</a>
				</li>
				<?php 
					endwhile;
					wp_reset_postdata();
					 ?>
			</ul>
		</div>
		
	</section>

<?php 

$post_id = get_the_ID();


$childargs = array(
'post_type' => 'content-block',
'numberposts' => -1,
'meta_key' => 'wpcf-order',
'orderby' => 'meta_value_num',
'order' => 'ASC',
'meta_query' => array(array('key' => '_wpcf_belongs_servico_id', 'value' => $post_id ))
);


 $loop = new WP_Query( $childargs );
 	while ( $loop->have_posts() ) : $loop->the_post();

 	$class_section = basename(get_permalink());

	$tipo = get_post_custom_values('wpcf-block-type');
    $tipo = $tipo[0];

    $estilo = get_post_custom_values('wpcf-block-estyle');
    $estilo = $estilo[0];

    $estrutura = get_post_custom_values('wpcf-block-structure');
    $estrutura = $estrutura[0];

     if ( has_post_thumbnail() ) {
			
			//Imagem Destacada	
			$image_id = get_post_thumbnail_id();
			$sizeThumbs = 'full';
			$urlThumbnail = wp_get_attachment_image_src($image_id, $sizeThumbs);
			$urlThumbnail = $urlThumbnail[0];

			} else {
						$urlThumbnail	= '';
			}

   


	/*
	$tipo = $child_post->fields['block-type'];

	$estilo = $child_post->fields['block-estyle'];

	$estrutura = $child_post->fields['block-structure'];
	
	//bloco 01
	$bloco1_titulo = $child_post->fields['block-01-title'];
	$bloco1_imagem = $child_post->fields['block-01-image'];
	$bloco1_imagem = $child_post->fields['block-01-content'];

	//bloco 02
	$bloco2_titulo = $child_post->fields['block-02-title'];
	$bloco2_imagem = $child_post->fields['block-02-image'];
	$bloco2_imagem = $child_post->fields['block-02-content'];

	//bloco 03
	$bloco3_titulo = $child_post->fields['block-03-title'];
	$bloco3_imagem = $child_post->fields['block-03-image'];
	$bloco3_imagem = $child_post->fields['block-03-content'];

	//bloco 04
	$bloco4_titulo = $child_post->fields['block-04-title'];
	$bloco4_imagem = $child_post->fields['block-04-image'];
	$bloco4_imagem = $child_post->fields['block-04-content'];

	//bloco 05
	$bloco5_titulo = $child_post->fields['block-05-title'];
	$bloco5_imagem = $child_post->fields['block-05-image'];
	$bloco5_imagem = $child_post->fields['block-05-content'];*/




 ?>

<?php if ( $tipo == 'simple' ) { ?>

	<section class="criacao__intro <?php echo $class_section; ?>">
		<div class="container">	
			<div class="criacao__area-info">
				<div class="criacao__area-imagem">
					<figure>
						<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
					</figure>
					<figcaption>
						<h2><?php echo the_title(); ?></h2>
						<p><?php echo get_the_content(); ?></p>
					</figcaption>
				</div>
			</div>
		</div>
	</section>

	<?php } elseif ( $tipo == 'bar' ) { ?>

	<?php 
		if ( has_post_thumbnail() ) {
				//Imagem Destacada	
				$image_id = get_post_thumbnail_id();
				$sizeThumbs = 'medium';
				$urlThumbnail = wp_get_attachment_image_src($image_id, $sizeThumbs);
				$urlThumbnail = $urlThumbnail[0];
				} else {
					$urlThumbnail	= '';
				}


	 ?>

<section style="background: url('<?php echo $urlThumbnail; ?>'); background-size: cover;" class="criacao__paralax <?php echo $class_section; ?>">

	<p><?php echo get_the_content(); ?></p>

</section>

<?php } elseif ( $tipo == 'grid' ) { ?>

<?php 

 //bloco 01
    $bloco1_titulo = get_post_custom_values('wpcf-block-01-title');
    $bloco1_titulo = $bloco1_titulo[0];

    $bloco1_imagem = get_post_custom_values('wpcf-block-01-image');
    $bloco1_imagem = $bloco1_imagem[0];
    $bloco1_icon = get_post_custom_values('wpcf-block-01-icon');
    $bloco1_icon = $bloco1_icon[0];

    $bloco1_conteudo = get_post_custom_values('wpcf-block-01-content');
    $bloco1_conteudo = $bloco1_conteudo[0];

	//bloco 02
    $bloco2_titulo = get_post_custom_values('wpcf-block-02-title');
    $bloco2_titulo = $bloco2_titulo[0];

    $bloco2_imagem = get_post_custom_values('wpcf-block-02-image');
    $bloco2_imagem = $bloco2_imagem[0];
    $bloco2_icon = get_post_custom_values('wpcf-block-02-icon');
    $bloco2_icon = $bloco2_icon[0];

    $bloco2_conteudo = get_post_custom_values('wpcf-block-02-content');
    $bloco2_conteudo = $bloco2_conteudo[0];

    //bloco 03
    $bloco3_titulo = get_post_custom_values('wpcf-block-03-title');
    $bloco3_titulo = $bloco3_titulo[0];

    $bloco3_imagem = get_post_custom_values('wpcf-block-03-image');
    $bloco3_imagem = $bloco3_imagem[0];
    $bloco3_icon = get_post_custom_values('wpcf-block-03-icon');
    $bloco3_icon = $bloco3_icon[0];

    $bloco3_conteudo = get_post_custom_values('wpcf-block-03-content');
    $bloco3_conteudo = $bloco3_conteudo[0];

    //bloco 04
    $bloco4_titulo = get_post_custom_values('wpcf-block-04-title');
    $bloco4_titulo = $bloco4_titulo[0];

    $bloco4_imagem = get_post_custom_values('wpcf-block-04-image');
    $bloco4_imagem = $bloco4_imagem[0];
    $bloco4_icon = get_post_custom_values('wpcf-block-04-icon');
    $bloco4_icon = $bloco4_icon[0];

    $bloco4_conteudo = get_post_custom_values('wpcf-block-04-content');
    $bloco4_conteudo = $bloco4_conteudo[0];

    //bloco 05
    $bloco5_titulo = get_post_custom_values('wpcf-block-05-title');
    $bloco5_titulo = $bloco5_titulo[0];

    $bloco5_imagem = get_post_custom_values('wpcf-block-05-image');
    $bloco5_imagem = $bloco5_imagem[0];
    $bloco5_icon = get_post_custom_values('wpcf-block-05-icon');
    $bloco5_icon = $bloco5_icon[0];

    $bloco5_conteudo = get_post_custom_values('wpcf-block-05-content');
    $bloco5_conteudo = $bloco5_conteudo[0];

 ?>

<section class="criacao__fase <?php echo $class_section; ?>">
	<div class="container">
		<div class="criacao__area-info">
			<div class="criacao__area-imagem criacao__area-imagem--fases">
				<figcaption>
					<h2><?php echo the_title(); ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt<br/> ut labore et dolore magna aliqua.ipsum dolor sit amet, consectetur adipisicing elit, ipsum. </p>
				</figcaption>
				<figure>
					<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
				</figure>
			</div>
		</div>
	
	<div class="criacao__lista-fase">
		<div class="criacao__col">			
			<figure class="criacao__img">
				<img src="<?php echo $bloco1_imagem; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				<div class="criacao__hover">
 					<img src="<?php echo $bloco1_icon; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				</div>
 			</figure>			
			<figcaption class="criacao__legenda">
				<h5><?php echo $bloco1_titulo; ?></h5>
				<p><?php echo $bloco1_conteudo; ?></p>
			</figcaption>
		</div>
		<div class="criacao__col criacao__col--right">
			<figure class="criacao__img criacao__img--right">
				<img src="<?php echo $bloco2_imagem; ?>" alt="<?php echo $bloco2_titulo; ?>">
				<div class="criacao__hover">
 					<img src="<?php echo $bloco2_icon; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				</div>
			</figure>
			<figcaption class="criacao__legenda criacao__legenda--left">
				<h5><?php echo $bloco2_titulo; ?></h5>
				<p><?php echo $bloco2_conteudo; ?></p>
			</figcaption>
		</div>
		<div class="criacao__col">			
			<figure class="criacao__img">
				<img src="<?php echo $bloco3_imagem; ?>" alt="<?php echo $bloco3_titulo; ?>">
 				<div class="criacao__hover">
 					<img src="<?php echo $bloco3_icon; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				</div>
 			</figure>			
			<figcaption class="criacao__legenda">
				<h5><?php echo $bloco3_titulo; ?></h5>
				<p><?php echo $bloco3_conteudo; ?></p>
			</figcaption>
		</div>
		<div class="criacao__col criacao__col--right">
			<figure class="criacao__img criacao__img--right">
				<img src="<?php echo $bloco4_imagem; ?>" alt="<?php echo $bloco4_titulo; ?>">
				<div class="criacao__hover">
 					<img src="<?php echo $bloco4_icon; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				</div>
			</figure>
			<figcaption class="criacao__legenda criacao__legenda--left">
				<h5><?php echo $bloco4_titulo; ?></h5>
				<p><?php echo $bloco4_conteudo; ?></p>
			</figcaption>
		</div>
		<div class="criacao__col">			
			<figure class="criacao__img">
				<img src="<?php echo $bloco5_imagem; ?>" alt="<?php echo $bloco5_titulo; ?>">
 				<div class="criacao__hover">
 					<img src="<?php echo $bloco5_icon; ?>" alt="<?php echo $bloco1_titulo; ?>">
 				</div>
 			</figure>			
			<figcaption class="criacao__legenda">
				<h5><?php echo $bloco5_titulo; ?></h5>
				<p><?php echo $bloco5_conteudo; ?></p>
			</figcaption>
		</div>
	</div>
</div>
</section>
<?php } ?>

<?php endwhile; ?>
<?php wp_reset_query(); ?>

<div class="controls">
		<a class="controls__left">
			<?php previous_post_link(   '%link', '', $in_same_term = true, $excluded_terms = '', $taxonomy = 'tipo-de-servico' ); ?>
		</a>
		<a href="<?php echo home_url(); ?>/servicos/" class="controls__center"></a>
		<a class="controls__right">
			<?php next_post_link(   '%link', '', $in_same_term = true, $excluded_terms = '', $taxonomy = 'tipo-de-servico' ); ?>
		</a>

</div>
	<div class="criacao__bottom-paralax">
		<div class="criacao__bottom-texto">
			<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt.</p>
		</div>
		<div class="criacao__bottom-lapis"></div>
	</div>

</article>



<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>