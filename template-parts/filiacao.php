			<?php if(get_theme_mods('imagens-footer')) : ?>

				<ul class="filiacao">
					<?php if($post->post_name == 'o-gatil'): ?>
						<li class="filiacao-header"><h4 class="title">Somos filiados ao:</h4></li>
					<?php endif; ?>					
					<li>
						<a target="_blank" href="https://www.clubebrasileirodogato.com.br/"><img height="90" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/508b34_e92dd4cc3899488f9f6bbe0c508ea099.png"/></a>
					</li>
					<li>
						<a target="_blank" href="http://fifeweb.org/index.php"><img height="90" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/fifelogo.png"/></a>
					</li>
				</ul>
			<?php endif; ?>