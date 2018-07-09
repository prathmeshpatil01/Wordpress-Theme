<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.

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
       
      
        <div class="clear"></div>
      
       
        <!--//================Google Map start==============//-->
        
        <div class="location-map">
          <iframe src=" <?php echo get_option('map');?>" frameborder="0" style="border:0" allowfullscreen>
          </iframe>
        </div>
        <!--//================Google Map end==============//-->
        <div class="clear"></div>


<?php get_footer(); ?>