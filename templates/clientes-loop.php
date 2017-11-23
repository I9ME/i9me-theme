<?php 

	if( is_home() || is_front_page() ) {
		$limit_res = '8';

		
	} else {

		$limit_res = '40';

	}

	$args = array( 'post_type' => 'cliente', 'posts_per_page' => $limit_res, 'orderby' => 'date', 'order' => 'ASC' );

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


				    <div class="item">
				    	<div class="clientes__item">

					    	<a href="<?php echo get_permalink() ?>">
					    		<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
					    	</a>

				    	</div>
				    </div>
				    <?php endwhile; ?>