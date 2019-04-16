	</main>
	<?php if((get_theme_mods('footer-titulo')||get_theme_mods('imagens-footer')) && is_front_page() || $post->post_name == 'o-gatil'): ?>
		<?php if($post->post_name != 'o-gatil') : ?>
		<footer class="footer">
			<?php if(get_theme_mods('footer-titulo') && is_front_page()) : ?>
				<h2 class="title boxed"><?php echo get_theme_mod('footer-titulo'); ?></h2>
			<?php endif; ?>
			<?php get_template_part('template-parts/filiacao'); ?>
		</footer>
		<?php endif; ?>
	<?php endif; ?>
	<div class="copyright">
		<p><?php echo "&#x24B8; Copyright ".date('Y')." - ".get_bloginfo('name')." - Todos os direitos reservados. - Desenvolvido por <a href='http://www.uppercreative.com.br' title='uppercreative'>uppercreative</a>"; ?>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>