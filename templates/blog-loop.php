<article class="blog__conteudo">
	<div class="container">
	
		<?php 
			if( is_home() || is_front_page() ) {	
				$limit_res = '2';
			} else {
				$limit_res = '12';
			}
			$args = array( 'post_type' => 'post', 'posts_per_page' => $limit_res, 'orderby' => 'date', 'order' => 'DESC' );
		?>

		<ul class="blog-boxe" id="blog">
			<?php $loop = new WP_Query( $args );
				
				$contador = 1; //Iniciado em um para exibir um na primeira iteração

				while ( $loop->have_posts() ) : $loop->the_post();
					
					//Variaveis do Post
					$resumo = get_the_excerpt();

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
		    <li class="blog-boxe__item">
				<figure class="blog-boxe__figure">
					<a href="<?php echo get_permalink(); ?>">
					<img src="<?php echo $urlThumbnail; ?>" alt="<?php echo get_the_title(); ?>">
						<figcaption class="blog-boxe__legend">
							<div class="groupboxes__border groupboxes__border--blog <?php if( $contador % 2 == 0 ) { echo 'groupboxes__border--right groupboxes__border--blog-right'; } ?>">
								<h5 class="groupboxes__title"><?php echo get_the_title(); ?></h5>
									<span class="groupboxes__subtitle groupboxes__subtitle--blog"><?php echo get_the_excerpt(); ?></span>
							</div>
						</figcaption>
					</a>
				</figure>
			</li>
			<?php $contador += 1; //Incrementa o contador para a próxima iteração do loop ?>
		    <?php endwhile; ?>
		</ul>
		<div class="groupboxes__vermais">
			<a href="<?php echo home_url(); ?>/blog/" class="btn-plus"></a>
		</div>	
	</div>
	
</article>