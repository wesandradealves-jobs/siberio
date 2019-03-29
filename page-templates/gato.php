<?php
    /**
    * Template Name: Gato
    */
?>
<?php get_header(); ?>
	<?php if ( have_posts () ) :
		while (have_posts()) : 
			the_post(); ?>
		<?php get_template_part('template-parts/header-gato'); ?>
		<h3 class="title boxed"><?php echo get_the_title(); ?></h3>
		<?php if(!get_field('mostrar_perfil')) : ?>
			<section class="text-box">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</section>
		<?php else : ?>
			<section class="perfil">
				<div class="container">
					<?php if(get_field('perfil')['avatar']) : ?>
						<?php 
							avatar(get_field('perfil')['avatar']);
						?>
					<?php endif; ?>
					<div class="content">
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
					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php if(get_field('parallax')) : ?>
			<?php get_template_part('template-parts/parallax'); ?>
		<?php endif; ?>
		<?php if(get_field('mostrar_descricao')) : ?>
			<section class="descricao">
				<div class="container">
					<?php 
						$values = array();

						foreach (get_field_object('descricao')['value'] as $key => $value) {
							array_push($values, $value);
						}
						// 
						echo '<ul class="tabs">';
							for ($i = 0; $i < sizeOf(get_field_object('descricao')['sub_fields']); $i++) {
								echo '<li class="'.get_field_object('descricao')['sub_fields'][$i]['name'].'">'.get_field_object('descricao')['sub_fields'][$i]['label'].'</p></li>';
							}
						echo '</ul>';
						echo '<ul class="tabs-content">';
							for ($i = 0; $i < sizeOf(get_field_object('descricao')['sub_fields']); $i++) {
								echo '<li class="'.get_field_object('descricao')['sub_fields'][$i]['name'].'"><p>'.$values[$i].'</p></li>';
							}
						echo '</ul>';	
					?>
				</div>
			</section>
		<?php endif; ?>		
	<?php endwhile; 
	endif; ?>
	<?php get_footer(); ?>
<?php get_footer(); ?>