<?php get_template_part('templates/html','header');?>
<?php 
	/*$page = get_page_by_path('clientes');
	$resumoSection = get_post_custom_values('wpcf-resume', $page->ID);
	$resumoSection = $resumoSection[0];*/
	$resumoPost = get_post_custom_values('wpcf-resume');
	$resumoPost = $resumoPost[0];
	$slug_current = basename(get_permalink());
?>

<div class="banner-single">
		<header class="banner-single__header">
			<h2 class="banner-single__title">JOBS DO CLIENTE: <?php the_title() ?></h2>
			<p class="banner-single__subtitle"><?php echo $resumoPost; ?></p>
		</header>
</div>
	<div class="container">
		<div class="containerowl groupboxes portifolio-interna">
	    	<?php get_template_part('templates/portfolio','loop');?>
		</div>
	</div>
	
<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>