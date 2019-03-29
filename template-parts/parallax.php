<div class="parallax <?php echo (get_field('parallax')['texto'] && !is_front_page()) ? 'has_text' : '' ?>" style="background-image:url(<?php echo get_field('parallax')['background']; ?>)">
	<?php if(get_field('parallax')['texto'] && !is_front_page()): ?>
		<div class="container">
			<h3 class="titulo"><?php echo get_field('parallax')['texto']; ?></h2>
		</div>
	<?php endif; ?>
</div>