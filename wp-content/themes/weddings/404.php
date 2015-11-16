<?php
get_header();  ?>	
</div>	
</div>
<div id="content" class="page">
	<div class="container">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<div id="sidebar1"  class="widget-area" role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			</div>
			<?php } ?>
		   <div id="blog" class="blog">
				<h3 class="page-title" style="text-align: center;"><?php _e('Not Found', 'weddings'); ?></h3>
				<p style="text-align: center;"><?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address. Try searching:', 'weddings'); ?></p>
				<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
					<div id="searchbox">
						<div class="searchback">
							<input  type="text" value="" name="s" id="s" class="searchbox_search" placeholder="<?php echo __('Type here','weddings'); ?>"/> 
							<input type="submit" id="searchsubmit" value="<?php echo __('Search','weddings'); ?>" class="read_more"/>
						</div>																		
				   </div>
				</form>
				<img class="imgBox" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/404.jpg">	     				
		  </div>

       <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div id="sidebar2" class="widget-area">
				<div class="sidebar-container">
					  <?php dynamic_sidebar( 'sidebar-2' );  ?>
				</div>
			</div>     
		<?php } ?>
		
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
