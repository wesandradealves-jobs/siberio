<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')) : ?>
<section class="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)">
	<?php if(!is_single()) : ?>
		<div class="container">
			<h2 class="titulo"><?php echo get_field('banner')['titulo']; ?></h2>
		</div>
	<?php endif; ?>
</section>
<?php endif; ?>