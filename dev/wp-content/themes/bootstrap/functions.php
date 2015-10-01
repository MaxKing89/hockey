<?php


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );


create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );
create_widget( 'Search Sidebar', 'product-review', 'Displays on the top of pages in the product review section' );



//WooCommerce-------------------------------------------------
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}



function my_theme_wrapper_end() {
  echo '</section>';
}


//remove support declaration
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//WOOO COMMERCE CART CODE
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


//END WOOO COMMERCE CART CODE

//End Woocommerce------------------------------------------------------


//Custom Search-------------------------------------------------------

add_filter('posts_join', 'product_reivew_search_join' );
add_filter('posts_where', 'product_review_search_where' );
add_filter('posts_groupby', 'product_review_search_groupby' );

function product_review_search_join( $join )
{
  global $hockey_review, $wpdb;

  if( is_search() ) {
    $join .= " LEFT JOIN $hockey_review ON " . 
       $wpdb->posts . ".ID = " . $hockey_review . 
       ".review_number ";
  }

  return $join;
}

function product_review_search_where( $where )
{
  if( is_search() ) {
    $where = preg_replace(
       "/\(\s*post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(post_title LIKE $1) OR (product_name LIKE $1) OR (brand LIKE $1) OR (category LIKE $1)", $where );
   }

  return $where;
}

function product_review_search_groupby( $groupby )
{
  global $wpdb;

  if( !is_search() ) {
    return $groupby;
  }

  // we need to group on post ID

  $mygroupby = "{$wpdb->posts}.ID";

  if( preg_match( "/$mygroupby/", $groupby )) {
    // grouping we need is already there
    return $groupby;
  }

  if( !strlen(trim($groupby))) {
    // groupby was empty, use ours
    return $mygroupby;
  }

  // wasn't empty, append ours
  return $groupby . ", " . $mygroupby;
}


//End Custom Search ---------------------------------------------------



//Custom Search Form---------------------------------------------------
function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

//End Custom Search Form-----------------------------------------------

// [print_button]
function print_button_shortcode( $atts ){
return '<a href="javascript:window.print()" class="print-link">Print This Page</a>';
}
add_shortcode( 'print_button', 'print_button_shortcode' );
// End Print Button