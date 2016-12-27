<?php
	
	/*  Template Name: Contatti */
   get_header();
   ?>
<?php get_template_part('template-part', 'subheader'); ?>

   
   
   
   
<section class="module interno">
   <div class="container">
	   
	 
      <div class="row">
         <div class="col-sm-12 content_interno">
	         
	          <h2 class="mh-line-size-3 font-alt m-b-20"><?php echo get_the_title(); ?></h2>  
	         
	        <div class="col-md-6">
		         
		      
		      
		                  <div id="map-canvas" style="position: relative; width: 100%; overflow: auto; height: 350px"></div><!-- #map-canvas -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3qpn6zBpXl8e-pj5ZANiHr551mid2rek"
  type="text/javascript"></script>

<script type="text/javascript">
google.maps.event.addDomListener( window, 'load', gmaps_results_initialize );
/**
 * Renders a Google Maps centered on Atlanta, Georgia. This is done by using
 * the Latitude and Longitude for the city.
 *
 * Getting the coordinates of a city can easily be done using the tool availabled
 * at: http://www.latlong.net
 *
 * @since    1.0.0
 */
 
 
function gmaps_results_initialize() {
	// Basic options for a simple Google Map
                        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                        var myLatlng = new google.maps.LatLng(44.00000, 8.486446);

                        var mapOptions = {
                            // How zoomed in you want the map to start at (always required)
                            zoom: 15,
                            disableDefaultUI: true,
							scrollwheel: false,
                            zoomControl: true,
                            mapTypeControl: true,
                            scaleControl: true,
                            streetViewControl: true,
                            rotateControl: true,


                            // The latitude and longitude to center the map (always required)

                            center: myLatlng, // New York

                            // How you would like to style the map. 
                            // This is where you would paste any style found on Snazzy Maps.
                            styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                        };

                        // Get the HTML DOM element that will contain your map 
                        // We are using a div with id="map" seen below in the <body>
                        var mapElement = document.getElementById('map-canvas');

                        // Create the Google Map using out element and options defined above
                        var map = new google.maps.Map(mapElement, mapOptions);
						
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
							icon: '<?php bloginfo('stylesheet_directory'); ?>/images/map-icon.png',
                            title: 'Dedalo'
                        });

}


</script>
		      
		         
		         
		         
		         
	         </div>
	         
	         
	         
	         
	         
	         
	         
	         
	      <div class="col-md-6">    
	         
	         
	        

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


   </div>
</section>


<h2 class="mh-line-size-3 font-alt m-b-20"><?php echo get_the_title(); ?></h2>  

<hr class="divider">

<?php
get_footer();