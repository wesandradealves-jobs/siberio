<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<h3 class="title boxed"><?php echo get_the_title(); ?></h3>
		<?php get_template_part('template-parts/header-gato'); ?>
		<?php if($post->post_name != 'contato') : ?>
			<section class="text-box">
				<div class="container">
					<?php 
						if($post->post_name != 'nossos-gatos'){
							the_content();
						} else {
					        $query_args = array(
						        'post_type' => 'gatos',
						        'posts_per_page' => -1,
						        'order' => 'ASC',
						        'order_by' => 'title'
					        );
					        $query = new WP_Query( $query_args );
					        if($query){
					        	?>
					        	<ul class="nossos-gatos">
					        		<?php 
						        		while ( $query->have_posts() ) : $query->the_post();
						        			?>
						        			<li onclick="document.location='<?php echo get_the_permalink(); ?>';return false;" >
						        				<?php 
						        					avatar(get_field('perfil')['avatar']);
						        				?>
						        				<h3 class="title">
						        					<?php the_title(); ?>
						        					<?php if( get_field('informacoes')['sexo']): ?>
						        						<span><?php echo get_field('informacoes')['sexo']; ?></span>	
						        					<?php endif; ?>
						        					<?php if( get_field('informacoes')['castrado']): ?>
						        						<small>Castrado</small>	
						        					<?php endif; ?>
						        				</h3>

						        			</li>
						        			<?php
						        		endwhile;
					        		?>
					        	</ul>
					          	<?php
					        }
					        wp_reset_query();
					        wp_reset_postdata();
						}
					?>
				</div>
			</section>	
		<?php endif; ?>
		<?php 
			if(get_field('galeria')){
				?>
					<section class="galeria">
						<?php 
							foreach (get_field('galeria') as $key => $value) {
								echo '<div><a style="background-image:url('.$value['imagem'].')" href="'.$value['imagem'].'" data-lightbox="galeria" data-title="'.get_the_title().'" data-alt="'.get_the_title().'"></a></div>';									
							}
						?>
					</section>
				<?php 
			}
		?>			
		<?php
			if($post->post_name == 'o-gatil'){
				get_template_part('template-parts/filiacao'); 
			} elseif($post->post_name == 'contato'){
				?>
				<?php if(get_theme_mod('telefone') || get_theme_mod('email') || get_theme_mod('social_networks')) : ?>
					<section class="contato">
						<div class="container">
							<?php if(get_theme_mod('email')) : ?>
								<p>
									<i class="fas fa-envelope"></i>
									<span><a href="mailto:<?php echo get_theme_mod('email'); ?>" title="<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></span>
								</p>
							<?php endif; ?>

							<?php if(get_theme_mod('telefone')) : ?>
								<p>
									<i class="fab fa-whatsapp"></i>
									<span><a href="tel:<?php echo get_theme_mod('telefone'); ?>" title="<?php echo get_theme_mod('telefone'); ?>"><?php echo get_theme_mod('telefone'); ?></a></span>
								</p>
							<?php endif; ?>

							<?php if ( get_theme_mod('facebook') || get_theme_mod('instagram')) : ?>
							<ul class="socialnetworks">
								<?php if ( get_theme_mod('facebook') ) : ?>
								<li><a href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a></li>
								<?php endif; ?>
								<?php if ( get_theme_mod('instagram') ) : ?>
								<li><a href="<?php echo get_theme_mod('instagram');  ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<?php endif; ?>
							</ul>

							<p>@siberio</p>
							<?php endif; ?>
						</div>
					</section>
				<?php endif; ?>
				<section class="contactform">
					<div class="container">
						<form method="POST" action="<?php echo site_url('PHPMailer/send.php') ?>">
							<span>
								<label for="Nome">Nome</label>
								<input required="required" type="text" name="Nome">
							</span>
							<span>
								<label for="Telefone">Telefone</label>
								<input type="tel" name="Telefone"  class="telefone">
							</span>
							<span>
								<label for="Email">Email</label>
								<input required="required" type="email" name="Email" >
							</span>
							<span>
								<label for="Mensagem">Mensagem</label>
								<textarea required="required" name="Mensagem" ></textarea>
							</span>
							 <span>
									<button class="btn btn-2">Enviar</button>
							</span>
						</form>
					</div>
				</section>
				<?php
			}
		?>
	<?php endwhile;
	endif; ?>
<?php get_footer(); ?>