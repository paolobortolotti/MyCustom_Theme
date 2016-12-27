<?php
   get_header();
   ?>

<?php
   $valore = get_field('valore');

   
   ?>


<section id="progetto-content">
 <div class="container">

	




<!--owlcarousel-->	
<div class="owl-carousel slider-images">
          <?php
             if( have_rows('slide_images') ):  while ( have_rows('slide_images') ) : the_row(); ?>
               <?php $image_project= get_sub_field('image_project');
                  $url = $image_project["url"]; ?>
                  
               <div class="item">
                  <img src="<?php echo $url; ?>">
               </div>
               
               <?php endwhile; endif;?>
            </div>
          <!--owlcarousel-->



<p> <?php echo $valore; ?></p>
<!--Mostrare Categoria Associata-->
			<p class="font-serif"><?php
               $terms = get_the_terms( $post->ID, 'brand' );
               if ( !empty( $terms ) ){
               	// get the first term
               	$term = array_shift( $terms );
               	echo $term->slug;
               } ?>   
               
           </p>
			<!--Fine Mostrare Categoria Associata-->


 <div class="navigate">
	           <?php previous_post_link('<< %link'); ?>       	          
	            <?php next_post_link('%link >>'); ?>       
	          
	                      </div>  

</div><!-- container -->
</section>


<section id="related">
	
	     <div class="row">
         
            <?php 
               // get the custom post type's taxonomy terms
                
               $custom_taxterms = wp_get_object_terms( $post->ID, 'brand', array('fields' => 'ids') );
               // arguments
               $args = array(
               'post_type' => 'progetti',
               'post_status' => 'publish',
               'posts_per_page' => 10, // you may edit this number
               'orderby' => 'ASC',
               'tax_query' => array(
                   array(
                       'taxonomy' => 'brand',
                       'field' => 'id',
                       'terms' => $custom_taxterms
                   )
               ),
               'post__not_in' => array ($post->ID),
               );
               $related_items = new WP_Query( $args );
               // loop over query
               if ($related_items->have_posts()) :
               $i = 1; while ( $related_items->have_posts() ) : $related_items->the_post();
               ?>   
            <div class="col-md-6">
               <div class="hovereffect">
                  <a href="<?php the_permalink() ?>">
                     <?php echo get_the_post_thumbnail($page->ID, 'progetti', array ('class' => 'img-responsive')); ?>								
                     <div class="overlay work-caption font-alt">
                        <h2 class="work-title"><?php the_title(); ?></h2>
                        <div class="info">
                           <?php echo wp_trim_words( get_the_content(), $num_words = 20, $more = null ); ?>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
            <?php if ( $i % 2 === 0 ) { echo '</div><br><div class="row">'; } ?>
            <?php
               $i++; endwhile;
               
               endif;
               // Reset Post Data
               wp_reset_postdata();
               ?>              
         </div> 
	
	
</section>
<!--Fine progetti della stessa categoria-->	
<h3 class="font-alt"><?php echo get_the_title(); ?></h3>

<?php
get_footer();
