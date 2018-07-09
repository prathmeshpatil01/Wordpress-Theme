<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 
 */

?>
 <!--//================Footer start==============//-->
        <footer class="main_footer">
            <div class="container">
                <div class="footer-box padT80 ">
                    <div class="row">
                       <?php if ( is_active_sidebar( 'footer_1' ) ) : ?>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                         <?php dynamic_sidebar('footer_1'); ?>
                           
                        </div> <!-- col-md-3 -->
                        <?php endif; ?>
                         <?php if ( is_active_sidebar( 'footer_2' ) ) : ?>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                         <?php dynamic_sidebar('footer_2'); ?>
                           
                        </div> <!-- col-md-3 -->
                        <?php endif; ?>
                       

                       <?php if ( is_active_sidebar( 'footer_3' ) ) : ?>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                         <?php dynamic_sidebar('footer_3'); ?>
                           
                        </div> <!-- col-md-3 -->
                        <?php endif; ?>

                       <?php if ( is_active_sidebar( 'footer_4' ) ) : ?>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                         <?php dynamic_sidebar('footer_4'); ?>
                           
                        </div> <!-- col-md-3 -->
                        <?php endif; ?>


                    </div> <!-- row -->
                  
                </div>
            </div> <!-- container -->
            
<?php include_once('widget.php') ?>


       
        <!--//================Footer Menu start==============//-->
           
            <div class="container">
                <div class="row">
                    <div class="col-md-12 footer-menu">
                        
                        <?php wp_nav_menu(array('theme_location'=>'footer-menu')); ?>
                       
                    </div>  <!-- col-md-12 -->
                    
                </div> <!-- row -->
                
            </div>  <!-- container -->
        <!--//================Footer Menu End==============//-->
           
        <!--//================Footer Logo start==============//-->
        
            <div class="bottom-footer padTB20 bagB">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 footer-text-center colorW">
                            <figure class="marB10">
                             <?php 
                               if ( function_exists( 'get_option' ) )
                                  {
                        
                                    $logo = get_option('footer_logo');
                      
                                  } ?>
                                  <?php if( $logo != "" ) {?>
                                  <a href="#"><img src="<?php echo $logo;?>"/></a>   
                                  <?php } else {?>
                                  <a href="#"><img src="<?php bloginfo( 'template_directory' );?>/assets/img/default-logo.png"/></a>
                                  <?php }?>
                             </figure>
                             <p><?php
                                   echo get_option('copyright_name');
                               ?> 
                            </p>

                        </div>  <!-- col-md-12 -->
                    </div> <!-- row -->
                </div>  <!-- container -->
            </div>

        <!--//================Footer Logo End==============//-->

          
        </footer>
        <!--//================Footer end==============//--> 	
        <?php wp_footer(); ?>  
    </body>


</html>