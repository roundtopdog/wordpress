<?php get_header(); ?>
</div>	
</div>
<div id="content" >

 <?php   weddings_home_about_us(); ?>	
	
		<div class="container">
		
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"   class="widget-area">
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary-widget-area' ); 	?>					
				</div>
			</div>
			<?php } 
			
		    weddings_content_posts();  
			
            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div id="sidebar2"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>
<?php weddings_integrate_is_baner(); ?>
  </div>
</div>
 <?php   get_footer(); ?>
