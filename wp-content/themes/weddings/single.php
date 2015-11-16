<?php
global $weddings_general_settings_page,$post,$wpdb;
get_header(); 
weddings_update_page_layout_meta_settings();
wp_reset_postdata();
$web_business_meta = get_post_meta($post->ID,'_weddings_meta',TRUE);
foreach ( $weddings_general_settings_page->options_generalsettings as $value ) {
    if ( get_theme_mod( $value['id'] ) === FALSE ) { 
	   $$value['var_name'] = $value['std']; 
	} 
	else {
   	   $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}
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
		<?php 
		} ?>

		<div id="blog" class="blog" style="margin-top: 60px;">
			<?php if(have_posts()) { ?><?php while(have_posts()) { the_post(); ?>
			<div class="single-post">															    
				<div class="entry" style="background: #F8F8F8; padding-right: 7px; margin-bottom: 15px; float: none; display: table;">	
					<div class="single_image">
						<?php the_post_thumbnail(array(170,250)); ?>
						<h3 style="font-weight: bold; padding: 10px 0;">
							<a class="title_href" href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<i style="color: #a8a8a8;"><?php						
						if(isset($web_business_meta['single_post_text'])) echo $web_business_meta['single_post_text']; ?> </i>
					</div>
				</div>
				<?php the_content(); ?>
				<div class="entry-meta">
					<?php if($date_enable){          
						weddings_posted_on(); 			
					} 
					weddings_entry_meta(); ?>
				</div>
			</div>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Page', 'weddings' ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="page-links-number">', 'link_after' => '</span>' ) ); 
			weddings_post_nav(); ?>
		</div>
			<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
				<div id="sidebar2" class="widget-area">
					<div class="sidebar-container">
						<?php dynamic_sidebar( 'secondary-widget-area' );  ?>
					</div>
				</div>     
			<?php }
			global $post;
			$withcomments = true;
			if(comments_open()){	
				wp_reset_query(); ?>
					<div class="comments-template">
						<?php echo comments_template(); ?>
					</div>	
				<?php  
				}
			}
		} ?>	
		<div class="clear"></div>
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
              
<?php get_footer(); ?>