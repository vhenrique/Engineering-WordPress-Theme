<?php 
/*
* Template name: Contato
*/
get_header(); 
	if(have_posts()): while(have_posts()): the_post(); 
		if($_POST){
			echo '<main class="row"><h1>Mensagem enviada.</h1></main>';
			wp_mail(get_bloginfo('admin_email'), 'Contato '.get_bloginfo('name'), $_POST['message']);
		} else{	?>
			<main class="row">
				<h1 class="marginUD20"><?php echo get_the_title(); ?></h1>
				<hr>
				<div class="large-6 column">
					<form method="POST" action="<?php echo get_permalink() ?>">
						<fieldset>
							<label for="name"></label>
							<input type="text" name="name" id="name" placeholder="Nome" required />
						</fieldset>
						<fieldset>
							<label for="email"></label>
							<input type="email" name="email" id="email" placeholder="Email" required />
						</fieldset>
						<fieldset>
							<label for="message"></label>
							<textarea name="message" id="message" placeholder="Mensagem" rows="5" required></textarea>
						</fieldset>
						<input type="submit" value-"Enviar" class="button" />
					</form>
				</div>
				<div class="large-6 column">
					<?php if(!empty($redux_options[$themePrefix.'cs_googleMaps'])){
						echo $redux_options[$themePrefix.'cs_googleMaps'];
					} ?>
				</div>
			</main>
<?php } endwhile; endif; get_footer(); ?>