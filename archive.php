<?php get_header(); ?>
	<main class="row">
		<?php if(have_posts()):
			echo '<h1 class="marginUD20">'.ucfirst( $wp_query->query_vars['post_type'] ).'</h1>';
			get_breadcrumbs();
			echo '<hr>';
			echo '<ul class="large-12 news">';
			while(have_posts()): the_post(); ?>
				<?php 
					echo '<li class="large-4 column color5f5f5f">';
					echo '<a href="'.get_permalink().'" class="color5f5f5f">';
					echo get_the_post_thumbnail( get_the_id(), $themePrefix.'archiveListing', array('title' => get_the_title(), 'alt' => get_the_excerpt() ) );
					echo '<time class="large-3 column">'.get_the_date('d', $new->ID).'<span>'.get_the_date('M', $new->ID).'</span></time>';
					echo '<h5><b>'.get_the_title().'</b></h5>';
					echo '<article>'.get_the_excerpt().'</article>';
					echo '</a></li>';
				?>
			<?php endwhile;
			echo '</ul>';
			if(function_exists("get_numeric_pagination")) get_numeric_pagination();
		endif; ?>
	</main>
<?php get_footer(); ?>