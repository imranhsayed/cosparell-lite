<?php 
//adding my style sheet of font awesome

function cosparell_StylesAndScripts()
{
	wp_register_style( 'cosparell-font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css'  );
	wp_enqueue_style( 'cosparell-font-awesome' );	

	// Remember to comment out enqueueing of navigation.js in functions.php
	// Note jquery listed as dependancy which prompts WP to load it
	wp_enqueue_script( 'cosparell-navigation', get_template_directory_uri() . '/js/navigation-custom.js', array('jquery') );
	wp_enqueue_script( 'cosparell-modernizr', get_template_directory_uri() . '/js/modernizr.js' );
	wp_enqueue_script( 'cosparell-REM-unit-polyfill', get_template_directory_uri() . '/js/rem.js' ,false,false,true );

	wp_enqueue_style( 'cosparell-style', get_stylesheet_uri() );

	//commented out the default javascript so i can enqueue my own custom javascript
	// wp_enqueue_script( 'cosparell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cosparell-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	//my flexslider stylesheet*
	wp_register_style('cosparell-flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style('cosparell-flexslider' ); //end

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'cosparell-comment-reply' );
	}
	//REGISTERING main.js
	wp_register_script( 'cosparell-main', get_template_directory_uri() . '/js/main.js' ,array( 'jquery'), 1.0, true );

	//flexslider javascript*
	wp_register_script( 'cosparell-jquery-flexslider' , get_template_directory_uri() . '/js/jquery.flexslider.js' ,array( 'jquery'), 1.0 ,true );
	wp_enqueue_script( 'cosparell-jquery-flexslider'); //end
	wp_enqueue_script( 'cosparell-main');

		
}
add_action( 'wp_enqueue_scripts', 'cosparell_StylesAndScripts' ); 

//Cosparell Recognized Social Links

add_filter( 'cosparell_type_social_links_defaults', 'cosparell_recognized_social_links', 10, 1 );

function cosparell_recognized_social_links( $links ) {

   	$memash = array(
   	    array
   	        (
   	            'name' => 'Facebook',
   	            'title' => '',
   	            'href' => ''
   	        ),

   	    array
   	        (
   	            'name' => 'Twitter',
   	            'title' => '',
   	            'href' => '',
   	        ),

   	    array
   	        (
   	            'name' => 'Google+',
   	            'title' => '',
   	            'href' => '',
   	        ),

   	    array
   	        (
   	            'name' => 'RSS',
   	            'title' => '',
   	            'href' => '',
   	        ),

   	    array
   	        (
   	            'name' => 'Youtube',
   	            'title' => '',
   	            'href' => '',
   	        ),
   	);

      return $memash;

}



/**
 * Retrives social links from options tree
 * @return [string] the social link
 */
function cosparell_social_links( $name )
{
	$cosparell_social_links = cosparell_get_option( 'cosparell_social_links' ); //to get the array from option tree

	$social_link = false;
if($cosparell_social_links){
	foreach ($cosparell_social_links as $social_array ) {
		if( $social_array['name']  == $name ){
			$social_link = esc_url($social_array['href']); //santization using esc_url
			break;
		}
	}
}//if
	return $social_link;
}
