Aggiungere Thumbnail:  <?php echo get_the_post_thumbnail($page->ID, 'full', array ('class' => 'img-responsive')); ?>
Aggiungere Permalink: <?php echo post_permalink(); ?>
Loop Cpt con riga per separare:  
<?php $loop = new WP_Query( array('post_type' => 'nome custom post type', 'orderby' => 'post_id', 'order' => 'ASC','posts_per_page' => -1,
  'post__not_in' => array( $post->ID )) ); ?>
 <?php $i = 1; while( $loop->have_posts() ) : $loop->the_post(); ?>

CONTENUTO


<?php if ( $i % 2 === 0 ) { echo '</div><br/><div class="row">'; } ?>
                
<?php $i++; endwhile; wp_reset_query(); ?>   

Riassunto: <?php the_excerpt(); ?>

Permalink specific page: <?php echo get_page_link(82); ?>

Inserire Menu:
      <?php
            wp_nav_menu( array(
                'menu'              => 'Menu_side',
                'depth'             => 1,
                'menu_class'=> 'nav navbar-nav footermenu',
             
          )  );
        ?>   
        
        
Percorso immagini: <?php echo esc_url( get_template_directory_uri() ); ?>

Loop normale: 

<?php $loop = new WP_Query( array('post_type' => 'post', 'orderby' => 'post_id', 'order' => 'ASC') ); ?>
<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
		
	<?php the_content(); ?>	
		
<?php endwhile; wp_reset_query(); ?>



Underscore Componenti

http://components.underscores.me/