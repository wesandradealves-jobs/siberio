			<?php if(get_theme_mods('imagens-footer')) : ?>

				<ul class="filiacao">
					<?php if($post->post_name == 'o-gatil'): ?>
						<li class="filiacao-header"><h4 class="title">Somos filiados ao:</h4></li>
					<?php endif; ?>					
					<?php 
						if(stripos(get_theme_mod('imagens-footer'),',')){
							foreach (explode(',',get_theme_mod('imagens-footer')) as $key => $value) {
								echo '<li><img src="'.$value.'"/></li>';
							}
						}
					?>
				</ul>
			<?php endif; ?>