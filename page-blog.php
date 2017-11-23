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

			$bg_banner_single = 'style="background:url(' . $urlThumbnail . '); background-size: cover;"';

			} else {
						$urlThumbnail	= '';
						$bg_banner_single = '';
			}

?>
	<div class="banner-single" <?php echo $bg_banner_single; ?>>
		<header class="banner-single__header">
			<h2 class="banner-single__title"><?php the_title() ?></h2>
			<p class="banner-single__subtitle"><?php echo $resumoPage; ?></p>
		</header>
	</div>
	<!-- <div class="criacao__lista-servicos">
		<ul class="criacao__lista">
			<?php  

				$categories = get_categories( array(
				    'orderby' => 'name',
				    'parent'  => 0
				) );
				 
				foreach ( $categories as $category ) {
					if ( $slug_current == $category->slug ) {
						$is_active = ' active';
					} else {
						$is_active = '';
					}
				    printf( '<li class="' .  $category->slug . $is_active . '"><a href="%1$s"><h5>%2$s</h5></a></li>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_html( $category->name )
				    );
				}

			 ?>
		</ul>
	</div> -->
<article class="page-blog">
	<section class="blog">
		<header class="blog__header">
			<h2 class="blog__header-title">últimas Postagens</h2>
		</header>
		<div class="container">
			
			<ul class="blog__news">
				
  				<?php
			        $post_type_custom = 'post';
		          	if( is_tax() ) {
		            	$tax_slug =  'categoria';
		            	$args = array( 'post_type' => $post_type_custom, 'posts_per_page' => 20, 'oder_by' => 'date', 'order' => 'DESC', 'tax_query' => 
		            	array(  array( 'taxonomy'  => $tax_slug, 'field' => 'slug','terms' => get_queried_object()->slug,),), );
		          	}elseif( is_home() || is_front_page() ) {
		            	$args = array( 'post_type' => $post_type_custom, 'posts_per_page' => 20, 'oder_by' => 'date', 'order' => 'DESC' );
		          	}elseif( is_single() ) {
		            	$args = array( 'post_type' => $post_type_custom, 'posts_per_page' => 20, 'oder_by' => 'date', 'order' => 'DESC', 'post__not_in' => array( $post->ID ) );
		          	} elseif( is_search() ) {
		            	$args = array( 'post_type' => $post_type_custom, 's' => $_GET['s'], 'oder_by' => 'date', 'posts_per_page' => 20, 'order' => 'DESC' );
		          	} else {
		            	$args = array( 'post_type' => $post_type_custom, 'posts_per_page' => 20, 'oder_by' => 'date', 'order' => 'DESC' );
		          	}     
			        	$loop = new WP_Query( $args );
			          while ( $loop->have_posts() ) : $loop->the_post();
			            $slug = basename(get_permalink());
			            $classItem = $slug;
				?> 
		      	<li class="">
			        <table cellspacing="0" cellpadding="0" width="100%" border="0">
						<thead>
							<tr>
								<td class="date"><?php the_date('d/m'); ?></td>
								<td class="titlePost ">
									<h5 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h5>
								</td>
								<td class="comments"><span><?php comments_number( '0', '1', '%' ); ?></span></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="3" class=""><?php echo get_the_content(); ?></td>
							</tr>
						</tbody>
			        </table>
		      	</li>          
          		<?php endwhile; ?>     
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

