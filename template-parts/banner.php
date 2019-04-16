<?php 
	if(is_archive() || is_category()){
		$imagem = get_field('banner', get_queried_object())['imagem'];
		$texto = get_field('banner', get_queried_object())['texto'];
	} else {
		$imagem = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');
		$texto = get_field('banner')['titulo'];
	}
?>

<?php if(($imagem || $texto) && $post->post_name != "contato") : ?>
	<section class="banner" style="background-image:url(<?php echo $imagem; ?>)">
		<?php if($texto) : ?>
			<div class="container">
				<h2 class="titulo"><?php echo $texto; ?></h2>
			</div>
		<?php endif; ?>
	</section>
<?php endif;  ?>