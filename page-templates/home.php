<?php
    /**
    * Template Name: Home
    */
?>
<?php get_header(); ?>
<?php if(get_field('webdoor')) : ?>
<section class="webdoor-wrapper">
	<div class="webdoor">
		<?php 
			foreach (get_field('webdoor') as $key => $value) {
				?>
				<div data-title="<?php echo $value['titulo']; ?>" class="item" onclick="document.location='<?php echo $value['url']->guid ?>';return false;" style="background-image:url(<?php echo $value['imagem'] ?>)"></div>
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
					<a href="<?php echo $value['url']->guid ?>">
						<i>
							<img src="<?php echo $value['icone'] ?>" alt="<?php echo $value['titulo'] ?>">
						</i>
						<h3><?php echo $value['titulo'] ?></h3>
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
	<h2 class="titulo">Quem somos</h2>
	<div class="container-wrapper">
		<div class="container">
			<p><?php echo get_the_excerpt(get_page_by_path('nossa-historia')->ID); ?></p>
			<span class="btn-wrapper">
				<a href="<?php echo get_page_link(get_page_by_path('nossa-historia')->ID); ?>" class="btn btn-1" title="Saiba Mais">Saiba Mais</a>
			</span>
		</div>
	</div>
</section>
<?php endif; ?>
<?php if(get_field('parallax')) : ?>
	<?php get_template_part('template-parts/parallax'); ?>
	<?php if(get_field('parallax')['titulo']&&get_field('parallax')['texto']) : ?>
		<section class="parallax-content">
			<div class="container">
				<h2 class="titulo"><?php echo get_field('parallax')['titulo']; ?></h2>
				<?php echo get_field('parallax')['texto']; ?>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>