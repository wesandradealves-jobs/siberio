<?php 
	if(is_archive()||is_category() && get_field('parallax', get_queried_object())){
		$imagem = get_field('parallax', get_queried_object())['imagem'];
		$texto = get_field('parallax', get_queried_object())['texto'];
	} elseif(is_front_page()){
		$texto = false;
		$imagem = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');
	} else {
		$texto = get_field('parallax')['texto'];
		$imagem = get_field('parallax')['imaegm'];
	}
?>

<?php if($imagem || $texto) : ?>
<div class="parallax <?php echo (isset($texto) && !is_front_page()) ? 'has_text' : '' ?>" style="background-image:url(<?php echo $imagem; ?>)">
	<?php if($texto && !is_front_page()): ?>
		<div class="container">
			<h3 class="titulo"><?php echo $texto; ?></h2>
		</div>
	<?php elseif(is_front_page()) : ?>
		<svg class="mask" viewbox="0 0 100 25">
			<path fill="#1e2637" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
		</svg>		
	<?php endif; ?>
</div>
<?php endif; ?>