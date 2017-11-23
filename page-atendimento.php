<?php get_template_part('templates/html','header');?>

	<?php 
		global $page;
		$slug_page=$page->post_name;
		//Busca dados no campo personalizado da Página
		$resumoPage = get_post_custom_values('wpcf-resume');
		$resumoPage = $resumoPage[0];
		$slug_current = basename(get_permalink());
	?>
	<?php 
		if ( has_post_thumbnail() ) {
			
			//Imagem Destacada	
			$image_id = get_post_thumbnail_id();
			$sizeThumbs = 'full';
			$urlThumbnail = wp_get_attachment_image_src($image_id, $sizeThumbs);
			$urlThumbnail = $urlThumbnail[0];

			$bg_banner_single = 'style="background-image:url(' . $urlThumbnail . '); background-size: cover;"';

		} else {
			$urlThumbnail	= '';
			$bg_banner_single = '';
		}
	?>
	<div class="banner-single" 
	<?php echo $bg_banner_single; ?>>
		<header class="banner-single__header">
			<h2 class="banner-single__title"><?php the_title() ?></h2>
			<p class="banner-single__subtitle"><?php echo $resumoPage; ?></p>
		</header>
	</div>
	<div class="breadcrumb">
		<div class="container">
			<?php get_template_part('breadcrumb');?>
		</div>
	</div>
<article class="page-atendimento">

	<section class="contatos">
		<div class="container">
			<div class="contatos__img">
				<div class="contato-imagem"></div>
			</div>
			<div class="contatos__bloco-phone">
				<div class="contatos__phone">
					<div class="contatos__bloco-number">
						<i class="icon-phone"></i>
						<span>(85)</span><br/>
						<h4>4042-0800</h4>
					</div>
					<div class="contatos__bloco-number">
						<i class="icon-whats"></i>
						<span>(85)</span><br/>
						<h4>99862-4149</h4>
					</div>
					<div class="contatos__bloco-number">
						<i class="icon-mail"></i>
						<h5>contato@i9me.com.br</h5>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="localizacao">
		<article class="localizacao__conteudo">
			<div class="container">
				<header id="" class="title-atendimento">
					<div class="title-atendimento__info">
						<i class="icon-local"></i>
						<h2>Onde Estamos</h2>	
					</div>
					<p>Rua leda Pereira, Nº 534, Sala 05-A. Fortaleza/CE - CEP: 60821-572</p>
				</header>
				<header class="title-atendimento-mobile">
					<h2>Onde Estamos</h2>
					<p class="subtitle-atendimento-mobile">
					Rua leda Pereira, Nº 534, Sala 05-A. Fortaleza/CE - CEP: 60821-572</p>
				</header>
			<div class="localizacao__bloco-form">
					
				<?php echo do_shortcode('[contact-form-7 id="325" title="Page Atendimento"]'); ?>
			</div>
			<div class="localizacao__bloco-maps">
				<iframe class="localizacao__iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.09995194693!2d-38.490588385620505!3d-3.7884171445405173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c74f616e77fe93%3A0x2fa56ee94a69b0ea!2sI9ME+Web+%26+Design!5e0!3m2!1spt-BR!2sbr!4v1508249512584" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			</div>
		</article>
	</section>

	<section class="horarios">
		<div class="container">
			<p class="horarios__open">Funcionamos de <strong>segunda</strong> a <strong>sexta, das 8h as 18h.</strong></p>
		</div> 
	</section>


</article>
<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>

