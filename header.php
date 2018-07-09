<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 
 */

?>
<!DOCTYPE html>
<html >

<head>
        <meta charset="utf-8">
     
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title><?php bloginfo('name');  ?> | <?php wp_title(); ?></title>
       
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

        <script src="<?php echo get_template_directory_uri(); ?>/lib/js/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/lib/js/bootstrap.min.js"></script>

      <?php wp_head(); ?> 
</head>
<body>
        
        <!--//================Header start==============//-->  
        <header class="positionR">
            <div class="top-bar padTB30">
                <div class="container">
                    <div class="row">
                       <!--//================Header Logo Start==============//-->  

                        <div class="col-md-3 col-sm-3 col-xs-12 img-center">
                           <?php 
                            if ( function_exists( 'get_option' ) )
                             {
                        
                                 $logo = get_option('header_logo');
                      
                             } ?>
                           <?php if( $logo != "" ) {?>
                             <a href="#"><img src="<?php echo $logo;?>"/></a>   
                           <?php } else {?>
                           <a href="#"><img src="<?php bloginfo( 'template_directory' );?>/assets/img/default-logo.png"/></a>
                           <?php }?>

                        </div>

                       <!--//================Header Logo End==============//--> 

                       <!--//================Header Contact Start==============//-->  


                        <div class="col-md-9 col-sm-9 col-xs-12 hidden-xs">
                            
                            <div class="contact-info pull-right padTB5">
                                <div class="pull-left">
                                    <a href="#" class="theme-circle marR10"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                </div>
                                <div class="pull-left">
                                    <h5>Email us :</h5>
                                    <p> <?php echo get_option('email');?></p>
                                </div>
                            </div>
                            <div class="contact-info pull-right padTB5">
                                <div class="pull-left">
                                    <a href="#" class="theme-circle marR10"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                </div>
                                <div class="pull-left">
                                    <h5>Call us :</h5>
                                    <p><?php echo get_option('phone_n');?></p>
                                </div>
                            </div>
                        </div>
                       <!--//================Header contact End==============//-->  

                    </div> <!-- row -->
                </div>  <!-- col-md-12 -->
            </div>

            <div id="main-menu" class="wa-main-menu">
                <!-- Menu -->
                <div class="wathemes-menu relative">
                    <!-- navbar -->
                    <div class="navbar navbar-default black-bg mar0" role="navigation">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                      <!--//================Header Social Media Start==============//-->  

                                        <div class="navigation-icon custom-drop">
                                            <ul class="social-icon top-bar-icon">
                                                <li><a href="<?php echo get_option('facebook');?>" class="theme-circle marL10"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a></li>
                                                <li><a href="<?php echo get_option('twitter');?>" class="theme-circle marL10"><i class="fa fa-twitter" aria-hidden="true"></i><span>twitter</span></a></li>
                                                <li><a href="<?php echo get_option('google');?>" class="theme-circle marL10"><i class="fa fa-google-plus" aria-hidden="true"></i><span>google</span></a></li>
                                                <li><a href="<?php echo get_option('instagram');?>" class="theme-circle marL10"><i class="fa fa-instagram" aria-hidden="true"></i><span>instagram</span></a></li>
                                               
                                            </ul>
                                        </div>
                                     <!--//================Header Social Media End==============//-->  
                                     
                                     <!--//================Header Menu Start ==============//-->  

                                        <div class="navbar-header">
                                            <!-- Button For Responsive toggle -->
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span> 
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span>
                                            </button> 
                                            <!-- Logo -->
                                        </div>
                                        <!-- Navbar Collapse -->
                                        <div class="navbar-collapse collapse">
                                            <!-- nav -->
                                            <?php bootstrap_nav(); ?>
                                        </div>
                                        <!-- navbar-collapse -->

                                     <!--//================Header Menu End==============//-->  

                                    </div>
                                </div>
                                <!-- col-md-12 -->
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- navbar -->
                </div>
                <!--  Menu -->
            </div>
        </header>

      

        <!--//================Header end==============//-->

        <div class="clear"></div>


        
