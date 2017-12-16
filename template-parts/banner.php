
<?php 
//Default Pictures for Slider if user put any.
$cosparell_default_slider_settings = array(
				array(
						'image' 			=> get_template_directory_uri() . '/Images/slides/slide1.jpg',
						'title' 			=> __( 'The Supermodel' ,  'cosparell'),
						'link' 			=> '',
						'description' 	=> __( 'Latest Trends' ,  'cosparell' )
					),
				array(
						'image' 			=> get_template_directory_uri() . '/Images/slides/slide2.jpg',
						'title' 			=> __( 'Winter Season' ,  'cosparell'),
						'link' 			=> '',
						'description' 	=> __( 'Snow of winter' ,  'cosparell')
					),
				array(
						'image' 			=> get_template_directory_uri() . '/Images/slides/slide3.jpg',
						'title' 			=> __( 'The Perfect Couple' ,  'cosparell'),
						'link' 			=> '',
						'description' 	=> __( 'Newly Married Couple' ,  'cosparell')
					),
				);



$cosparell_slider_settings = cosparell_get_option(  'cosparell_slider_settings' , $cosparell_default_slider_settings  );
 ?>

<section id="slider" class="flexslider">
<?php 
echo " <ul  class='slides'>";

if( $cosparell_slider_settings ){
foreach( $cosparell_slider_settings as $slide_array ) {
	//sanitizing the values before display
	$slide_array['title'] 			= esc_attr( $slide_array['title'] );
	$slide_array[ 'image' ] 		= esc_url($slide_array[ 'image' ]); //src has already been sanitized above so it does not need to be santized again
	$slide_array['description']	= esc_attr( $slide_array['description'] );

echo " <li><img src=' " .$slide_array[ 'image' ]. " ' alt='image'>"; //src has already been sanitized above so it does not need to be santized again
echo " <div class='slider-content' >
           <h1>{$slide_array['title']}</h1>
           <p>{$slide_array['description']}</p>
         </div></li>";
}
echo "</ul>";
}
 ?>
</section>