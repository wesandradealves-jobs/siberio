<?php 
	get_header(); 
	$q = get_the_terms( $post->ID , get_post_type().'_categories' )[0];
?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<h3 class="title boxed">
			<?php 
				print_r(get_post_type_object( get_post_type() )->labels->name);
			?>
		</h3>
		<?php get_template_part('template-parts/banner'); ?>
		<section class="single-perfil">
			<div class="container">
				<h2 class="title perfil-header" style="background-image:url(<?php echo get_field('bandeira', $q); ?>)">
					<span>
						<span><?php echo get_the_title(); ?></span>
						<!-- <span><?php echo get_field('perfil', $q)['nome']; ?></span> -->
						<span><small><?php echo get_field('perfil')['sexo'].( (get_field('perfil')['castrado'] ? ' Castrado' : '') ); ?></small></span>
					</span>
				</h2>
				<?php if(get_field('perfil')['cor']) : ?>
					<h4><?php echo get_field('perfil')['cor']; ?></h4>
				<?php endif; ?>
				<?php if(get_field('perfil', $q) && $post->post_name == 'fidel-taiga-star') : ?>
					<ul class="perfil-info">
						<?php 
							$values = array();
							foreach (get_field_object('perfil', $q)['value'] as $key => $value) {
								array_push($values, $value);
							}
							for ($i = 4; $i < sizeOf(get_field_object('perfil', $q)['sub_fields']); $i++) {
								echo '<li class="'.get_field_object('perfil', $q)['sub_fields'][$i]['name'].'"><p><strong>'.get_field_object('perfil', $q)['sub_fields'][$i]['label'].'</strong>: '.$values[$i].'</p></li>';
							}
						?>
					</ul>
				<?php endif; ?>				
			</div>
		</section>	
		<?php if(get_field('perfil')['premios'] || get_field('perfil')['curiosidade']): ?>
		<section class="premios">
			<span class="ribbon">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/ribbon.png" alt="<?php echo get_the_title(); ?>">
			</span>
			<h1 class="title">
				<?php echo get_field('perfil')['premios']; ?>
				<?php if(get_field('perfil')['curiosidade']) : ?>
					<small><?php echo get_field('perfil')['curiosidade']; ?></small>
				<?php endif; ?>
			</h1>
		</section>
		<?php endif ;?>
		<?php 
			if(get_field('perfil')['galeria']){
				?>
					<section class="galeria">
						<?php 
							foreach (get_field('perfil')['galeria'] as $key => $value) {
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