<section class="atendimento" id="atendimentos">
	<div class="container">
		<header class="header-section">
			<div class="header-section__box header-section__box--before-blue">
				<h2 class="header-section__title header-section__title--before-blue">Atendimento</h2>
			</div>
			
			<p class="header-section__subtitle header-section__subtitle--textwhite">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolorum sequi voluptatem reprehenderit. 		
			</p>
		</header>

		
		<div class="atendimento__boxform">
			<address class="atendimento__groupend">
				<div class="atendimento__group">
					<div class="atendimento__contato">
					<i class="fa fa-envelope" aria-hidden="true"></i><span>contato@i9me.com.br</span>
					</div>
					<div class="atendimento__fone">
					<i class="fa fa-phone" aria-hidden="true"></i><span><strong>(85) 4042-08000</strong></span>
					</div>
					<div class="atendimento__endereco">
					<i class="fa fa-map-marker fa2" aria-hidden="true"></i><span>R. leda pereira, Nº 534,<br/> sala 05 A - Fortaleza-CE <br/> CEP: 60821-572</span>
					</div>
				</div>
			</address>

			<div class="atendimento__form">
				<?php 
					echo do_shortcode('[contact-form-7 id="5" title="Atendimento"]' );
				?>
			</div>
		</div>






	</div>
</section>