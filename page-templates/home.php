<?php
    /**
    * Template Name: Home
    */
?>
<?php get_header(); ?>

<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
	<?php if(get_field('webdoor')) : ?>
	<section class="webdoor-wrapper">
		<div class="webdoor">
			<?php 
				foreach (get_field('webdoor') as $key => $value) {
					?>
					<div data-title="<?php echo ($value['url_categoria']) ? $value['url_categoria']->name : get_the_title($value['url_pagina']->ID); ?>" class="item" onclick="document.location='<?php echo ($value['url_categoria']) ? get_term_link($value['url_categoria']->term_id) : get_page_link($value['url_pagina']->ID); ?>'" style="background-image:url(<?php echo $value['imagem']; ?>)">
						<div class="container">
							
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</section>
	<?php endif; ?>
	<?php if(get_field('navegacao')) : ?>
	<section class="navegacao" style="background-image:url(<?php echo get_field('navegacao')['background'] ?>)">
		<div class="container">
			<div class="navegacao">
				<?php 
					foreach (get_field('navegacao')['links'] as $key => $value) {
						?>
						<a href="<?php echo get_page_link($value['url']->ID); ?>">
							<i>
								<img src="<?php echo $value['icone'] ?>" alt="">
							</i>
							<h3>
								<?php echo get_the_title($value['url']->ID); ?>
							</h3>
						</a>
						<?php
					}
				?>	
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if(get_page_by_path('nossa-historia')->ID) : ?>
	<section class="quem-somos">
		<div class="container-wrapper">
			<div class="container">
				<h2 class="titulo">Quem somos</h2>
				<p><?php echo get_the_excerpt(get_page_by_path('nossa-historia')->ID); ?></p>
				<span class="btn-wrapper">
					<a href="<?php echo get_page_link(get_page_by_path('nossa-historia')->ID); ?>" class="btn btn-1" title="Saiba Mais">Saiba Mais</a>
				</span>
			</div>
		</div>		
		<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')) : ?>
			<?php get_template_part('template-parts/parallax'); ?>
		<?php endif; ?>			
	</section>
	<?php endif; ?>
	<section class="parallax-content">
		<div class="container">
			<h2 class="titulo"><?php echo get_the_excerpt(); ?></h2>
			<?php 
				the_content();
			?>
		</div>
	</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>

