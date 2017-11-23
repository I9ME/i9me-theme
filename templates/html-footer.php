</main>
	<footer class="footer">
		<div class="footer__layertop">
			<div class="container">
				<ul class="footer__bloco">
					<h3 class="footer__title">Design</h3>
					<li><a href="#">Design de Marcas</a></li>
					<li><a href="#">Papelaria Corporativa</a></li>
					<li><a href="#">Anúncios On/Off</a></li>
					<li><a href="#">Ilustrações</a></li>
				</ul>
				<ul class="footer__bloco">
					<h3 class="footer__title">Web</h3>
					<li><a href="#">Websites</a></li>
					<li><a href="#">Lojas Virtuais</a></li>
					<li><a href="#">Campanhas</a></li>
					<li><a href="#">Consultorias</a></li>
				</ul>
				<ul class="footer__bloco">
					<h3 class="footer__title">Contatos</h3>
						<li class="footer__fones--d"><div><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>(85)3025-0000</strong></div></li>
						<li class="footer__fones--d"><div><i class="fa fa-whatsapp" aria-hidden="true"></i> <strong>(85)99862-4149</strong></div></li>
					
						<li class="footer__fones"><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>(85)3025-0000</strong></a></li>
						<li class="footer__fones"><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i> <strong>(85)99862-4149</strong></a></li>
						
						<?php  wp_nav_menu( array(
	            		'theme_location'  => 'menu_2', 
	            		'menu_class'      => 'menu__nav ',
	            		'container_class' => 'footer__menu'.$css.'')); ?>
				</ul>
				<div class="footer__bloco footer__bloco--iframe">
					
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fi9mewebdesign%2F%3Fhc_ref%3DSEARCH%26fref%3Dnf&tabs=timeline&width=340&height=223&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" style="border:none;overflow:hidden;max-width:100%;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
			</div>
		</div>
		
		<div class="footer__layerbottom">
			<div class="container">
				<div class="header__brand header__brand--footer">
			        <a href="<?php echo home_url(); ?>">            
			            <h1 class="header__logo">
		                  	<span class="header__letter header--i">I</span>
		                  	<span class="header__letter header--n">9</span>
		                  	<span class="header__letter header--m">M</span>
		                  	<span class="header__letter header--e">E</span>
			            </h1>           
			            <div class="header__name">
			                <span class="">Web & Design</span>
			            </div>
			        </a>
			     </div>
				<div class="footer__copyright">
					<span>Copyright © 2017 <strong>I9ME Web & Design.</strong> Todos os direitos reservados.</span>
				</div>
			</div>
		</div>
	
	</footer>
<?php wp_footer(); ?>
	<script> new WOW().init(); </script>
</body>
</html>