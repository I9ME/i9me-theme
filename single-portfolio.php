<?php get_template_part('templates/html','header');?>
	
	<?php //Busca dados no campo personalizado da Página
		$resumoPost = get_post_custom_values('wpcf-resume');
		$resumoPost = $resumoPost[0];
		$slug_current = basename(get_permalink());
 	?>
 	<?php //Variaveis do Post
	$miniatura = get_post_custom_values('wpcf-miniatura');
	$miniatura = $miniatura[0];
	if ( $miniatura ) {	
		//Imagem Destacada	
		$urlThumbnail = $miniatura;
		$bg_banner_single = 'style="background-image:url(' . $urlThumbnail . '); background-size: cover;"';
	} else {
		$urlThumbnail	= '';
		$bg_banner_single = '';
	}
	?>
 	<?php // Get the ID of the parent post, which belongs to the "Writer" post type
		$customer_id = wpcf_pr_post_get_belongs( get_the_ID(), 'cliente' );
		// Get all the parent (writer) post data
		$customer_post = get_post( $customer_id );
		$customer_link = get_permalink( $customer_id );
		// Get the ID of the parent post, which belongs to the "Writer" post type
		$service_id = wpcf_pr_post_get_belongs( get_the_ID(), 'servico' );
		// Get all the parent (writer) post data
		$service_post = get_post( $service_id );
		$service_link = get_permalink( $service_id );
	?>
	<div class="banner-single" <?php echo $bg_banner_single; ?>>
		<div class="container">
			<header class="banner-single__header">
				<h2 class="banner-single__title"><?php the_title() ?></h2>
				<p class="banner-single__subtitle"><?php echo $resumoPost; ?></p>
			</header>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="container">
			<?php get_template_part('breadcrumb');?>
		</div>
	</div>
<article class="page-portfolio">
	<?php 
		$post_id = get_the_ID();
		$childargs = array(
		'post_type' => 'content-block',
		'numberposts' => -1,
		'meta_key' => 'wpcf-order',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(array('key' => '_wpcf_belongs_portfolio_id', 'value' => $post_id ))
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
	    $miniatura = get_post_custom_values('wpcf-miniatura');
	    $miniatura = $miniatura[0];
	    $url_link = get_post_custom_values('wpcf-url');
	    $url_link = $url_link[0];
	    $url_title = get_post_custom_values('wpcf-url-title');
	    $url_title = $url_title[0];
    	if ( has_post_thumbnail() ) {
			//Imagem Destacada	
			$image_id = get_post_thumbnail_id();
			$sizeThumbs = 'full';
			$urlThumbnail = wp_get_attachment_image_src($image_id, $sizeThumbs);
			$urlThumbnail = $urlThumbnail[0];
		} else {
			$urlThumbnail	= '';
		}
 	?>
	<?php 
		if ( $tipo == 'grid' ) { 
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
	<section class="page-portfolio__blocos">
		<div class="page-portfolio__bloco-left <?php echo $estilo; ?>">
			<img src="<?php echo $bloco1_imagem; ?>" alt="<?php echo $bloco1_titulo; ?>, <?php the_title() ?>">
		</div>
		<div class="page-portfolio__bloco-right">
			<img src="<?php echo $bloco2_imagem; ?>" alt="<?php echo $bloco2_titulo; ?>, <?php the_title() ?>">
		</div>
		<div class="container">
			<div class="page-portfolio__info-left">
				<h4 class="page-portfolio__title"><?php echo $bloco1_titulo; ?></h4>
				<div class="page-portfolio__subtitle">
					<strong>Cliente: <a href="<?php echo $customer_link; ?>"><?php echo  $customer_post->post_title; ?></a></strong>
					
					<p>
						<?php echo $bloco1_conteudo; ?>
					</p>
				</div>
			</div>
			<div class="page-portfolio__info-right">
				<h4 class="page-portfolio__title"><?php echo $bloco2_titulo; ?></h4>
				<div class="page-portfolio__subtitle">
					<strong>Serviço: <a href="<?php echo $service_link; ?>"><?php echo  $service_post->post_title; ?></a></strong>
				
				<p>	
					<?php echo $bloco2_conteudo; ?>
				</p>
				</div>
			</div>			
		</div>
	</section>
	<?php } elseif ( $tipo == 'simple' && $estrutura == 'colls-full' ) { ?>
	<section class="page-portfolio__websites">
		<div class="container">
			<header class="page-portfolio__header">
				<h2 class="page-portfolio__header-title"><?php echo the_title(); ?></h2>
				<p  class="page-portfolio__header-subtitle"><?php echo get_the_content(); ?></p>
				<?php if ( $url_link ) { ?>
				<div class="page-portfolio__header-btn">
					<a href="<?php echo $url_link; ?>" target="_blank"><?php if ( $url_title ) { echo $url_title; } else { echo 'Acesse!'; } ?></a>
				</div>
				<?php } ?>
			</header>
		</div>
		<div class="page-portfolio__area-img">
			<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
		</div>
	</section>
	<?php } elseif ( $tipo == 'simple' && $estrutura == 'colls-2x2' ) { ?>
	<section class="page-portfolio__seo">
		<div class="container">
			<div class="page-portfolio__box-info">
				<header class="page-portfolio__header">
					<h2 class="page-portfolio__header-title"><?php echo the_title(); ?></h2>
					<p  class="page-portfolio__header-subtitle"><?php echo get_the_content(); ?></p>
				</header>
			</div>
			<div class="page-portfolio__box-imagem">
				<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
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
		
		<a href="<?php echo home_url(); ?>/portfolios/" class="controls__center"></a>
		
		<a class="controls__right">
			<?php next_post_link(   '%link', '', $in_same_term = true, $excluded_terms = '', $taxonomy = 'tipo-de-servico' ); ?>
		</a>
	</div>
</article>
<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>