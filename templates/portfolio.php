<?php 
	$page = get_page_by_path('portfolios');
	$resumoSection = get_post_custom_values('wpcf-resume', $page->ID);
	$resumoSection = $resumoSection[0];
 ?>
<section class="portfolio">
	<header class="header-section">
		<div class="header-section__box">
			<h2 class="header-section__title wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0s">Portfólio</h2>
		</div>
		<p class="header-section__subtitle wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.99s">
			<?php echo $resumoSection; ?>	 	
		</p>
	</header>
	<article class="portfolio__conteudo">	
		<div class="container">
			
			<div class="groupboxes">
				<?php get_template_part('templates/portfolio','loop');?>
			</div>
			<div class="groupboxes__vermais wow rotateIn">
				<a href="<?php echo home_url() ?>/portfolios/" class="btn-plus">
				</a>
			</div>

		</div>
	</article>
</section>