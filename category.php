<?php get_template_part('templates/html','header');?>
<?php 

$categories = get_the_category();
 
 $term_object = get_queried_object();
 $slug_current =  $term_object->slug;

?>
<article class="page-servico">
	<div class="banner-single">
		<header class="banner-single__header">
			<h4>BLOG / CATEGORIA:</h4>
			<h2 class="banner-single__title"><?php echo single_cat_title(); ?></h2>
			<p class="banner-single__subtitle"><?php echo category_description() ?></p>
		</header>
	</div>

	<div class="criacao__lista-servicos">
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
		</div>

	<section class="criacao">
		
		<div class="container">
			
			<main>
				 <ul class="nRow grid items border colls colls-1 vPadding bottomPadding">
    
    <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

			?>
    
			      <li class="coll item intraMargin-bottom animate">
			        
			        <table cellspacing="0" cellpadding="0" width="100%" border="0">
						<thead>
							<tr>
								<td class="date intraPadding_3"><?php the_date('d/m'); ?></td>
								<td class="titlePost intraPadding_3">
									<h5 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h5>
								</td>
								<td class="comments intraPadding_3"><span><?php comments_number( '0', '1', '%' ); ?></span></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="3" class="intraPadding_2"><?php echo get_the_content(); ?></td>
							</tr>
						</tbody>
			        </table>
			      </li>


			      <?php endwhile; ?>

			      <?php endif; ?> 

    </ul>
</main>

<div class="sidebar">

	<div class="search intraPadding_2">
				<header>
					<h4 class="title">PESQUISAR</h4>
				</header>
				<main>

					<form role="search" method="get" id="form_pesquisa" class="form_pesquisa_mobile" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="hidden" name="post_type" value="post">
						<label class="labelForm" for="s">O QUE VOCÊ ESTÁ BUSCANDO?</label>
						<input class="keyword" type="search" name="s" placeholder="DIGITE A SUA PESQUISA">
						<input class="submit" type="submit" value="" />
					</form>

				</main>
	</div>

	<div class="category intraPadding_2">
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

	<div class="archive intraPadding_2">
				<header>
					<h4 class="title">ARQUIVOS</h4>
				</header>
				<main>

					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
					</ul>

				</main>
	</div>

	<div class="comments intraPadding_2">
				<header>
					<h4 class="title">COMENTÁRIOS</h4>
				</header>
				<main>
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
				</main>
	</div>
	
</div>


			
		</div>
	</section>


</article>
<?php get_template_part('templates/newsletter','home');?>
<?php get_template_part('templates/html','footer');?>

