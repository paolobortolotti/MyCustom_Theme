<?php

/*  Template Name: pbProjects */



get_header(); ?>


<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>





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





<section class="project" >


 <div id="page" class="container">

 
    <ul id="filters" class="list-inline text-center top-filter filters font-alt">
        <?php
            $terms = get_terms(array ("brand"));
            $count = count($terms);
                echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">Tutte le Categorie</a></li>';
            if ( $count > 0 ){
 
                foreach ( $terms as $term ) {
 
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                }
            }
        ?>
    </ul>
    
    
      <ul id="filters" class="list-inline text-center bottom-filter" >
        <?php
            $terms = get_terms(array ("other"));
            $count = count($terms);
                echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active"></a></li>';
            if ( $count > 0 ){
 
                foreach ( $terms as $term ) {
 
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                }
            }
        ?>
    </ul>
    
 
 

    <div id="portfolio" >
 
       <?php 
       $args = array(
	/*       
       'tax_query' =>  array (
        array(
            'taxonomy' => 'brand', 
            'terms' => 'concorso', 
            'field' => 'slug', 
            'operator' => 'NOT IN', 
        ),
    ),
       
       
       */
       
       
        'post_type' => 'progetti',
        'posts_per_page' => 10 );
       $loop = new WP_Query( $args );
       while ( $loop->have_posts() ) : $loop->the_post(); 
 
          $terms = get_the_terms( $post->ID, array ("brand" , "other") );						
          if ( $terms && ! is_wp_error( $terms ) ) : 
 
              $links = array();
 
              foreach ( $terms as $term ) {
                  $links[] = $term->name;
              }
 
              $tax_links = join( " ", str_replace(' ', '-', $links));          
              $tax = strtolower($tax_links);
          else :	
	      $tax = '';					
          endif; 
 
          echo '<div class="work-item all portfolio-item '. $tax .'">';
          echo '<a href="'. get_permalink() .'" >';
          echo '<div class="thumbnail">';
          echo ''. the_post_thumbnail('progetti') .'';
          echo '</div>';
          echo '<div class="work-caption font-alt">';
		 echo '<h3 class="work-title">';
		echo   ''. the_title() .'';						
		 echo '</h3></div>';
         echo '</a>'; 
          echo '</div>'; 
      endwhile; ?>
 

</div>
 
   </div><!-- #portfolio -->
 
  </div><!-- #page -->
  <div class="h40"></div>

</section>









<?php
get_footer();