<?php
/**
 * demo-theme functions 
 *
 *
 */

//======================================= add script files start =======================================
function add_script()
{
  

	wp_enqueue_script( 'upload_logo_script', get_template_directory_uri() . '/assets/js/upload_logo.js','', '', true );

  wp_enqueue_script( 'upload_logo1_script', get_template_directory_uri() . '/assets/js/upload_logo1.js','', '', true );

  // wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_media(); 

}
add_action('admin_enqueue_scripts','add_script');


//======================================= add script files end =======================================


//======================================= Menu Start =======================================

add_theme_support('post-thumbnails'); 


function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));

}
add_action( 'init', 'register_header_menu' );


// Bootstrap navigation
function bootstrap_nav()
{
	wp_nav_menu( array(
            'theme_location'    => 'header-menu',
            'depth'             => 2,
            'container'         => 'false',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
    );
}

require_once('wp_bootstrap_navwalker.php');

//======================================= Menu Start =======================================



//======================================= post type slider start =======================================

function ptslider() 
{
add_theme_support('post-thumbnails'); 
  
   register_post_type('bcarousel', array(

    'labels' => array(
    	                'name' => 'Carousel Option'
    	           
                     ),
    'public' => true,
    'menu_icon' => 'dashicons-art',
    'supports' => array('title','editor','thumbnail')
    )
   );



}

add_action('after_setup_theme','ptslider');

// =======================================post type slider end =======================================

//======================================= get first post image code start =============================

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

//======================================= get first post image code end ====================================




//======================================= theme option start =======================================

add_action('admin_menu','mythemeoptions');

function mythemeoptions()
{

  add_menu_page('theme-option',      // page title
  	            'Theme Options',     // menu title
  	            'manage_options',    // capability
  	            'theme-options',     // slug
  	            'mycustom_options',  // call back options
  	            'dashicons-sticky'   // icon
  	           );

}

 function mycustom_options()
 {
   

   ?>
      <div>
      	<h1>Theme Options Panel</h1>
      	<span>
      		<?php 
      		  settings_errors(); // for show setting save message 
      		?>
      	</span>
      	<form action="options.php" method="post">  <!-- options.php is for save in database -->
      		<?php 
             settings_fields('section'); 
             do_settings_sections('theme-options'); 
             submit_button();

      		?>
      		
      		
      	</form>
      </div>

   <?php 




 }



 function theme_options_setting()
 {

    add_settings_section(
                          'section', // id of setting sections
                          'All Page', // title
                          '',         // callback function
                          'theme-options' // page or slug

                        );

    add_settings_field(
    	                'copyright_name', // id
    	                'Copyright Name', // title
    	                'display_copyright_name', // callback function
    	                'theme-options', // page (get it from add_settings_section)
    	                'section' // section (it is a id of add_settings_section)
                      );

   add_settings_field(
    	                'header_logo', // id
    	                'Header Logo', // title
    	                'display_header_logo', // callback function
    	                'theme-options', // page (get it from add_settings_section)
    	                'section' // section (it is a id of add_settings_section)
                      );

   add_settings_field(
                      'phone_n', // id
                      'Phone Number', // title
                      'display_phone_n', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );

     add_settings_field(
                      'email', // id
                      'Email ID', // title
                      'display_email', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );


     // ------------------------------

     add_settings_field(
                      'facebook', // id
                      'Facebook Link', // title
                      'display_facebook', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );
     add_settings_field(
                      'twitter', // id
                      'Twitter Link', // title
                      'display_twitter', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );
     add_settings_field(
                      'google', // id
                      'Google Link', // title
                      'display_google', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );
     add_settings_field(
                      'instagram', // id
                      'Instagram Link', // title
                      'display_instagram', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );

     // ------------------------------
     add_settings_field(
                      'map', // id
                      'Google Map', // title
                      'display_map', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );


     add_settings_field(
                      'footer_logo', // id
                      'Footer Logo', // title
                      'display_footer_logo', // callback function
                      'theme-options', // page (get it from add_settings_section)
                      'section' // section (it is a id of add_settings_section)
                      );


    
    register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'copyright_name'  // option name (it is a id of add_settings_field)
                    );

    register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'header_logo'  // option name (it is a id of add_settings_field)
                    );

     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'phone_n'  // option name (it is a id of add_settings_field)
                    );

     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'email'  // option name (it is a id of add_settings_field)
                    );

     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'facebook'  // option name (it is a id of add_settings_field)
                    );
     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'twitter'  // option name (it is a id of add_settings_field)
                    );
     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'google'  // option name (it is a id of add_settings_field)
                    );
     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'instagram'  // option name (it is a id of add_settings_field)
                    );

     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'map'  // option name (it is a id of add_settings_field)
                    );

     register_setting(
                       'section', // option group (it is a id of add_settings_section)
                       'footer_logo'  // option name (it is a id of add_settings_field)
                    );




    function display_header_logo() 
    {
 	  ?>
  
       <input type="button" value="upload Header Logo" name="" id="upload-button" class="button button-secondary"><input type="hidden" name="header_logo" value="<?php echo get_option('header_logo');?>" id="profile-logo"> 
       
    	<?php 


    }


function display_copyright_name() 
    {
 	  ?>
  
       <input type="text" name="copyright_name" value="<?php echo get_option('copyright_name');?>" id="copyright_name">  
       
    	<?php 

    }

    function display_phone_n() 
    {
    ?>
  
       <input type="text" name="phone_n" value="<?php echo get_option('phone_n');?>" id="phone_n">  
       
      <?php 

    }

    function display_email() 
    {
    ?>
  
       <input type="text" name="email" value="<?php echo get_option('email');?>" id="email">  
       
      <?php 

    }


      function display_facebook()
    {
    ?>
  
       <input type="text" name="facebook" value="<?php echo get_option('facebook');?>" id="facebook"> 
       
      <?php 

    }

      function display_twitter() 
    {
    ?>
  
       <input type="text" name="twitter" value="<?php echo get_option('twitter');?>" id="twitter">  
       
      <?php 

    }

      function display_google() 
    {
    ?>
  
       <input type="text" name="google" value="<?php echo get_option('google');?>" id="google">  
       
      <?php 

    }

      function display_instagram() 
    {
    ?>
  
       <input type="text" name="instagram" value="<?php echo get_option('instagram');?>" id="instagram">  
       
      <?php 

    }

     function display_map() 
    {
    ?>
  
       <input type="text" placeholder="Remove iframe tag (paste only http link)" name="map" value="<?php echo get_option('map');?>" id="map">   
       
      <?php 

    }

    function display_footer_logo() 
    {
    ?>
  
       <input type="button" value="upload Footer Logo" name="" id="upload-button1" class="button button-secondary"><input type="hidden" name="footer_logo" value="<?php echo get_option('footer_logo');?>" id="profile-logo1">  
       
      <?php 


    }

    

 }


 add_action('admin_init','theme_options_setting'); 
 
 



//======================================= theme option end =======================================

//======================================= widget start =======================================

function arphabet_widgets_init() {

	
  register_sidebar( array(
    'name'          => 'Footer 1',
    'id'            => 'footer_1',
    'before_widget' => '<div class="foot-sec marB30">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="colorW marB20">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => 'Footer 2',
    'id'            => 'footer_2',
    'before_widget' => '<div class="foot-sec marB30">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="colorW marB20">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 3',
    'id'            => 'footer_3',
    'before_widget' => '<div class="foot-sec marB30">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="colorW marB20">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 4',
    'id'            => 'footer_4',
    'before_widget' => '<div class="foot-sec marB30">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="colorW marB20">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
	        // for widgets show in dashboard


        // --------------------------------------------------------

function register_my_widget()
{
   // call class 
	register_widget('my_widget');
}

add_action('widgets_init','register_my_widget');

class my_widget extends WP_Widget 
{
	function __construct() // admin view
	{ 
		parent::__construct(

			'my_widget',
			__('Social Media Widget'),
			array('description' => __('This Widget Show Social Media Links'))


		);


	}

	public function widget($args, $instance) // front end view
	{

		// args use for in which html tag we set our widget
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];


 
        echo $args['before_widget'];

        if (!empty($title)) {
         echo $args['before_title'] . $title . $args['after_title'];
         }

     
        ?>
            <ul class="social-icon">
                                    <li><a href="<?php echo $facebook; ?>" class="theme-circle marR10"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $twitter; ?>" class="theme-circle marR10"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $google; ?>" class="theme-circle marR10"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $linkedin; ?>" class="theme-circle marR10"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>      
         <?php

         echo $args['after_widget'];



	}

	function form($instance) // form that show in widget admin View
	{
        if (isset($instance['title'])) {
        	$title = $instance['title'];

        } else {
        	$title = __('New Title','my_widget_domain');
        }


         isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;


        ?>
        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php echo esc_attr($title); ?>">
        	 <!-- esc_attr help to remove html tag from input -->
        	 <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" id="<?php echo $this->get_field_id('facebook'); ?>" class="widefat" value="<?php echo esc_attr($facebook); ?>">

        	 <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" id="<?php echo $this->get_field_id('twitter'); ?>" class="widefat" value="<?php echo esc_attr($twitter); ?>">

        	<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google:'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name('google'); ?>" id="<?php echo $this->get_field_id('google'); ?>" class="widefat" value="<?php echo esc_attr($google); ?>">

        	<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
        	<input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" id="<?php echo $this->get_field_id('linkedin'); ?>" class="widefat" value="<?php echo esc_attr($linkedin); ?>">


        </p>
        <?php


        
	}

	public function update($new_instance, $old_instance)  // for database
	{
		$instance = array();

	  $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
	  $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
      $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
      $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
      $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';

		return $instance;
		 // strip_tags help to remove html tag from input


	}
}


  

//======================================= widget end =======================================




 ?>