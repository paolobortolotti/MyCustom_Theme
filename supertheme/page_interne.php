<?php
	
	/*  Template Name: pbInterne */
   get_header();
   ?>
<?php get_template_part('template-part', 'head'); ?>
<?php get_template_part('template-part', 'topnav'); ?>
<?php get_template_part('template-part', 'navigazione'); ?>

   
   
   
   
<section class="module interno">
   <div class="container">
	   
	 
      <div class="row">
         <div class="col-sm-12 content_interno">
	         
	         
	         
	         <h2 class="mh-line-size-3 font-alt m-b-20"><?php echo get_the_title(); ?></h2>  

         <?php // theloop
                  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <?php the_content(); ?>
               <?php wp_link_pages(); ?>
               <?php endwhile; ?>
               <?php else: ?>
               <?php get_404_template(); ?>
               <?php endif; ?>
   
           
          
         </div>
 </div>


   </div>
</section>




<hr class="divider">

<?php
get_footer();