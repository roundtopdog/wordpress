<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) { ?>
	<div id="sidebar3"  class="widget-area">
		<div class="sidebar-container">
			<?php  dynamic_sidebar( 'first-footer-widget-area' ); 	?>
		</div>
	</div>
<?php } ?>   

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<div id="sidebar4"  class="widget-area">
		<div class="sidebar-container">
			<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
		</div>
	</div>
<?php } ?> 
<?php  //  weddings_custom_css(); ?>

<div id="footer">
		<div class="container">
		
			<?php weddings_footer_text(); ?>
			
			<div class="ftricons" style="float: right;">

			<?php weddings_ftricons(); ?>

			</div>
			
		</div>
	<div class="clear"></div>	
</div>
<?php wp_footer(); ?>
</body>
</html>
