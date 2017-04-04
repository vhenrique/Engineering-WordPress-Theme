<?php get_header(); ?>
	<section class="large-12" id="slider">
  		<ul class="mainSlider">
  			<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
    		<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
			<?php $args = array('post_type'=>'slides', 'posts_per_page'=>-1);
			$slides = get_posts($args);
			if(!empty($slides)){
				$i = 0;
				foreach($slides as $slide){
					if($i == 0){
						$i++;
						echo '<li class="on">';
					} else{
						echo '<li>';
					}
					    echo get_the_post_thumbnail($slide->ID, $themePrefix.'slider', array('class'=>'orbit-image', 'title'=>$slide->post_title , 'alt'=>$slide->post_excerpt));
					    echo '<figcaption class="orbit-caption"><h1>'.$slide->post_title.'</h1>';
					    echo '<p>'.$slide->post_excerpt.'</p>';
					    if(strlen(get_post_meta( $slide->ID, $themePrefix.'urlLink', true )) > 0){
					    	echo '<a href="'.get_post_meta( $slide->ID, $themePrefix.'urlLink', true ).'" class="button">';
					    	if(strlen(get_post_meta( $slide->ID, $themePrefix.'urlText', true )) > 0){
					    		echo get_post_meta( $slide->ID, $themePrefix.'urlText', true );
					    	} else{
					    		echo 'Veja mais';
					    	}
					    	echo '</a>';
					    }
					    echo '</figcaption>';
				  	echo '</li>';
				}
			} ?>
		</ul>
	</section>
	<section class="large-12 bg013040 paddingUD15" id="getInTouch">
		<div class="row">
			<div class="large-8 column">
				<h3 class="colorFFF"><?php echo $redux_options[$themePrefix.'bs_title']; ?></h3>
				<p class="color7e8486"><?php echo $redux_options[$themePrefix.'bs_subtitle']; ?></p>
			</div>
			<div class="large-4 column">
				<?php if(!empty($redux_options[$themePrefix.'bs_button']) && !empty($redux_options[$themePrefix.'bs_buttonLink'])){
					echo '<a href="'.$redux_options[$themePrefix.'bs_buttonLink'].'" class="getInTouch button float-right">'.$redux_options[$themePrefix.'bs_button'].'</a>';
				} ?>				
			</div>
		</div>
	</section>
	<section class="row paddingUD50" id="solutions">
		<div class="large-12 text-center">
			<h1><?php echo $redux_options[$themePrefix.'ss_phrase']; ?></h1>
			<h5 class="large-8 float-center color999 marginBottom15"><?php echo $redux_options[$themePrefix.'ss_solutionsExcerpt']; ?></h5>

			<?php $solutions = get_posts(array('post_type'=>'solucoes', 'posts_per_page'=>-1));
			if(!empty($solutions)){
				echo '<h1 class="marginUD20 column">Nossas <b>Soluções</b></h1>';
				echo '<ul class="float-center large-12 solutions">';
				$i = 0;
				foreach($solutions as $solution){
					if($i % 2 == 0){
						echo '<li class="large-6 column text-right float-left">';
						echo '<div class="large-10 column"><h4 class="noMargin"><b>';
						echo '<a href="'.get_permalink($solution->ID).'" class="color0088cc">'.$solution->post_title.'</a></b></h4>';
						echo '<p class="color666">'.$solution->post_excerpt.'</p></div>';
						echo '<i class="float-right">'.get_the_post_thumbnail($solution->ID, array('title'=>$solution->post_title)).'</i></li>';
						$i++;
					} else{
						echo '<li class="large-6 column text-left float-right">';
						echo '<i class="float-left">'.get_the_post_thumbnail($solution->ID, array('title'=>$solution->post_title)).'</i>';
						echo '<div class="large-10 column"><h4 class="noMargin"><b>';
						echo '<a href="'.get_permalink($solution->ID).'" class="color0088cc">'.$solution->post_title.'</a></b></h4>';
						echo '<p class="color666">'.$solution->post_excerpt.'</p></div></li>';
						$i++;
					}
				}
				echo '</ul>';
			} ?>
		</div>
	</section>

	<section class="large-12 bg013040 paddingUD50 marginUD20" id="nr-20">
		<div class="row">
			<div class="large-12">
			<?php // 44 is the ID of NR-20 page
			$nr20 = get_page( 44);
			echo '<figure class="large-5 column">'.get_the_post_thumbnail($nr20->ID, $themePrefix.'halfPage', array('title'=>$nr20->post_title, 'alt'=>get_the_excerpt($nr20))).'</figure>';
			echo '<article class="large-6 column colorFFF">';
			echo '<h1><b><a href="'.get_permalink($nr20->ID).'" class="colorFFF" title="'.$nr20->post_title.'">'.$nr20->post_title.'</a></b></h1>';
			echo $nr20->post_excerpt.'</article>';
			?>
			</div>
		</div>
	</section>

	<section class="row marginBottom15" id="constructioAndProjects">
		<div class="large-6 column">
			<h1>Nossas obras</h1>
			<?php $constructions = get_posts(array('post_type'=>'obras', 'posts_per_page'=> 6));
			if(!empty($constructions)){
				foreach($constructions as $construction){
					if( strlen( get_the_post_thumbnail( $construction->ID ) ) > 0 ){
						echo '<a href="'.get_permalink( $construction->ID ).'" class="large-4 column marginBottom15" title="'.$construction->post_title.'" alt="'.$construction->post_excerpt.'">';
						echo get_the_post_thumbnail( $construction->ID, $themePrefix.'construction', array(
								'title'		=> $construction->post_title,
							)
						);
						echo '</a>';
					}
				}
			} ?>
		</div>

		<div class="large-6 column">
			<?php if(!empty($redux_options[$themePrefix.'ps_excerpt'])){
				echo '<h1>Projetos e Consultorias</h1>';
				echo apply_filters( 'the_content', $redux_options[$themePrefix.'ps_excerpt'] );
			} ?>
		</div>
	</section>
	<hr>
	<section class="row paddingUD50" id="clients">
		<div class="large-12">
			<h1 class="text-center">Alguns clientes</h1>
			<ul class="clientsSlider large-12">
	  			<button class="orbit-previous prevClient"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
	    		<button class="orbit-next nextClient"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
				<?php $clients = get_terms( array(
					'taxonomy' 		=> 'clientes', 
					'hide_empty'	=> 0, 
					'orderby'		=>'term_id'
					)
				);
				if(!empty($clients)){					
					foreach($clients as $client){
						$icon = get_tax_meta($client->term_id, $themePrefix.'icon');
						if( !empty( $icon ) ){
							echo '<li class="large-2 column text-center" title="'.$client->name.'">';
							echo wp_get_attachment_image($icon['id'], $themePrefix.'clients');						
						  	echo '</li>';
						}
					}
				} ?>
			</ul>
		</div>
	</section>

	<section class="large-12 paddingUD50 bgefefef" id="lastNewsComments">
		<div class="row">
			<div class="large-6 column">
			<?php $news = get_posts(array('post_type'=>'blog', 'posts_per_page'=>6));
			if(!empty($news)){
				echo '<h1>Últimas postagens</h1>';
				echo '<ul class="large-12 news">';
				foreach($news as $new){
					echo '<li class="large-6 column color5f5f5f">';
					echo '<time class="large-2 column">'.get_the_date('d', $new->ID).'<span>'.get_the_date('M', $new->ID).'</span></time>';
					echo '<h5><a href="'.get_permalink($new->ID).'" class="color5f5f5f" title="'.$new->post_title.'"><b>'.$new->post_title.'</b></a></h5>';
					echo '<article>'.$new->post_excerpt.'</article>';
					echo '<a href="'.get_permalink( $new->ID ).'" class="color5f5f5f" title="Leia mais">Leia mais ></a>';
					echo '</li>';
				}
				echo '</ul>';
			}
			?>
			</div>
			<div class="large-6 column">
				<?php $comments = get_comments(array('status'=>'approve'));
				if( !empty($comments) ){
					echo '<h1 class="large-9 column"><b>Depoimentos</b></h1>';
					echo '<div class="large-3 column float-right text-right"><button class="prevComment"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>';
	    			echo '<button class="nextComment"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button></div>';
					echo '<ul class="column comments">';					
					foreach($comments as $comment){
						echo '<li>';
						echo '<article class="bg6a6a6a colorFFF">'.$comment->comment_content.'<br><h5>'.$comment->comment_author.'</h5></article>';
						echo '</li>';
					}
					echo '</ul>';
				} ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>