<?php

//A SUPPORT FUNCTION for the future

// function lc_get_post_types_of_taxonomy( $tax = 'category' ){
//     global $wp_taxonomies;
//     return ( isset( $wp_taxonomies[$tax] ) ) ? $wp_taxonomies[$tax]->object_type : array();
// } 

//[TO ALLOW USING IN ANY THEME...]
//FOR SINGLE PAGES & POSTS THAT USE LC, when force-embedded-template-for-lc-pages option is set,
// and for TEMPLATE PARTIALS: ENFORCE a plugin-based, THEME - INDEPENDENT, clean SINGLE TEMPLATE 
//that resides into the plugin

add_filter( 'template_include', 'lc_load_custom_template_for_posts_using_livecanvas', 99); //more powerful, intercepts also CPTs - added in 2.1.1

function lc_load_custom_template_for_posts_using_livecanvas ($the_template){
	global $post; 
	if ( lc_plugin_option_is_set("force-embedded-template-for-lc-pages")  &&  is_singular() &&  lc_post_is_using_livecanvas($post->ID) ) {
		$the_template = dirname( __FILE__ ) . '/templates/single-lc-template.php';
	}
	return $the_template;
}


//DYNAMIC TEMPLATING //////////////////////////////
add_filter( 'template_include', function($the_template){
	
	global $post;
	
	//die($the_template); //for debug 

	//check if global option for templating is enabled
	if (!lc_plugin_option_is_set("enable-dynamic-templating")) return $the_template; //pass-through the original parameter
	
	//by default, no specific template is found
	$template_id = FALSE; 

	//CASE SINGULAR POSTS
	if ( is_singular() && !lc_post_is_using_livecanvas($post->ID) ) {

		//first attempt for singular posts: check that a valid assigned template exists, first taxonomy-specific
		$taxonomies = get_object_taxonomies( $post->post_type, 'object' );

		if ($taxonomies) foreach($taxonomies as $taxonomy):  
			$terms = wp_get_post_terms( $post->ID,  $taxonomy->name );
			 
			if ($terms) foreach ($terms as $term) {
				if (!$template_id) $template_id = lc_get_template_id('is_single_'.$post->post_type.'__in_'. $taxonomy->name . '_' . $term->slug ); 
				//echo 'is_single_'.$post->post_type.'__in_'. $taxonomy->name . '_' . $term->slug ."<br>";
			}   
			 
		endforeach;

		//die; to debug
		
		//second attempt for singular posts: in general for that post type
		if (!$template_id) $template_id = lc_get_template_id('is_single_'.$post->post_type);
	}

	//CASE ARCHIVES
	if ( is_archive() ) {
		
		//Author archives
		if (is_author()) $template_id = lc_get_template_id('is_archive_author');
	 	
		//Date archives
		if (is_date()) $template_id = lc_get_template_id('is_archive_date');

		//Category Archives
		if (is_category() && isset(get_queried_object()->slug)) { 
			//check for specific, or use generic
			$template_id = lc_get_template_id('is_archive_for_tax_category__'.get_queried_object()->slug);
			if (!$template_id) $template_id = lc_get_template_id('is_archive_for_tax_category');
		}
		//Tag archives
		if (is_tag() && isset(get_queried_object()->slug)) {
			//check for specific, or use generic
			$template_id = lc_get_template_id('is_archive_for_tax_post_tag__'.get_queried_object()->slug);
			if (!$template_id) $template_id = lc_get_template_id('is_archive_for_tax_post_tag');
		}
	 	//Taxonomy archive	
		if (is_tax() && isset(get_queried_object()->slug)) {
			//check for specific, or use generic
			$template_id = lc_get_template_id('is_archive_for_tax_'. get_query_var('taxonomy').'__'.get_queried_object()->slug);
			if (!$template_id) $template_id = lc_get_template_id('is_archive_for_tax_'. get_query_var( 'taxonomy' ));
		}

		//TODO: for woocommerce, check is_shop()  // is_woocommerce() 

		//Post Type Archive  
		if (!$template_id) { 
			foreach (get_post_types( [], 'objects' ) as $post_type):
					if (get_post_type() == $post_type->name) {
						$template_id = lc_get_template_id('is_archive_for_post_type_'.$post_type->name);
					}
			endforeach;
		}

	}

	//CASE SPECIALTIES

	if ( !is_front_page() && is_home() ) $template_id = lc_get_template_id('is_blog_posts_index');

	if (is_front_page()) $template_id = lc_get_template_id('is_front_page');

	if (is_search()) $template_id = lc_get_template_id('is_search');

	if (is_404()) $template_id = lc_get_template_id('is_404');


	//IF FOUND, RENDER
	if ($template_id){
		global $lc_main_html;
		$lc_main_html = lc_render_dynamic_template($template_id);
		$the_template = dirname( __FILE__ ) . '/templates/dynamic-template.php';
	}

	//RETURN TEMPLATE: anyway, and if none found, just pass-through
	return $the_template;

}, 9999999 );


//RETRIEVE THE RIGHT TEMPLATE
function lc_get_template_id($template_name) { 

	$my_posts = get_posts(array('post_type'=> 'lc_dynamic_template', 'meta_key' => $template_name, 'orderby' => 'menu_order', 'numberposts' => 1, 'post_status'    => 'publish'));
	if( $my_posts ){
		return ($my_posts[0]->ID);
	} else {
		return FALSE;
	} 
}


//TEMPLATE RENDERING  ////////////////////////////// 
function lc_render_dynamic_template($template_post_id){

	$template_content = get_post_field( 'post_content', $template_post_id, 'raw' );
	return "\n\n\n
			<div id='lc-dynamic-template-ID-".$template_post_id."'>"
			.lct_do_shortcode(lc_neutralize_section_tags(lc_strip_lc_attributes($template_content)))
			."</div>
			\n\n\n";
}



/////// this is a modified copy of wp's do_shortcode function,
// disabling do_shortcodes_in_html_tags, as it breaks shortcodes in attributes ($post does not work)

function lct_do_shortcode( $content, $ignore_html = false ) {
	global $shortcode_tags;

	if ( false === strpos( $content, '[' ) ) {
		return $content;
	}

	if ( empty( $shortcode_tags ) || ! is_array( $shortcode_tags ) ) {
		return $content;
	}

	// Find all registered tag names in $content.
	preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
	$tagnames = array_intersect( array_keys( $shortcode_tags ), $matches[1] );

	if ( empty( $tagnames ) ) {
		return $content;
	}

	// LC NOTE: this is the only change: we skip do_shortcodes_in_html_tags
	//$content = do_shortcodes_in_html_tags( $content, $ignore_html, $tagnames );

	$pattern = get_shortcode_regex( $tagnames );
	$content = preg_replace_callback( "/$pattern/", 'do_shortcode_tag', $content );

	// Always restore square braces so we don't break things like <!--[if IE ]>.
	$content = unescape_invalid_shortcodes( $content );

	return $content;
}


//////////// AJAX FETCH SHORTCODE FOR DYNAMIC TEMPLATING /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_action('wp_ajax_lc_process_dynamic_templating_shortcode', 'lc_process_dynamic_templating_shortcode_func');
function lc_process_dynamic_templating_shortcode_func() {
	
	if (!current_user_can("edit_pages")) return; //Only for editors				
	
	$input = stripslashes($_POST['shortcode']);

	global $post;
	
	$post = get_post( $_POST['post_id']); 

	//determine which kind of template we're in
	foreach(get_post_meta($_POST['post_id']) as $meta_key=>$meta_value) {
		if (substr($meta_key,0,3)=='is_' && $meta_value[0]==1)  break;
	}
	//eg: $meta_key is 'is_single_post' now

	//case single post
	if (substr($meta_key,0,10)=='is_single_') {
		//get the post type
		$arr=explode("__",$meta_key);
		$meta_key=$arr[0];
		$post_type=substr($meta_key, 10);
		//echo "case single ".$post_type; //for debug
		
		//find some representative post
		$posts = get_posts(array( 'posts_per_page' => 1, 'post_type' => $post_type, 'post_status' => 'publish' ));
		if($posts) $post = $posts[0];

		//exception for lc_the_next_post_link
		if ( strpos($input, 'lc_the_next_post_link') !== false) { 
			$posts = get_posts(array( 'posts_per_page' => 2, 'post_type' => $post_type, 'post_status' => 'publish' ));
			if ($posts && count($posts) == 2) $post = $posts[1];
		}  

		//execute the shortcode and exit
		echo do_shortcode($input);
		wp_die();
	} 

	//case archive 
	if (substr($meta_key,0,11)=='is_archive_' or $meta_key=='is_blog_posts_index' or $meta_key=='is_search') {

		//fix for loop open / close shortcode
		if ( strpos($input, 'loop') !== false) { if (0) echo $input; wp_die(); } //early exit

		//get the post type if possible
		$post_type = 'post'; //default
		if ( strpos($meta_key, 'is_archive_for_post_type_') !== false) {
			$arr=explode("is_archive_for_post_type_", $meta_key);
			$post_type=$arr[1]; 
		}

		//find some representative post
		$posts = get_posts(array( 'posts_per_page' => 1, 'post_type' => $post_type, 'post_status' => 'publish' ));
		if($posts) $post = $posts[0];

		//more fixes
		if ( strpos($input, 'lc_the_archive_title') !== false) { echo "Archive Title"; wp_die(); } //early exit
		if ( strpos($input, 'lc_the_archive_description') !== false) { echo "Archive description text"; wp_die(); } //early exit 		

		//execute the shortcode and exit
		echo do_shortcode($input);
		wp_die();
	}
	
	//all other cases:leave shortcode untouched
	echo $input;
	wp_die();	
}
