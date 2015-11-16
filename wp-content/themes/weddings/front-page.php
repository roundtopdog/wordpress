<?php 
get_header(); 
	  weddings_top_posts(); ?>
	</div>	
</div>

<div id="content" >
		<div class="container">
		
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"   class="widget-area">
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary-widget-area' ); 	?>					
				</div>
			</div>
			<?php } 
			if( 'posts' == get_option( 'show_on_front' )  )
				weddings_content_posts();
			else
				weddings_content_posts_for_home();			

            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div id="sidebar2"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'sidebar-2' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>

  </div>
</div>
<?php  get_footer(); ?>
