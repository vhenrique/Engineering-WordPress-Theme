<?php get_header(); ?>
	<main class="row">
	<?php if(have_posts()): while(have_posts()): the_post();
			echo '<h1 class="marginUD20">'.get_the_title().'</h1>';
			get_breadcrumbs();
			echo '<hr>';
			echo '<article class="marginUD20">'.apply_filters('the_content', get_the_content()).'</article>';
		endwhile; endif; ?>
	</main>
<?php get_footer(); ?>