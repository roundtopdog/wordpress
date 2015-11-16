<?php get_header(); ?>
</div>	
</div>
<div id="content" >	
		<div class="container">		
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"   class="widget-area" style="margin-top:10px !important;">
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary-widget-area' ); 	?>					
				</div>
			</div>
			<?php } 	
			
		    weddings_content_posts_for_home();  
			
            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div id="sidebar2"  class="widget-area" style="margin-top:10px !important;">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>