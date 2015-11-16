<?php
				
function weddings_home_about_us() {
global $weddings_home_page;

// initila home setings variables
foreach ($weddings_home_page->options_homepage as $value) 
{
	if(isset($value['id']))
	{
		if (get_theme_mod( $value['id'] ) === FALSE)
		{
			 $$value['var_name'] = $value['std']; 
		} 
		else { 		
			$$value['var_name'] = get_theme_mod( $value['id'] );
		}	
	}
}
$abaut_us_post=get_post($home_abaut_us_post);
   if($hide_about_us=='' && $abaut_us_post!=NULL) 
   { ?>
		<div id="top-page">
			<div class="container">
				<div class="blog">
				<?php if($home_abaut_us_post)
				       { 
						
						$attr_thumb = array(
							'class'	=> "abaut_us_post",
						);
						echo get_the_post_thumbnail( $abaut_us_post->ID,'thumbnail',$attr_thumb ); 	?>
						<h2><?php echo esc_html($abaut_us_post->post_title); ?></h2>
						<p>
						<?php 
						weddings_the_excerpt_max_charlength(400,$abaut_us_post->post_content);  ?>
						</p>
						<a href="<?php echo get_permalink($abaut_us_post->ID) ?>" class="read_more"><?php echo __('More','weddings'); ?></a>
					
					<?php } ?>
				</div>			
				<div class="clear"></div>
			</div>
			
		</div>
	<?php } else { ?>
	    <style>
		  #sidebar1, #sidebar2{
		    margin-top:10px !important;
		  }
		</style>
	<?php }
}

function weddings_content_posts_for_home() {
	global $weddings_general_settings_page,$weddings_home_page,$wp_query,$paged;

// initila home setings variables
foreach ($weddings_home_page->options_homepage as $value) 
{
	if(isset($value['id']))
	{
		if (get_theme_mod( $value['id'] ) === FALSE)
		{
			 $$value['var_name'] = $value['std']; 
		} 
		else { 		
			$$value['var_name'] = get_theme_mod( $value['id'] );
		}	
	}
}
// initila general setings variables
foreach ($weddings_general_settings_page->options_generalsettings as $value) 
{
    if (get_theme_mod( $value['id'] ) === FALSE)
	{
		 $$value['var_name'] = $value['std']; 
	} else {
		 $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}		
?><div id="blog" class="blog">

<style>
		  #sidebar1, #sidebar2{
		    margin-top:10px !important;
		  }
		</style>
<?php
			 if(have_posts()) { 
					while (have_posts()) {
						the_post();
		
						?>
				<div class="blog-post home-post">
					<h2 style="font-size:60px; text-align: center;">
						<a class="title_href" href="<?php echo get_permalink() ?>">
						   <?php the_title(); ?>
						</a>
					</h2>

						<?php 
					   if($grab_image)
					   {
			            echo weddings_display_thumbnail(150,150); 
			           }
				       else 
					   {
					    echo weddings_thumbnail(150,150);
				       }
					   ?>
					   <span style="font-style: italic;"><?php
					  if($blog_style) 
                        {
                           the_excerpt();
                        }
                        else 
                        {
                           the_content(__('More','weddings'));
					    }   ?>
						</span>
					<div class="clear"></div>	
				</div>
				<?php 
				}
				if( $wp_query->max_num_pages > 2 ){ ?>
					<div class="page-navigation">
						<?php posts_nav_link(); ?>
					</div>	   
				<?php }
				
				}
				
				wp_reset_query(); ?>			
			</div>
		    <?php }	


function weddings_content_posts() {
global $weddings_general_settings_page,$weddings_home_page,$wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// initila home setings variables
foreach ($weddings_home_page->options_homepage as $value) 
{
	if(isset($value['id']))
	{
		if (get_theme_mod( $value['id'] ) === FALSE)
		{
			 $$value['var_name'] = $value['std']; 
		} 
		else { 		
			$$value['var_name'] = get_theme_mod( $value['id'] );
		}	
	}
}
// initila general setings variables
foreach ($weddings_general_settings_page->options_generalsettings as $value) 
{
    if (get_theme_mod( $value['id'] ) === FALSE)
	{
		 $$value['var_name'] = $value['std']; 
	} else {
		 $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}		
		$cat_checked=0;
		if($content_post_cats)
			$cat_checked=1;
			
		$categ_checked=0;
		if($content_post_categories)
			$categ_checked=1;
			
        $temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		
			?>
			<div class="blog" id="blog_posts">		
								<div class="blog_wel">
				<?php
					$i=0;
					$wp_query->query('posts_per_page=1&cat='.weddings_remove_last_comma($content_post).'&paged='.$paged);
					 if(have_posts()) { 
							while ($wp_query->have_posts()) {
								$wp_query->the_post();
			
								if($i==1)
									break;
								else
									$i++;  ?>
						<div class="blog-post">							
								  <h2 style="font-size:60px; text-align: center;"><a class="title_href" href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>								  
								  <p>
									   <?php if($blog_style) 
										{
										   the_excerpt();
										}
										else 
										{
										   the_content();
										   }?>
								  </p>
							
						</div>
					<?php 
					}					
					
					}
					wp_reset_query(); 
					?>				
				</div>
			<?php
		    $n_of_home_post=get_option( 'posts_per_page', 6 );

			if($n_of_home_post!=0){
			$content_categories=$wp_query->query('posts_per_page='.($n_of_home_post).'&cat='.weddings_remove_last_comma($content_post_categories).'&paged='.$paged);	
			
			if(!empty($content_categories)){  ?>
				<div id="blog" class="blog" style="width: 100%;">
					<h2 class="gallery_cat"><?php echo esc_html($categories_name); ?></h2>
					<div class="blog_gellery">
						<?php
						$i=0;						
						if(have_posts()) { 			 
						while ($wp_query->have_posts()) {
							$wp_query->the_post(); ?>
							<div class="blog-post">

								<a class="title_href" href="<?php echo get_permalink() ?>">
								<?php
								
								   if($grab_image)
								   {
									echo weddings_display_thumbnail('200','150'); 
								   }
									else if(!$grab_image && !has_post_thumbnail()){
									?>
										<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/Untitled-1.jpg" />
									<?php
									}
								   else 
								   {
									echo weddings_thumbnail('350','300');
								   } ?>
								</a>
							</div>
					<?php 
					
					}
					
					wp_reset_query(); ?>			
				</div>
			</div>
			<?php  
			}
	 }
 }
	$testim_number = esc_html($n_of_testimonials);	
	$content_post_cates=$wp_query->query('posts_per_page='.($testim_number).'&cat='.weddings_remove_last_comma($content_post_cats).'&paged='.$paged);
	if(!empty($content_post_cates)){						
	if($content_post_cats!=""){
	?>
	<div class="blog" id="test_blog">
		<h2 class="test_cat"><?php echo esc_html($cat_name); ?></h2>
		<div class="blog_test">
		<ul class="testimonials">
			<?php
			$i=0;
			 if(have_posts()) { 
			
			while ($wp_query->have_posts()) {
				$wp_query->the_post();  ?>	
				<li class="blog-post">
					<div class="image">
						<a href="<?php echo get_permalink() ?>" class="title_href">
							<?php
								if($grab_image)
									echo weddings_display_thumbnail('250','100'); 					
								else 
									echo weddings_thumbnail('250','130');
							?>
						</a>
					</div>
					<div class="text">
						<a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
						<p>
							<?php
								if($blog_style)
									weddings_the_excerpt_max_charlength(150);
								else 
									the_content(); ?>
						</p>
					</div>
				</li>

				<?php 
				}
				?>
				</ul>
				<?php
				
				}
				wp_reset_query();  ?>				
				</div>	
			</div>
</div>
<?php		
}	
}
			
}


function weddings_entry_meta_cont(){

//for update general_settings
global $weddings_general_settings_page;
foreach ( $weddings_general_settings_page->options_generalsettings as $value ) {
    if ( get_theme_mod( $value['id'] ) === FALSE )
	{ 
	   $$value['var_name'] = $value['std']; 
	} else {
   	   $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}

?>
   <div class="entry-meta">
		<?php if($date_enable){      
				weddings_posted_on(); 		
				} 
		  ?>
	</div>
<?php
}

function weddings_entry_cont(){

//for update general_settings
global $weddings_general_settings_page;
foreach ($weddings_general_settings_page->options_generalsettings as $value) {
    if (get_theme_mod( $value['var_name'] ) === FALSE)
	{ 
		$$value['var_name'] = $value['std'];
	}
	else
    { 
		$$value['var_name'] = get_theme_mod( $value['id'] );
    }

}

?>
		<div class="entry">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark">
			<?php
				if($grab_image){
				  echo weddings_display_thumbnail(150,150); 
				}
				else {
					weddings_thumbnail(150,150);
				}
			?>
			</a>
	        <?php  if($blog_style){
			     the_excerpt();
			   }else{
			     the_content(__('More','weddings'));
			   }  ?>

		</div>
        <div class="entry-meta">
			<?php if($date_enable){          
				   weddings_posted_on(); 			
			 } 
			 weddings_entry_meta(); ?>
		</div><?php

}

function weddings_footer_text(){

global  $weddings_general_settings_page;
 
foreach ( $weddings_general_settings_page->options_generalsettings as $value ) {
	if(isset($value['id'])){
		if ( get_theme_mod( $value['id'] ) === FALSE ) {
		   $$value['var_name'] = $value['std']; 
		} 
		else {
		   $$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
	}

}

  if($footer_text != "")	{?>
	<div id="footer-bottom">
		<?php echo stripslashes($footer_text); ?>		
	</div>
<?php }
}

function weddings_ftricons(){

global  $weddings_general_settings_page;
 
foreach ( $weddings_general_settings_page->options_generalsettings as $value ) {
	if(isset($value['id'])){
		if ( get_theme_mod( $value['id'] ) === FALSE ) {
		   $$value['var_name'] = $value['std']; 
		} 
		else {
		   $$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
	}

}

?>

 <a  <?php if( $show_facebook_icon=='' || $facebook_url == "" ){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($facebook_url) ) { echo esc_url($facebook_url);} else { echo "javascript:;";}?>"  target="_blank" title="Facebook">
	<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/Facebook-icon.png" width="45" height="45" alt="" />
 </a>
 <a <?php if( $show_twitter_icon=='' || $twitter_url == ""){ echo "style=\"display:none;\""; } ?> href="<?php if( trim($twitter_url) ){ echo esc_url($twitter_url);} else { echo "javascript:;";}?>" target="_blank" title="Twitter">
	<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/twitter_icon.png" width="45" height="45" alt="" />
 </a>
 <a <?php if( $show_rss_icon=='' || $rss_url == "" ) { echo "style=\"display:none;\""; } ?>  href="<?php if( trim($rss_url) ) { echo esc_url($rss_url);} else { echo "javascript:;";}?>" target="_blank" title="Rss">
	<img src="<?php  echo get_template_directory_uri('template_url'); ?>/images/rss-icon.png" width="45" height="45" alt="" />
 </a>
<?php
}


function weddings_logo_img(){

global $weddings_general_settings_page,$weddings_color_control_page;

foreach ( $weddings_general_settings_page->options_generalsettings as $value )
 {
	if(isset($value['id']))
	{
		
		if ( get_theme_mod( $value['id'] ) === FALSE )
		{
		   $$value['var_name'] = $value['std']; 
		} 
		else {
		   $$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
		
	}
}

foreach ($weddings_color_control_page->options_colorcontrol as $value) {
	 $$value['var_name'] = $value['std']; 
}

?>
	<div id="logo-block">
		<a class="hedar-a-element" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<div>
			<?php 
				if(trim($logo_img) && $logo_img!=''){?> 
					<h1 id="site-title">
						<span>
							<a style="color: #c7c6c6;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							 <?php   echo "<img id=\"site-title\" src=\"".$logo_img."\" alt=\"logo\">";   ?>
						   </a>
					   </span>
					</h1>
					<div id="site-description">
						<p id="site-description-p" style="max-width: 375px; margin-top: -20px;text-align: right;"><?php bloginfo( 'description' ); ?></p>
					</div>
					<?php	
				}								
				else {
				?> 
				<h1 id="site-title">
					<span>
						<a class="site-title-a" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
						</a>
					</span>
				</h1>
				<div id="site-description">
						<p id="site-description-p"><?php bloginfo( 'description' ); ?></p>
				</div>
			<?php } ?>
			</div>
		</a>
	</div>

<?php
}

function weddings_slideshow(){
	
global $weddings_home_page,$weddings_slider_page;
foreach ($weddings_home_page->options_homepage as $value)
 {
	if(isset($value['id'])){
		if (get_theme_mod( $value['id'] ) === FALSE)
		{ 
		   $$value['var_name'] = $value['std']; 
		} else { 
		   $$value['var_name'] = get_theme_mod( $value['id'] ); 
		}
	}
}
 
 $image_link=get_theme_mod('web_busines_image_link',get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg');
 $hide_slider = get_theme_mod('ct_hide_slider');
    if($hide_slider=="" && $image_link!=''){
		
	?><script>
	var data = [];      
	<?php
	
		$image_link=get_theme_mod('web_busines_image_link',get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg');
		
		if($image_link){
			$link_array=explode(';;;;',$image_link);
			if(count($link_array)>1)
			array_pop($link_array);
		}else {$link_array=array();}	
		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]=[];';
		}
		
		
		for($i=0;$i<count($link_array);$i++){
			echo 'data["'.$i.'"]["id"]="'.$i.'";';
			echo 'data["'.$i.'"]["image_url"]="'.$link_array[$i].'";';
		}
			
		
		$image_textarea=get_theme_mod('web_busines_image_textarea','<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>');
		
		if($image_textarea){
			$textarea_array=explode(';;;;',$image_textarea);
			array_pop($textarea_array);
		}else {$textarea_array=array();}
		
		for($i=0;$i<count($textarea_array);$i++){
			$textarea_array[$i]=preg_replace("/[\\/]+/","/",$textarea_array[$i]);
			echo 'data["'.$i.'"]["wddescription"]="'.addslashes($textarea_array[$i]).'";';
			$current_image_description = $textarea_array[$i];
			
		}
		$image_title=get_theme_mod('web_busines_image_title','');
		if($image_title){
			$title_array=explode(';;;;',$image_title);
			array_pop($title_array);
		}else {$title_array=array();}
		
		for($i=0;$i<count($title_array);$i++){
			$title_array[$i]=preg_replace("/[\\/]+/","/",$title_array[$i]);
			echo 'data["'.$i.'"]["wdalt"]="'.addslashes($title_array[$i]).'";';
			$current_image_alt=$title_array[$i];
		}
	
	?>
       
		 
    </script>
	 
 <?php	
	
	$slideshow_title_position = explode('-', trim(get_theme_mod('ct_slider_title_position', 'right-top')) );
	$slideshow_description_position = explode('-', trim(get_theme_mod('ct_slider_description_position', 'left-bottom')) );
	$slideshow_height = esc_html(get_theme_mod('ct_slider_height','440'));
  if(is_home()){
 ?>
 <style>
  .wd_bwg_slideshow_image_wrap {
	height:<?php echo $slideshow_height; ?>px;
  }
  </style>
<?php } 
else{
?>
<style>
.web .wd_bwg_slideshow_image_wrap, .tablet .wd_bwg_slideshow_image_wrap {
	height:<?php echo $slideshow_height/1.3; ?>px !important;
  }
  .wd_bwg_slideshow_image_wrap > div{
	height:<?php echo $slideshow_height/1.3; ?>px !important;
  }
  #wd_spider_slideshow_right,
  #wd_spider_slideshow_left{
	height: 21%;
	margin-top: 0%;
  }
  </style>
<?php } ?>
<style>
<?php if(isset($slideshow_title_position[1])){ ?>
  .wd_bwg_slideshow_title_span {
	text-align: <?php echo esc_html($slideshow_title_position[0]); ?>;
	vertical-align: <?php echo esc_html($slideshow_title_position[1]); ?>;
  }
<?php } 
if(isset($slideshow_description_position[1])){
?>
  .wd_bwg_slideshow_description_span {
	text-align: <?php echo esc_html($slideshow_description_position[0]); ?>;
	vertical-align: <?php echo esc_html($slideshow_description_position[1]); ?>;
  }
<?php } ?>
</style>
<!--SLIDESHOW START-->
<div id="slideshow">
	<div class="wd_container">
	<div class="wd_slider_contener_for_exklusive">
	<div class="wd_bwg_slideshow_image_wrap" id="wd_bwg_slideshow_image_wrap_id">
      <?php 
	  
	  
	  
	  $current_image_id=0;
      $current_pos =0;
	  $current_key=0;
	  
	
	  $image_href=get_theme_mod('web_busines_image_href','');
		if($image_href){
			$href_array=explode(';;;;',$image_href);
			array_pop($href_array);
		}
		else {$href_array=array();}	
		
		
		   if($image_link){
					$image_rows=explode(';;;;',$image_link);
					if(count($image_rows)>1)
					array_pop($image_rows);
			}else {$image_rows=array();}	
			$i=0;
	
		if(count($image_rows)>=2){		
	  if(is_home()){
        ?>
		<!--################# DOTS ################# -->
		 <a id="wd_spider_slideshow_left" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data);"><span id="wd_spider_slideshow_left-ico"><span><i class="wd_bwg_slideshow_prev_btn fa "></i></span></span></a>
         <a id="wd_spider_slideshow_right" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) + iterator()) % data.length, data);"><span id="wd_spider_slideshow_right-ico"><span><i class="wd_bwg_slideshow_next_btn fa "></i></span></span></a>
		<!--################################## -->
		
        <?php
}
	else{
	?>
	<!--################# DOTS ################# -->
		 <a id="wd_spider_slideshow_left" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data);"><span id="wd_spider_slideshow_left-ico"><span><i class="wd_bwg_slideshow_prev_btn fa "></i></span></span></a>
         <a id="wd_spider_slideshow_right" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) + iterator()) % data.length, data);"><span id="wd_spider_slideshow_right-ico"><span><i class="wd_bwg_slideshow_next_btn fa "></i></span></span></a>
		<!--################################## -->
	
	<?php
	}
	}
      ?>
	  
	  <!--################ IMAGES ################## -->
     <div id="wd_bwg_slideshow_image_container"  width="100%" class="wd_bwg_slideshow_image_container">        
        <div class="wd_bwg_slide_container" width="100%">
          <div class="wd_bwg_slide_bg">
            <div class="wd_bwg_slider">
          <?php
			
          foreach ($image_rows as $key => $image_row) {
            if ($i == $current_image_id) {
              $current_key = $key;
              ?>
              <span class="wd_bwg_slideshow_image_span" id="wd_image_id_<?php echo $i; ?>">
                <span class="wd_bwg_slideshow_image_span1">
                  <span class="wd_bwg_slideshow_image_span2">
					  <a href="<?php if(isset($href_array[$i])) echo $href_array[$i];?>" >
							<img id="wd_bwg_slideshow_image"
							 class="wd_bwg_slideshow_image"
							 src="<?php if(isset($image_row)) echo $image_row; ?>"
							 image_id="<?php echo $i; ?>" />
					  </a>
                  </span>
                </span>
              </span>
              <input type="hidden" id="wd_bwg_current_image_key" value="<?php echo $key; ?>" />
              <?php
            }
            else {
              ?>
              <span class="wd_bwg_slideshow_image_second_span" id="wd_image_id_<?php echo $i; ?>">
                <span class="wd_bwg_slideshow_image_span1">
                  <span class="wd_bwg_slideshow_image_span2">
                    <a href="<?php if(isset($href_array[$i]))  echo $href_array[$i];?>" ><img id="wd_bwg_slideshow_image_second" class="wd_bwg_slideshow_image" src="<?php if(isset($image_row)) echo $image_row; ?>" /></a>
                  </span>
                </span>
              </span>
              <?php
            }
			$i++;
          }
          ?>
            </div>
          </div>
        </div>
        <?php
          if (isset($enable_slideshow_ctrl) && $enable_slideshow_ctrl && count($image_rows)>1 && is_home()) {
            ?>
           <a id="wd_spider_slideshow_left" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) >= 0 ? (parseInt(jQuery('#wd_bwg_current_image_key').val()) - iterator()) % data.length : data.length - 1, data);"><span id="wd_spider_slideshow_left-ico"><span><i class="wd_bwg_slideshow_prev_btn fa <?php echo $theme_row->slideshow_rl_btn_style; ?>-left"></i></span></span></a>
          <span id="wd_bwg_slideshow_play_pause"><span><span id="wd_bwg_slideshow_play_pause-ico"><i class="wd_bwg_ctrl_btn bwg_slideshow_play_pause fa fa-play"></i></span></span></span>
          <a id="wd_spider_slideshow_right" href="javascript:wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) + iterator()) % data.length, data);"><span id="wd_spider_slideshow_right-ico"><span><i class="wd_bwg_slideshow_next_btn fa <?php echo $theme_row->slideshow_rl_btn_style; ?>-right"></i></span></span></a>
          <?php
          }
        ?>
      </div>
	
	
	
	<!--################ TITLE ################## -->
      <div class="wd_bwg_slideshow_image_container" style="position: absolute;">
        <div class="wd_bwg_slideshow_title_container">
          <div style="display:table; margin:0 auto;">
            <span class="wd_bwg_slideshow_title_span">
				<div class="wd_bwg_slideshow_title_text" >
					<?php if(isset($title_array[0])) echo stripslashes($title_array[0]); ?>
			   </div>
            </span>
          </div>
        </div>
      </div>
      <?php 
   
if(is_home()){
      ?>
	  <!--################ DESCRIPTION ################## -->
      <div class="wd_bwg_slideshow_image_container" style="position: absolute;">
        <div class="wd_bwg_slideshow_title_container">
          <div style="display:table; margin:0 auto;">
            <span class="wd_bwg_slideshow_description_span">			
              <div class="wd_bwg_slideshow_description_text">
                <?php 
				echo stripslashes($textarea_array[0]); ?>        
			  </div>
            </span>
          </div>
        </div>
      </div>
	  <?php } ?>
    </div>
   </div>
  </div>
</div>
<?php
$weddings_js_parameters=array(
	"pausetime"    =>get_theme_mod('ct_pause_time','4000'),
	"wdspeed"        =>get_theme_mod('ct_anim_speed','500'),
	"pausehover"   =>get_theme_mod('ct_pause_on_hover',false),
	"effect"       =>trim(get_theme_mod('ct_effect','random')),
	"height"       =>get_theme_mod('ct_slider_height','440'),
	"hideslider"   =>get_theme_mod('hideslider',false),
	"widt_standart"=>1024
);
weddings_slideshow_java_script($weddings_js_parameters);
?>

<!--SLIDESHOW END-->
	<?php		
	}else{ ?>
		<style>
		#top-posts{
			margin-top: 1px;
		}
		</style>	
<?php }
}

function weddings_top_posts(){

global $weddings_home_page,$weddings_general_settings_page,$wp_query;

foreach ( $weddings_general_settings_page->options_generalsettings as $value ) 
{
    if ( get_theme_mod( $value['id'] ) === FALSE ) 
	{ 
	   $$value['var_name'] = $value['std']; 
	} else {
   	   $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}
foreach ($weddings_home_page->options_homepage as $value) 
{
	if(isset($value['id']))
	{
		if (get_theme_mod( $value['id'] ) === FALSE)
		{
			 $$value['var_name'] = $value['std']; 
		} 
		else { 		
			$$value['var_name'] = get_theme_mod( $value['id'] );
		}	
	}
}
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    if ($hide_top_posts=='' && is_home()) {
		if($top_post_categories!=""){
            $topPosts = 0;	
		$weddings_query = new WP_Query('posts_per_page=3&paged='.$paged.'&cat='.$top_post_categories.'&orderby=date&order=DESC');
		if(have_posts()) { ?>
		<div id="top-posts">
			<div class="container">
				<ul id="top-posts-list">
				
				 <?php while ($weddings_query->have_posts()) 
					{						
						$weddings_query->the_post();
						if($topPosts++ == 3)
						{
							break;
						}	 ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="image-block">
										<?php if($grab_image) 
								{
									echo weddings_display_thumbnail('320','210'); 
								}
								else 
								{
								    echo weddings_thumbnail('320','210');
								} ?>
							</div>
							<div class="top-posts-texts">
								<strong class="heading"><?php the_title(); ?></strong>
								<span><?php weddings_the_excerpt_max_charlength(90); ?></span>
							</div>
							
						</a>
					</li>
					<?php } ?>					
				</ul>
			</div>
			<div style="clear:both;"></div>
		</div>	
	<?php }
	}
	else{
		?>
		<div id="top-posts" class="web">
			<div class="container" style="width: 1398px;">
				<ul id="top-posts-list">
				   <li>					
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block" style="height: 180px; width: 320px; margin-top: 10px; margin-bottom: 0px;">
								<img width="320" height="167" src="<?php echo get_template_directory_uri(); ?>/images/top_2.jpg" class="attachment-320x210 wp-post-image" alt="top_2.jpg">
							</div>
						</a>
						<div class="top-posts-texts" style="background-color: rgb(252, 252, 252);">
								<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Ring</a></h3>
							<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
						</div>		
					</li>
					<li>					
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block">
								<img width="320" height="167" src="<?php echo get_template_directory_uri(); ?>/images/top_3.jpg" class="attachment-320x210 wp-post-image" alt="top_3.jpg">
							</div>
						</a>
							<div class="top-posts-texts" style="background-color: rgb(252, 252, 252);">
									<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Trip</a></h3>
								<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
							</div>
					</li>
					<li>						
						<a href="#" style="color: rgb(70, 70, 70);">
							<div class="image-block" style="height: 180px; width: 320px; margin-top: 10px; margin-bottom: 0px;">
								<img width="320" height="167" src="<?php echo get_template_directory_uri(); ?>/images/top_1.jpg" class="attachment-320x210 wp-post-image" alt="top_1.jpg">	
							</div>
						</a>
						<div class="top-posts-texts" style="background-color: rgb(252, 252, 252);">
							<h3 class="heading"><a href="#" style="color: rgb(70, 70, 70);">My Wedding Party</a></h3>
							<span>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</span>
						</div>												
					</li>										
				</ul>
			</div>
			<div style="clear:both;"></div>
		</div>
		<?php
	}
	}
}

function weddings_favicon_img(){
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		global $weddings_general_settings_page;
		foreach ( $weddings_general_settings_page->options_generalsettings as $value )
		 {
			if(isset($value['id']))
			{
				
				if ( get_theme_mod( $value['id'] ) === FALSE )
				{
				   $$value['var_name'] = $value['std']; 
				} 
				else {
				   $$value['var_name'] = get_theme_mod( $value['id'] ); 
				}
				
			}
		}

		if($favicon_enable=='on' && $favicon_img)
		{ ?>
		<link rel="shortcut icon" href="<?php if(trim($favicon_img)) echo esc_url($favicon_img); ?>" type="image/x-icon" />
		<?php  }
	}
}



function weddings_slideshow_java_script($weddings_js_parameters){

	?>
<script>
	var wd_bwg_transition_duration = <?php echo $weddings_js_parameters["wdspeed"];?>;
	// For browsers that does not support transitions.
	function wd_bwg_fallback(current_image_class, next_image_class, direction) {
		wd_bwg_<?php echo $weddings_js_parameters["effect"];?>(current_image_class, next_image_class, direction);
		
	}
	
	function wd_bwg_<?php echo $weddings_js_parameters["effect"];?>(current_image_class, next_image_class, direction) {
	
		if (wd_bwg_testBrowser_cssTransitions()) {
		  jQuery(next_image_class).css('transition', 'opacity ' + wd_bwg_transition_duration + 'ms linear');
		  jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
		  jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
		}
		else {
		  jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, wd_bwg_transition_duration);
		  jQuery(next_image_class).animate({
			  'opacity' : 1,
			  'z-index': 2
			});
		  // For IE.
		  jQuery(current_image_class).fadeTo(wd_bwg_transition_duration, 0);
		  jQuery(next_image_class).fadeTo(wd_bwg_transition_duration, 1);
		}
	}
	
  var wd_bwg_trans_in_progress = false;
     
      var wd_bwg_playInterval;
      // Stop autoplay.
      clearInterval(wd_bwg_playInterval);
     
      var wd_bwg_current_key = 0;
      var wd_bwg_current_filmstrip_pos = 0;
      // Set filmstrip initial position.
      function wd_bwg_set_filmstrip_pos(filmStripWidth) {
        var selectedImagePos = -wd_bwg_current_filmstrip_pos - (jQuery(".wd_bwg_slideshow_filmstrip_thumbnail").width() + 2) / 2;
        var imagesContainerLeft = Math.min(0, Math.max(filmStripWidth - jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").width(), selectedImagePos + filmStripWidth / 2));
        jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").animate({
            left: imagesContainerLeft
          }, {
            duration: 500,
            complete: function () { wd_bwg_filmstrip_arrows(); }
          });
      }
      function wd_bwg_move_filmstrip() {
        var image_left = jQuery(".wd_bwg_slideshow_thumb_active").position().left;
        var image_right = jQuery(".wd_bwg_slideshow_thumb_active").position().left + jQuery(".wd_bwg_slideshow_thumb_active").outerWidth(true);
        var wd_bwg_filmstrip_width = jQuery(".wd_bwg_slideshow_filmstrip").outerWidth(true);
        var long_filmstrip_cont_left = jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").position().left;
        var long_filmstrip_cont_right = Math.abs(jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").position().left) + wd_bwg_filmstrip_width;
        if (image_left < Math.abs(long_filmstrip_cont_left)) {
          jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").animate({
            left: -image_left
          }, {
            duration: 500,
            complete: function () { wd_bwg_filmstrip_arrows(); }
          });
        }
        else if (image_right > long_filmstrip_cont_right) {
          jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").animate({
            left: -(image_right - wd_bwg_filmstrip_width)
          }, {
            duration: 500,
            complete: function () { wd_bwg_filmstrip_arrows(); }
          });
        }
      }
      // Show/hide filmstrip arrows.
      function wd_bwg_filmstrip_arrows() {
        if (jQuery(".wd_bwg_slideshow_filmstrip_thumbnails").width() < jQuery(".wd_bwg_slideshow_filmstrip").width()) {
          jQuery(".wd_bwg_slideshow_filmstrip_left").hide();
          jQuery(".wd_bwg_slideshow_filmstrip_right").hide();
        }
        else {
          jQuery(".wd_bwg_slideshow_filmstrip_left").show();
          jQuery(".wd_bwg_slideshow_filmstrip_right").show();
        }
      }
      function wd_bwg_testBrowser_cssTransitions() {
        return wd_bwg_testDom('Transition');
      }
      function wd_bwg_testBrowser_cssTransforms3d() {
        return wd_bwg_testDom('Perspective');
      }
      function wd_bwg_testDom(prop) {
        // Browser vendor CSS prefixes.
        var browserVendors = ['', '-webkit-', '-moz-', '-ms-', '-o-', '-khtml-'];
        // Browser vendor DOM prefixes.
        var domPrefixes = ['', 'Webkit', 'Moz', 'ms', 'O', 'Khtml'];
        var i = domPrefixes.length;
        while (i--) {
          if (typeof document.body.style[domPrefixes[i] + prop] !== 'undefined') {
            return true;
          }
        }
        return false;
      }
      function wd_bwg_cube(tz, ntx, nty, nrx, nry, wrx, wry, current_image_class, next_image_class, direction) {
		// If browser does not support 3d transforms/CSS transitions.
        if (!wd_bwg_testBrowser_cssTransitions()) {
          return wd_bwg_fallback(current_image_class, next_image_class, direction);
        }
        if (!wd_bwg_testBrowser_cssTransforms3d()) {
          return wd_bwg_fallback3d(current_image_class, next_image_class, direction);
        }
        wd_bwg_trans_in_progress = true;
        jQuery(".wd_bwg_slide_bg").css('perspective', 1000);
        jQuery(current_image_class).css({
          transform : 'translateZ(' + tz + 'px)',
          backfaceVisibility : 'hidden'
        });
        jQuery(next_image_class).css({
          opacity : 1,
          backfaceVisibility : 'hidden',
          transform : 'translateY(' + nty + 'px) translateX(' + ntx + 'px) rotateY('+ nry +'deg) rotateX('+ nrx +'deg)'
        });
        jQuery(".wd_bwg_slider").css({
          transform: 'translateZ(-' + tz + 'px)',
          transformStyle: 'preserve-3d'
        });
        // Execution steps.
        setTimeout(function () {
          jQuery(".wd_bwg_slider").css({
            transition: 'all ' + wd_bwg_transition_duration + 'ms ease-in-out',
            transform: 'translateZ(-' + tz + 'px) rotateX('+ wrx +'deg) rotateY('+ wry +'deg)'
          });
        }, 20);
        // After transition.
        jQuery(".wd_bwg_slider").one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(wd_bwg_after_trans));
        function wd_bwg_after_trans() {
          jQuery(current_image_class).removeAttr('style');
          jQuery(next_image_class).removeAttr('style');
          jQuery(".wd_bwg_slider").removeAttr('style');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          wd_bwg_trans_in_progress = false;
        }
      }
      function wd_bwg_cubeH(current_image_class, next_image_class, direction) {
        // Set to half of image width.
        var dimension = jQuery(current_image_class).width() / 2;
        if (direction == 'right') {
          wd_bwg_cube(dimension, dimension, 0, 0, 90, 0, -90, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          wd_bwg_cube(dimension, -dimension, 0, 0, -90, 0, 90, current_image_class, next_image_class, direction);
        }
      }
      function wd_bwg_cubeV(current_image_class, next_image_class, direction) {
        // Set to half of image height.
        var dimension = jQuery(current_image_class).height() / 2;
        // If next slide.
        if (direction == 'right') {
          wd_bwg_cube(dimension, 0, -dimension, 90, 0, -90, 0, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          wd_bwg_cube(dimension, 0, dimension, -90, 0, 90, 0, current_image_class, next_image_class, direction);
        }
      }
      // For browsers that does not support transitions.
      function wd_bwg_fallback(current_image_class, next_image_class, direction) {
	  
        wd_bwg_(current_image_class, next_image_class, direction);
      }
      // For browsers that support transitions, but not 3d transforms (only used if primary transition makes use of 3d-transforms).
      function wd_bwg_fallback3d(current_image_class, next_image_class, direction) {
        wd_bwg_sliceV(current_image_class, next_image_class, direction);
      }
      function wd_bwg_none(current_image_class, next_image_class, direction) {
        jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
        jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
      }
      function wd_bwg_(current_image_class, next_image_class, direction) {
		
        if (wd_bwg_testBrowser_cssTransitions()) {
          jQuery(next_image_class).css('transition', 'opacity ' + wd_bwg_transition_duration + 'ms linear');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
        }
        else {
          jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, wd_bwg_transition_duration);
          jQuery(next_image_class).animate({
              'opacity' : 1,
              'z-index': 2
            });
          // For IE.
          jQuery(current_image_class).fadeTo(wd_bwg_transition_duration, 0);
          jQuery(next_image_class).fadeTo(wd_bwg_transition_duration, 1);
        }
      }
      function wd_bwg_grid(cols, rows, ro, tx, ty, sc, op, current_image_class, next_image_class, direction) {
        // If browser does not support CSS transitions.
        if (!wd_bwg_testBrowser_cssTransitions()) {
          return wd_bwg_fallback(current_image_class, next_image_class, direction);
        }
        wd_bwg_trans_in_progress = true;
        // The time (in ms) added to/subtracted from the delay total for each new gridlet.
        var count = (wd_bwg_transition_duration) / (cols + rows);
        // Gridlet creator (divisions of the image grid, positioned with background-images to replicate the look of an entire slide image when assembled)
        function wd_bwg_gridlet(width, height, top, img_top, left, img_left, src, imgWidth, imgHeight, c, r) {
          var delay = (c + r) * count;
          // Return a gridlet elem with styles for specific transition.
          return jQuery('<div class="wd_bwg_gridlet" />').css({
            width : width,
            height : height,
            top : top,
            left : left,
            backgroundImage : 'url("' + src + '")',
            backgroundColor: jQuery(".wd_bwg_slideshow_image_wrap").css("background-color"),
            /*backgroundColor: rgba(0, 0, 0, 0),*/
            backgroundRepeat: 'no-repeat',
            backgroundPosition : img_left + 'px ' + img_top + 'px',
            backgroundSize : imgWidth + 'px ' + imgHeight + 'px',
            transition : 'all ' + wd_bwg_transition_duration + 'ms ease-in-out ' + delay + 'ms',
            transform : 'none'
          });
        }
        // Get the current slide's image.
        var cur_img = jQuery(current_image_class).find('img');
        // Create a grid to hold the gridlets.
        var grid = jQuery('<div />').addClass('wd_bwg_grid');
        // Prepend the grid to the next slide (i.e. so it's above the slide image).
        jQuery(current_image_class).prepend(grid);
        // vars to calculate positioning/size of gridlets
        var cont = jQuery(".wd_bwg_slide_bg");
        var imgWidth = cur_img.width();
        var imgHeight = cur_img.height();
        var contWidth = cont.width(),
            contHeight = cont.height(),
            imgSrc = cur_img.attr('src'),//.replace('/thumb', ''),
            colWidth = Math.floor(contWidth / cols),
            rowHeight = Math.floor(contHeight / rows),
            colRemainder = contWidth - (cols * colWidth),
            colAdd = Math.ceil(colRemainder / cols),
            rowRemainder = contHeight - (rows * rowHeight),
            rowAdd = Math.ceil(rowRemainder / rows),
            leftDist = 0,
            img_leftDist = (jQuery(".wd_bwg_slide_bg").width() - cur_img.width()) / 2;
        // tx/ty args can be passed as 'auto'/'min-auto' (meaning use slide width/height or negative slide width/height).
        tx = tx === 'auto' ? contWidth : tx;
        tx = tx === 'min-auto' ? - contWidth : tx;
        ty = ty === 'auto' ? contHeight : ty;
        ty = ty === 'min-auto' ? - contHeight : ty;
        // Loop through cols
        for (var i = 0; i < cols; i++) {
          var topDist = 0,
              img_topDst = (jQuery(".wd_bwg_slide_bg").height() - cur_img.height()) / 2,
              newColWidth = colWidth;
          // If imgWidth (px) does not divide cleanly into the specified number of cols, adjust individual col widths to create correct total.
          if (colRemainder > 0) {
            var add = colRemainder >= colAdd ? colAdd : colRemainder;
            newColWidth += add;
            colRemainder -= add;
          }
          // Nested loop to create row gridlets for each col.
          for (var j = 0; j < rows; j++)  {
            var newRowHeight = rowHeight,
                newRowRemainder = rowRemainder;
            // If contHeight (px) does not divide cleanly into the specified number of rows, adjust individual row heights to create correct total.
            if (newRowRemainder > 0) {
              add = newRowRemainder >= rowAdd ? rowAdd : rowRemainder;
              newRowHeight += add;
              newRowRemainder -= add;
            }
            // Create & append gridlet to grid.
            grid.append(wd_bwg_gridlet(newColWidth, newRowHeight, topDist, img_topDst, leftDist, img_leftDist, imgSrc, imgWidth, imgHeight, i, j));
            topDist += newRowHeight;
            img_topDst -= newRowHeight;
          }
          img_leftDist -= newColWidth;
          leftDist += newColWidth;
        }
        // Set event listener on last gridlet to finish transitioning.
        var last_gridlet = grid.children().last();
        // Show grid & hide the image it replaces.
        grid.show();
        cur_img.css('opacity', 0);
        // Add identifying classes to corner gridlets (useful if applying border radius).
        grid.children().first().addClass('rs-top-left');
        grid.children().last().addClass('rs-bottom-right');
        grid.children().eq(rows - 1).addClass('rs-bottom-left');
        grid.children().eq(- rows).addClass('rs-top-right');
        // Execution steps.
        setTimeout(function () {
          grid.children().css({
            opacity: op,
            transform: 'rotate('+ ro +'deg) translateX('+ tx +'px) translateY('+ ty +'px) scale('+ sc +')'
          });
        }, 1);
        jQuery(next_image_class).css('opacity', 1);
        // After transition.
        jQuery(last_gridlet).one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(wd_bwg_after_trans));
        function wd_bwg_after_trans() {
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          cur_img.css('opacity', 1);
          grid.remove();
          wd_bwg_trans_in_progress = false;
        }
      }
      function wd_bwg_sliceH(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        wd_bwg_grid(1, 8, 0, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_sliceV(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'min-auto';
        }
        else if (direction == 'left') {
          var translateY = 'auto';
        }
        wd_bwg_grid(10, 1, 0, 0, translateY, 1, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_slideV(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'auto';
        }
        else if (direction == 'left') {
          var translateY = 'min-auto';
        }
        wd_bwg_grid(1, 1, 0, 0, translateY, 1, 1, current_image_class, next_image_class, direction);
      }
      function wd_bwg_slideH(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        wd_bwg_grid(1, 1, 0, translateX, 0, 1, 1, current_image_class, next_image_class, direction);
      }
      function wd_bwg_scaleOut(current_image_class, next_image_class, direction) {
        wd_bwg_grid(1, 1, 0, 0, 0, 1.5, 0, current_image_class, next_image_class, direction);
      }
      
      function wd_bwg_scaleIn(current_image_class, next_image_class, direction) {
        wd_bwg_grid(1, 1, 0, 0, 0, 0.5, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_blockScale(current_image_class, next_image_class, direction) {
        wd_bwg_grid(8, 6, 0, 0, 0, .6, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_kaleidoscope(current_image_class, next_image_class, direction) {
        wd_bwg_grid(10, 8, 0, 0, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_fan(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var rotate = 45;
          var translateX = 100;
        }
        else if (direction == 'left') {
          var rotate = -45;
          var translateX = -100;
        }
        wd_bwg_grid(1, 10, rotate, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function wd_bwg_blindV(current_image_class, next_image_class, direction) {
        wd_bwg_grid(1, 8, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
      function wd_bwg_blindH(current_image_class, next_image_class, direction) {
        wd_bwg_grid(10, 1, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
	  
      function wd_bwg_random(current_image_class, next_image_class, direction) {
        var anims = ['sliceH', 'sliceV', 'slideH', 'slideV', 'scaleOut', 'scaleIn', 'blockScale', 'kaleidoscope', 'fan', 'blindH', 'blindV'];
        // Pick a random transition from the anims array.
		
        this["wd_bwg_" + anims[Math.floor(Math.random() * anims.length)] + ""](current_image_class, next_image_class, direction);
      }
      
	  function iterator() {
        var iterator = 1;
        return iterator;
      }
	  function stripslashes(str) {
		if(typeof str != "undefined"){
		str=str.replace(/\\'/g,'\'');
		str=str.replace(/\\"/g,'"');
		str=str.replace(/\\0/g,'\0');
		str=str.replace(/\\\\/g,'\\');
}
		return str;
		}
	  
	function wd_bwg_change_image(current_key, key, data) {
		if (wd_bwg_trans_in_progress) {
		  return;
		}
		var direction = 'right';
		if (wd_bwg_current_key > key) {
		  var direction = 'left';
		}
		else if (wd_bwg_current_key == key) {
		  return;
		}
		
		// Hide previous/next buttons on first/last images.
		if (data[key]) {
		  if (current_key == '-1') { // Filmstrip.
			current_key = jQuery(".wd_bwg_slideshow_thumb_active").children("img").attr("image_key");
		  }
		  else if (current_key == '-2') { // Dots.
			current_key = jQuery(".wd_bwg_slideshow_dots_active").attr("image_key");
		  }
		 // jQuery(".wd_bwg_slideshow_title_text").css({display: 'none'});
		//  jQuery(".wd_bwg_slideshow_description_text").css({display: 'none'});
		  // Set active thumbnail.
		  jQuery(".wd_bwg_slideshow_filmstrip_thumbnail").removeClass("wd_bwg_slideshow_thumb_active").addClass("wd_bwg_slideshow_thumb_deactive");
		  jQuery("#wd_bwg_filmstrip_thumbnail_" + key + "").removeClass("wd_bwg_slideshow_thumb_deactive").addClass("wd_bwg_slideshow_thumb_active");
		  jQuery(".wd_bwg_slideshow_dots").removeClass("wd_bwg_slideshow_dots_active").addClass("wd_bwg_slideshow_dots_deactive");
		  jQuery("#wd_bwg_dots_" + key + "").removeClass("wd_bwg_slideshow_dots_deactive").addClass("wd_bwg_slideshow_dots_active");          
		 
		  wd_bwg_current_key = key;
		  
		  // Change image id, key, title, description.
		  jQuery("#wd_bwg_current_image_key").val(key);
		  jQuery("#wd_bwg_slideshow_image").attr('image_id', data[key]["id"]);
		  
		  
		  jQuery(".wd_bwg_slideshow_title_text").html(stripslashes(data[key]["wdalt"]));
	
		  jQuery(".wd_bwg_slideshow_description_text").html(stripslashes(data[key]["wddescription"]));
			
			
		  var current_image_class = "#wd_image_id_" + data[current_key]["id"];
		
		  var next_image_class = "#wd_image_id_" + data[key]["id"];
		  wd_bwg_<?php echo $weddings_js_parameters["effect"];?>(current_image_class, next_image_class, direction);
		}
	
		
		//prpr
		jQuery('.wd_bwg_slideshow_title_text').removeClass('none');
		if(jQuery('.wd_bwg_slideshow_title_text').html()==""){jQuery('.wd_bwg_slideshow_title_text').addClass('none');}
		
		jQuery('.wd_bwg_slideshow_description_text').removeClass('none');
		if(jQuery('.wd_bwg_slideshow_description_text').html()==""){jQuery('.wd_bwg_slideshow_description_text').addClass('none');}
	}
	
	
	
		
     function wd_bwg_popup_resize() {
		
	   
		firstsize=1024;
		var bodyWidth=jQuery(window).width();
		var	parentWidth=jQuery(".wd_bwg_slideshow_image_wrap").parent().width();
		
		if(parentWidth>bodyWidth){parentWidth=bodyWidth;}
	     var kaificent_for_shoxq=(30/firstsize);
		 var str=(<?php echo $weddings_js_parameters["height"];?>/firstsize  );
	
	
           jQuery(".wd_bwg_slideshow_image_wrap").css({height: ((parentWidth) * str)});
		   jQuery(".slider_contener_for_exklusive").css('border-width',(kaificent_for_shoxq*parentWidth));
		 
		   jQuery(".wd_bwg_slideshow_image_wrap > div").css({height: ((parentWidth) * str)});
		   jQuery(".wd_bwg_slideshow_title_container > div").css({height: ((parentWidth) * str)});
						
			
          jQuery(".wd_bwg_slideshow_image_container").css({width: (parentWidth)});
          jQuery(".wd_bwg_slideshow_image_container").css({height: ((parentWidth) * str)});
          jQuery(".wd_bwg_slideshow_image").css({
			maxWidth: parentWidth,
            maxHeight: ((parentWidth) * str)
          });
       
          jQuery(".wd_bwg_slideshow_filmstrip_container").css({width: (parentWidth)});
          jQuery(".wd_bwg_slideshow_filmstrip").css({width: (parentWidth - 40)});
          jQuery(".wd_bwg_slideshow_dots_container").css({width: (parentWidth)});   
      }
	  
      
	  
      jQuery(document).ready(function () {
		wd_bwg_popup_resize();
		
		jQuery(window).resize(function() {
			wd_bwg_popup_resize();
		});
		
		
        var wd_bwg_click = jQuery.browser.mobile ? 'touchend' : 'click';
        // Set image container height.
        jQuery(".wd_bwg_slideshow_image_container").height(jQuery(".wd_bwg_slideshow_image_wrap").height() - 0);
        
        // Set filmstrip initial position.
        wd_bwg_set_filmstrip_pos(jQuery(".wd_bwg_slideshow_filmstrip").width());
        // Play/pause.
        
        function play() {
          // PLay.            
          wd_bwg_playInterval = setInterval(function () {
            var iterator = 1;
            if (0) {
              iterator = Math.floor((data.length - 1) * Math.random() + 1);
            }
			
            wd_bwg_change_image(parseInt(jQuery('#wd_bwg_current_image_key').val()), (parseInt(jQuery('#wd_bwg_current_image_key').val()) + iterator) % data.length, data)
          }, '<?php echo $weddings_js_parameters["pausetime"];?>');
		 
        }
		
		var hideslider="<?php echo $weddings_js_parameters["hideslider"];?>"; 
		
			var pausehover="<?php echo $weddings_js_parameters["pausehover"];?>";
			
			if(pausehover=="true"){
				jQuery("#wd_bwg_slideshow_image_container, .wd_bwg_slideshow_image_container").hover(function(){clearInterval(wd_bwg_playInterval);},function(){play();});
			}
		
		
        if (1) {
          play();
          jQuery(".wd_bwg_slideshow_play_pause").attr("title", "Pause");
          jQuery(".wd_bwg_slideshow_play_pause").attr("class", "wd_bwg_ctrl_btn wd_bwg_slideshow_play_pause fa fa-pause");
        }
		
      });

</script>
<?php
}
?>