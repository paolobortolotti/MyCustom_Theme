	jQuery(document).ready(function(){
 
    var $container = jQuery('#portfolio');
 
    // create a clone that will be used for measuring container width
    $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   
 
    $container.after( $containerProxy );  
 
    // get the first item to use for measuring columnWidth
    var $item = $container.find('.portfolio-item').eq(0);
    
    $container.imagesLoaded(function(){
        jQuery(window).smartresize( function() {
 
            // calculate columnWidth
            var colWidth = Math.floor( $containerProxy.width() / 3 ); // Change this number to your desired amount of columns
 
            // set width of container based on columnWidth
            $container.css({
                width: colWidth * 3 // Change this number to your desired amount of columns
            })
            .isotope({
 
                // disable automatic resizing when window is resized
                resizable: true,
 
                // set columnWidth option for masonry
                masonry: {
                    columnWidth: colWidth
                }
            });
 
        // trigger smartresize for first time
        }).smartresize();
    });
 
    // filter items when filter link is clicked
    jQuery('#filters a').click(function(){
        
        var selector = jQuery(this).attr('data-filter');
        $container.isotope({ filter: selector, animationEngine : "css" });
        jQuery(this).addClass('active');
        jQuery('#filters a.active').removeClass('active');
        return false;
 
    });
 
});


	
	jQuery(document).ready(function(){

        // Optional code to hide all divs
        jQuery(".bottom-filter").hide();
          // Show chosen div, and hide all others
        jQuery(".top-filter a").click(function (e) 
        {
                e.preventDefault();
            jQuery("#" + jQuery(this).attr("class")).show().siblings('div').hide();
        });

    });
	