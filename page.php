<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 
 */

get_header(); ?>

        <!--//================Slider start==============//--> 

 <div class="container" style="width: 100%;">
    <div class="row">
            
       <div id="myCarousel" class="carousel slide" data-ride="carousel" >
     
         <div class="carousel-inner" >
                 <?php 

                  $carousel = new WP_Query(array(
                  'post_type' => 'bcarousel', 

                 ));

                $korim = 0;

                while($carousel->have_posts()) : $carousel->the_post(); $korim ++ ?>


                <?php if($korim == 1) : ?>
           <div class="item active image">

                <?php else : ?>

           <div class="item ">

                  <?php endif; ?> 

      
              <?php 
                   if (has_post_thumbnail() ) {
                    the_post_thumbnail();
                   }
                   else 
                   {
                    
                        echo '<img src="';
                        echo catch_that_image();
                        echo '" alt="" />';
 
                   
                   }
               ?>


                   <div class="slider-text positionA text-center">
                        <div class="">
                            <div class="">
                                <div class=" text-center" >
                                   
                                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <p> <?php echo substr(get_the_excerpt(),0, 300)  ?> </p>
                                    <a href="<?php the_permalink(); ?>" class="itg-button light">Read</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php endwhile; ?>

               <!-- Indicators -->
               <ol class="carousel-indicators" >
  
                 <?php
 
                 $notun = new WP_Query(array(
                 'post_type' => 'bcarousel', 
 
                 ));
 
                 $indicator = -1;

                 while($notun->have_posts()) : $notun->the_post(); $indicator ++ ?>
 
                 <li data-target="#myCarousel" data-slide-to="<?php echo $indicator; ?>" <?php if($indicator == 0) :?> class="active" 
                 <?php endif; ?>> </li>
      
                 <?php endwhile; ?>


               </ol>

    
    
    
           </div>

    
         </div>
           
      </div>
 
 
    </div> <!-- row -->
</div>    <!-- container -->
        <!--//================Slider end==============//-->
        
        <!-- ======================= Child Pages Start =============================   -->

        <div class="theme-heading marB50 positionR">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-8 col-xs-12  col-md-offset-3 col-sm-offset-2 col-xs-offset-0 heading-box text-center"> <br>
                            <h1>All Child Pages</h1>
                            
                        </div>
                    </div> <!-- row -->
                </div>  <!-- container -->
        </div>

         <div class="container">
                <div class="row">
                   <?php
                          $pages = get_pages( array( 'child_of' => $post=6, 'sort_column' => 'post_date', 'sort_order' => 'asec' ) );

                           foreach ($pages as $page) {
                    ?>
                    <div class="col-md-3 ">
                        <div class="collection-box child-img  marB50">
                            <figure class="marB20">
                                <?php echo get_the_post_thumbnail($page->ID, 'small-thumb'); ?>
                            </figure>
                            <h3 class="marB10"><?php echo $page->post_title; ?></h3>
                            <p><?php echo substr(strip_tags($page->post_content),0,50); ?></p>
                            <a href="<?php echo get_post_permalink($page->ID); ?>" class="colorB">Read More...</a>
                           
                        </div>
                    </div>
                    <?php

                }
            ?>
       
                </div> <!-- row -->
                
         </div>   <!-- container -->
            
       <!-- ======================= Child Pages End =============================   -->
       
      
        <div class="clear"></div>
      
       
        <!--//================Google Map start==============//-->
        
        <div class="location-map">
          <iframe src=" <?php echo get_option('map');?>" frameborder="0" style="border:0" allowfullscreen>
          </iframe>
        </div>
        <!--//================Google Map end==============//-->
        <div class="clear"></div>


<?php get_footer(); ?>