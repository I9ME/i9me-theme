<?php 

	if( is_home() || is_front_page() ) {
		$limit_res = '8';

		
	} else {

		$limit_res = '40';

	}

	$args = array( 'post_type' => 'depoimento', 'posts_per_page' => $limit_res, 'orderby' => 'date', 'order' => 'ASC' );

 ?>

	
	<?php $loop = new WP_Query( $args );
		

		while ( $loop->have_posts() ) : $loop->the_post();
			
			//Variaveis do Post
			$resumo = get_post_custom_values('wpcf-resume');
			$resumo = $resumo[0];

			$cargo = get_post_custom_values('wpcf-cargo');
			$cargo = $cargo[0];

			if ( $cargo ) {

				$is_cargo = ', <span>' . $cargo . '</span>';

			}


			if ( has_post_thumbnail() ) {
			
			//Imagem Destacada	
			$image_id = get_post_thumbnail_id();
			$sizeThumbs = 'thumbnail';
			$urlThumbnail = wp_get_attachment_image_src($image_id, $sizeThumbs);
			$urlThumbnail = $urlThumbnail[0];

			} else {
						$urlThumbnail	= '';
			}

    ?>	


<?php 
// Get the ID of the parent post, which belongs to the "Writer" post type
$customer_id = wpcf_pr_post_get_belongs( get_the_ID(), 'cliente' );
// Get all the parent (writer) post data
$customer_post = get_post( $customer_id );
$customer_link = get_permalink( $customer_id );

?>


    <div class="item">
    	<div class="depoimentos__item">

	    	<div class="depoimentos__boxleft">
	    		<div class="depoimentos__img-cicle">
	    			<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
	    		</div>
	    		<h5 class="depoimentos__title"><?php echo get_the_title(); ?><?php echo $is_cargo; ?></h5>
	    		<span class="depoimentos__subtitulo">
	    			<a href="<?php echo $customer_link; ?>">
	    				<strong><?php echo  $customer_post->post_title; ?></strong>
	    			</a>
	    		</span>
	    	</div>
	    	<div class="depoimentos__boxright">
	    		<div class="depoimentos__border">
	    			<p class="depoimentos__info"><?php echo $resumo; ?></p>
	    		</div>
	    	</div>
	    	


    	</div>
    </div>
<?php endwhile; ?>
				  

