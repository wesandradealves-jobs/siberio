<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<h3 class="title boxed">Nossos Gatos</h3>
		<?php get_template_part('template-parts/header-gato'); ?>
		<section class="single-perfil">
			<div class="container">
				<h2 class="title perfil-header">
					<span><?php echo get_the_title(); ?></span>
					<?php 
						if(get_field('informacoes')['bandeira']){
							echo '<span class="flag" style="background-image:url('.get_field('informacoes')['bandeira'].')"></span>';
						}
					?>
				</h2>
				<h3 class="title"><?php echo get_field('informacoes')['raca']; ?>
					<small><?php echo get_field('informacoes')['sexo']; ?></small>
				</h3>
				<h4><?php echo get_field('informacoes')['cor']; ?></h4>
				<?php if(get_field('perfil')) : ?>
					<ul class="perfil-info">
						<?php 
							$values = array();
							foreach (get_field_object('perfil')['value'] as $key => $value) {
								array_push($values, $value);
							}
							for ($i = 1; $i < sizeOf(get_field_object('perfil')['sub_fields']); $i++) {
								echo '<li class="'.get_field_object('perfil')['sub_fields'][$i]['name'].'"><p><strong>'.get_field_object('perfil')['sub_fields'][$i]['label'].'</strong>: '.$values[$i].'</p></li>';
							}
							if(get_the_excerpt()) :
								echo '<li><p>'.get_the_excerpt().'</p></li>';
							endif;
						?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="premios">
			<span class="ribbon">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/ribbon.png" alt="<?php echo get_the_title(); ?>">
			</span>
			<?php if(get_field('informacoes')['premios']) : ?>
				<h1 class="title">
					<?php echo get_field('informacoes')['premios']; ?>
					<?php if(get_field('informacoes')['curiosidade']) : ?>
						<small><?php echo get_field('informacoes')['curiosidade']; ?></small>
					<?php endif; ?>
				</h1>
			<?php endif; ?>
		</section>
		<?php 
			if(get_field('informacoes')['galeria']){
				?>
					<section class="galeria">
						<?php 
							foreach (get_field('informacoes')['galeria'] as $key => $value) {
								echo '<div><a style="background-image:url('.$value['imagem'].')" href="'.$value['imagem'].'" data-lightbox="galeria" data-title="'.get_the_title().'" data-alt="'.get_the_title().'"></a></div>';									
							}
						?>
					</section>
				<?php 
			}
		?>
	<?php endwhile;
	endif; ?>
<?php get_footer(); ?>