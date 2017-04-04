<?php
// Remove default post type
	add_action('admin_menu','remove_default_post_type');
	function remove_default_post_type() {
		remove_menu_page('edit.php');
	}

// Custom numeric pagination function
	function get_numeric_pagination(){
		global $wp_query, $numpages;
		$total_pages	= $wp_query->max_num_pages;
		$big			= 999999999; // need an unlikely integer
		if($total_pages > 1){
			echo '<div class="large-12 column text-center marginUD20 paginatioLinks">';
			echo paginate_links(
				array(
					'base'		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format'	=> '/page/%#%',
					'current'	=> max(1, get_query_var('paged')),
					'total'		=> $wp_query->max_num_pages,
					'type'		=> 'plain',
					'prev_text'	=> '<',
					'next_text'	=> '>'
				)
			);
			echo '</div>';
		}
	}

// Breadcrumbs
	function get_breadcrumbs(){
		$delimiter = '<span class="delimiter"> </span>';
		$currentBefore = '<b>';
		$currentAfter = '</b>';
		echo '<div class="large-8 column noPadding breadcrumbs">';
		if(!is_home() && !is_front_page() || is_paged()){
			global $post, $wp_query;
			$home = get_bloginfo('url');
			echo '<a href="' . $home . '" title="Home">Home</a> ' . $delimiter . ' ';
			if(is_single() && !is_attachment()){
				$cat = get_the_category(); $cat = $cat[0];
				if(!empty($cat)){
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				}
				echo '<a href="'.get_home_url().'/'.$wp_query->query_vars['post_type'].'">'.ucfirst($wp_query->query_vars['post_type']).'</a>';
				echo $delimiter;
				echo $currentBefore;
				the_title();
				echo $currentAfter;
			} elseif(is_page() && !$post->post_parent){
				echo $currentBefore;
				the_title();
				echo $currentAfter;
			} elseif(is_page() && $post->post_parent){
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
				echo $currentBefore;
				the_title();
				echo $currentAfter;
			} elseif(is_search()){
				echo $currentBefore . 'Resultados da busca por &#39;' . get_search_query() . '&#39;' . $currentAfter;
			} elseif(is_tag()){
				echo $currentBefore . 'Posts com a tag &#39;';
				single_tag_title();
				echo '&#39;' . $currentAfter;
			} elseif(is_404()){
				echo $currentBefore . 'Erro 404' . $currentAfter;
			} elseif(is_archive()){
				global $wp_query;
				$ptTitle = get_post_type_object($wp_query->query_vars['post_type']);
				echo $currentBefore . $ptTitle->labels->name . $currentBefore;
			}
		}
		echo '</div>';
	}
?>