<?php get_template_part('templates/html','header');?>
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
			<h4 class="title-blog">BLOG</h4>
			<?php 	
				if ( have_posts() ) : 	
					while ( have_posts() ) : the_post();
			?>
			<h2 class="banner-single__title"><?php echo get_the_title(); ?></h2>
			<div class="banner-single__subtitle">
				<div class="data">
					<span><?php the_date('d/m'); ?></span>
				</div>
				<div class="comments">
					<span><?php comments_number( '0', '1', '%' ); ?></span>
				</div>
			</div>
			<?php 
			endwhile;
				else :
					echo '<h2 class="banner-single__title">Postagem não encontrada</h2>';	
				endif;		
			?>
		</header>
	</div>
	<article class="page-blog-post">
		<section class="blog">
			<div class="container">
				<ul class="blog__news">
	    				<?php
							if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
						?>   
						<li class="">
				    	<table cellspacing="0" cellpadding="0" width="100%" border="0">
							<!-- <thead>
								<tr>
									<td class="date"><?php //the_date('d/m'); ?></td>
									<td class="titlePost ">
										<h5 class="title"><a href="<?php// echo get_permalink(); ?>"><?php// echo the_title(); ?></a></h5>
									</td>
									<td class="comments"><span><?php //comments_number( '0', '1', '%' ); ?></span></td>
								</tr>
							</thead> -->
							<tbody>
								<tr>
									<td colspan="3" class="blog__conteudo"><?php echo the_content(); ?></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3">
										<table  cellspacing="0" cellpadding="0" width="100%" border="0" class="table-category">
											<tr>
												<td class="category category-tfoot">
													<h5>CATEGORIA(S)</h5>
														<ul>
											     		<?php 
											  				$categories = get_the_category();
															$separator = ' ';
															$output = '';
															if ( ! empty( $categories ) ) {
														    	foreach( $categories as $category ) {
														        	$output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>' . $separator;
														   	 	}
														    	echo trim( $output, $separator );
															}
											    		?>
														</ul>
												</td>
												<td class="tags">
													<h5>TAG(S)</h5>
													<ul>
														<?php
															$posttags = get_the_tags();
															if ($posttags) {
												  				foreach($posttags as $tag) {
												    				echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>'; 
												  				}
															}
														?>
													</ul>
												</td>
											</tr>
											<tr>
												<td colspan="2" class="comments-post">
													<h5>COMENTÁRIO(S)</h5>
													<div class="comments-block">
												 		<?php if ( comments_open() || get_comments_number() ) :
												            comments_template();
												          endif;
          												?>
        											</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</tfoot>
				        </table>
				    </li>
					    <?php endwhile;
					    else :
					    	echo '<p>Nenhum resultado encontrado!';
					    endif; 
						?> 
    			</ul>
			
			<div class="blog__sidebar">
				<div class="search">
					<header>
						<h4 class="title">PESQUISAR</h4>
					</header>
					<form role="search" method="get" id="form_pesquisa" class="form_pesquisa_mobile" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="hidden" name="post_type" value="post">
						<label class="labelForm" for="s">O QUE VOCÊ ESTÁ BUSCANDO?</label>
						<input class="keyword" type="search" name="s" placeholder="DIGITE A SUA PESQUISA">
						<input class="submit" type="submit" value="" />
					</form>
				</div>
				<div class="category">
					<header>
						<h4 class="title">CATEGORIAS</h4>
					</header>
					<main>
						<ul>
							<?php 
								$categories = get_categories( array(
								    'orderby' => 'name',
								    'parent'  => 0
								) );
								foreach ( $categories as $category ) {
								    printf( '<li><a href="%1$s">%2$s</a></li>',
								        esc_url( get_category_link( $category->term_id ) ),
								        esc_html( $category->name )
								    );
								}
				 			?>
						</ul>
					</main>
				</div>
				<div class="archive">
					<header>
						<h4 class="title">ARQUIVOS</h4>
					</header>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
					</ul>
				</div>
				<div class="comments">
					<header>
						<h4 class="title">COMENTÁRIOS</h4>
					</header>
					<ul>
						<?php
							$args = array(
								//'status' => 'hold',
								'number' => '5',
								//'post_id' => 1, // use post_id, not post_ID
							);
							$comments = get_comments($args);
							foreach($comments as $comment) :
								echo($comment->comment_author . '<br />' . $comment->comment_content);
							endforeach;
						?>
					</ul>
				</div>
			</div>	
		</div>
	</section>
</article>
<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>

