<?php if ( has_post_thumbnail() ) : ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section data-type="background" data-speed="8" id="title_bread" class="bgimage parallax" style="background: url('<?php echo $thumb['0'];?>') no-repeat fixed right top / cover ; -webkit-filter: grayscale(1); filter: grayscale(1); ">
<?php endif; ?>
	
<section data-type="background" data-speed="8" id="title_bread" class="bgimage parallax standard">
    <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4><?php single_post_title()?>    </h4>
                         <div class="crumbs">
                             
                    </div>
                        
                    </div>
                   
                </div>
            </div>
        </div><!--breadcrumbs-->
  </section>
       





