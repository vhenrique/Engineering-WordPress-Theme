<?php get_header(); ?>
	<main class="row">
		<?php if(have_posts()): while(have_posts()): the_post();
			echo '<h1 class="marginUD20">'.get_the_title().'</h1>';
			echo '<div class="large-12">';
			get_breadcrumbs();
			echo '<time class="large-2 column">'.get_the_date('d', $new->ID).'<span>'.ucfirst(get_the_date('F', $new->ID)).'</span></time>';
			echo '</div>';
			echo '<hr>';
			echo '<figure class="thumbnail">'.get_the_post_thumbnail(get_the_id(), $themePrefix.'singleThumbnail', array('title'=>get_the_title(), 'alt'=>get_the_excerpt())).'</figure>';
			echo '<article class="marginUD20">'.get_the_content().'</article>';
			echo '<hr>';
			echo '<div id="comments-wrapper" class="full-width-wrapper">'.comments_template().'</div>';
		endwhile; endif; ?>
	</main>
<?php get_footer(); ?>