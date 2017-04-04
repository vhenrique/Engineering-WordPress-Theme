    <footer class="large-12 paddingUD50 main">
    	<?php global $redux_options, $themePrefix; ?>
    	<div class="row">
    		<div class="large-4 column">
    			<h3 class="colorFFF">Newsletter</h3>
                <div class="large-12 statusMessage">
                    <?php if(!empty($redux_options[$themePrefix.'nls_message'])){
                        echo '<p>'.$redux_options[$themePrefix.'nls_message'].'</p>';
                    } ?>
                    <form>
                        <fieldset class="large-10 column noPadding newsletter">
                            <input type="email" required maxlength="30" placeholder="Email" class="newsEmail" />
                            <input type="submit" value="Enviar" class="ActNewsletter" />
                        </fieldset>
                        <input type="hidden" class="newsletterPermalink" value="<?php echo get_home_url().'/newsletter/' ?>" />
                    </form>
                </div>
    		</div>
    		<div class="large-4 column">
    			<h3 class="colorFFF">Contato</h3>
        			<ul class="horizontal">
    				<?php if(!empty($redux_options[$themePrefix.'cs_address']) && !empty($redux_options[$themePrefix.'cs_neightborhood_city_state'])){
    					echo '<li class="address"><b>Endereço: </b>'.$redux_options[$themePrefix.'cs_address'].' - '.$redux_options[$themePrefix.'cs_neightborhood_city_state'].'</li>'; 
    				} ?>
  					<?php if(!empty($redux_options[$themePrefix.'cs_telephone'])){echo '<li class="phone"><b>Telefone: </b>'.$redux_options[$themePrefix.'cs_telephone'].'</li>'; } ?>
					<?php if(!empty($redux_options[$themePrefix.'cs_email'])){echo '<li class="mail"><a href="mailto:'.$redux_options[$themePrefix.'cs_email'].'"><b>Email: </b>'.$redux_options[$themePrefix.'cs_email'].'</a></li>'; } ?>
    			</ul>
    		</div>
    		<div class="large-4 column">
    			<h3 class="colorFFF">Siga-nos</h3>
    			<nav class="large-12 social">
					<ul class="menu">
						<?php if(!empty($redux_options[$themePrefix.'facebook_url'])){echo '<li><a href="'.$redux_options[$themePrefix.'facebook_url'].'" class="fb" target="_BLANK" title="Facebook"></a></li>'; } ?>
						<?php if(!empty($redux_options[$themePrefix.'twitter_url'])){echo '<li><a href="'.$redux_options[$themePrefix.'twitter_url'].'" class="tw" target="_BLANK" title="Twitter"></a></li>'; } ?>
						<?php if(!empty($redux_options[$themePrefix.'linkedin_url'])){echo '<li><a href="'.$redux_options[$themePrefix.'linkedin_url'].'" class="in" target="_BLANK" title="Linkedin"></a></li>'; } ?>
					</ul>
				</nav>
    		</div>
    	</div>
    </footer>
    </main>
    <?php wp_footer(); ?>
    <script type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function(){
			// Submenu show
			jQuery(".sub-menu").parent().hover(function(){
				jQuery(this).find("ul.sub-menu").first().show();
				jQuery(this).find("a").first().addClass("active");
				jQuery(this).hover(function(){}, function(){
					jQuery(this).find("ul.sub-menu").first().hide();
					jQuery(this).find("a").first().removeClass("active");
				});
			});
		});
    </script>
</body>
</html>