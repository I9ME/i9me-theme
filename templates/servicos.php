<?php 
	$page = get_page_by_path('servicos');
	$resumoSection = get_post_custom_values('wpcf-resume', $page->ID);
	$resumoSection = $resumoSection[0];
?>
<section class="servicos">
	<div class="servicos__layertop">
		<header class="header-section">
			<div class="header-section__box header-section__box--before-blue">
				<h2 class="header-section__title header-section__title--before-blue wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0s"><?php echo get_the_title( $page ); ?></h2>
			</div>
			
			<p class="header-section__subtitle header-section__subtitle--textwhite wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.99s">
				<?php 
					echo $resumoSection;
				 ?>	 	
			</p>
		</header>
		
	</div>
	
	<?php get_template_part('templates/servico','loop');?>
	
	
</section>

<?php wp_reset_postdata(); ?>