<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('template-parts/banner'); ?>
		<h3 class="title boxed"><?php echo get_queried_object()->name; ?></h3>
		<?php if(get_queried_object()->description && get_queried_object()->slug != 'gato-siberiano') : ?>
			<section class="text-box">
				<div class="container">
					<?php echo get_queried_object()->description; ?>
				</div>
			</section>		
		<?php endif; ?>
		<?php 
			if(get_queried_object()->slug == 'gato-siberiano' && get_field('perfil', get_queried_object())) :
				?>
				<section class="perfil">
					<div class="container">
						<?php if(get_field('perfil')['avatar']) : ?>
							<?php 
								avatar(get_field('perfil', get_queried_object())['avatar']);
							?>
						<?php endif; ?>
						<div class="content">
							<ul class="perfil-info">
								<?php 
									$values = array();
									foreach (get_field('perfil', get_queried_object()) as $key => $value) {
										array_push($values, $value);
									}
									for ($i = 2; $i < sizeOf(get_field_object('perfil', get_queried_object())['sub_fields']); $i++) {
										echo '<li class="'.get_field_object('perfil', get_queried_object())['sub_fields'][$i]['name'].'"><p><strong>'.get_field_object('perfil', get_queried_object())['sub_fields'][$i]['label'].'</strong>: '.$values[$i].'</p></li>';
									}
									if(get_queried_object()->description) :
										echo '<li><p>'.get_queried_object()->description.'</p></li>';
									endif;
								?>
							</ul>
						</div>
					</div>
				</section>			
			<?php
			endif;
		?>
		<?php 
			if(get_field('parallax', get_queried_object())){
				get_template_part('template-parts/parallax');
			}
		?>
		<?php 
			if(get_queried_object()->slug == 'gato-siberiano' && get_field('descricao', get_queried_object())) : ?>
			<section class="descricao">
				<div class="container">
					<?php				
					$values = array();
					foreach (get_field('descricao', get_queried_object()) as $key => $value) {
						array_push($values, $value);
					}?>
					<ul class="tabs">
						<?php 
							for ($i = 0; $i < sizeOf(get_field_object('descricao', get_queried_object())['sub_fields']); $i++) {
								?>
									<li>
										<div class="aba">
											<?php 
												echo get_field_object('descricao', get_queried_object())['sub_fields'][$i]['label'];
											?>		
										</div>
										<!--  -->
										<div class="mobile">
											<?php 
												echo $values[$i];
											?>									
										</div>														
									</li>

								<?php 
							}
						?>
					</ul>
					<ul class="tabs-content">
						<?php 
							for ($i = 0; $i < sizeOf(get_field_object('descricao', get_queried_object())['sub_fields']); $i++) {
								?>
									<li>
										<?php 
											echo $values[$i];
										?>									
									</li>
								<?php 
							}
						?>	
					</ul>		
				</div>
			</section>		
		<?php
			endif;
		?>
	<?php endwhile; 
endif; ?>
<?php get_footer(); ?>