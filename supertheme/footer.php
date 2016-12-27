<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package supertheme
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
	
<div id="footer-sidebar1 col-md-4">
<?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
}
?>
</div>
<div id="footer-sidebar2 col-md-4">
<?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
}
?>
</div>
<div id="footer-sidebar3 col-md-4">
<?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
}
?>
</div>
		
		
		
		<div class="sub_footer">
		<p>&copy; <?php echo date("Y") ?> - Azienda</p> 
		<a class="popup-privacy" href="#privacypolicy"> PRIVACY POLICY</a> | 
		<a class="popup-cookie" href="#privacycookies">COOKIES POLICY </a>
			
			
		</div>
	</footer><!-- #colophon -->
	
	</div>

<?php get_template_part('template-part', 'privacycook'); ?>
<?php wp_footer(); ?>



</body>
</html>
