<?php 

global $query_string, $weddings_general_settings_page;

//for update general_settings

foreach ($weddings_general_settings_page->options_generalsettings as $value)
 {
    if (get_theme_mod( $value['var_name'] ) === FALSE)
	{
		$$value['var_name'] = $value['std']; 
	}
	else 
	{
		$$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}

get_header();

?>
</div>	
</div>
<div id="content" class="page">
 <div class="container">  
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
		<div id="sidebar1"  class="widget-area" role="complementary">
			<div class="sidebar-container">
				<?php dynamic_sidebar( 'primary-widget-area' );  ?>
			</div>
		</div>
		<?php } ?>
	<div id="blog" class="blog search">
		<div>
			<h3 ><?php echo __('Search', 'weddings'); ?></h3>
			<div class="search-result-info">		
				<p><?php echo __('Count', 'weddings'); ?> <?php echo count($wp_query->get_posts()) ; ?> </p>
			</div>
		</div>
		<?php /*print page content*/ 
		if( have_posts() ) { 
			while( have_posts()){ 
				the_post(); ?>
				 <div class="single-post">
						<a href="<?php the_permalink(); ?>">
							<h3 class="page_title"><?php the_title(); ?></h3>
						</a>
				
					<?php weddings_entry_cont(); ?>
					<div class="clear"></div>
				</div>
	  <?php } ?>
	     	<div class="page-navigation">
				<?php posts_nav_link(); ?>
			</div>
	  
	<?php	}
	 wp_reset_query(); ?>
</div>
	
<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
	<div id="sidebar2"  class="widget-area" role="complementary">
		<div class="sidebar-container">
			<?php dynamic_sidebar( 'sidebar-2' );  ?>
		</div>
	</div>     
			<?php } ?>
	   <div class="clear"></div>
	</div>
</div>                 
<?php get_footer(); ?>