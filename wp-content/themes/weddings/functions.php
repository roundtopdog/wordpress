<?php

/////////////////////// include admin



require_once('admin/main_admin_controler.php');
require_once('front_end/front_end_functions.php');



function weddings_setup() {

add_theme_support( 'custom-header', array(
	// Header image default
	'default-image'       => '',
	// Header text display default
	'header-text'         => false,
	'wp-head-callback'    => 'weddings_header_style',
	
) );

$weddings_defaults = array(
	'default-color'          => 'FFFFFF',
	'default-image'          => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $weddings_defaults );

	if(!get_theme_mod('background_color',false)){
		set_theme_mod('background_color','FFFFFF')	;
	}

	 load_theme_textdomain('weddings', get_template_directory() . '/languages' );
	 
	 add_editor_style();
	 
	//Enable post and comments RSS feed links to head

	add_theme_support('automatic-feed-links');

	// Enable post thumbnails

    add_theme_support('post-thumbnails', array('post'));

    set_post_thumbnail_size(150, 150); 
	 
	global $weddings_layout_page;
	foreach ($weddings_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id']) === FALSE) {

			$$value['var_name'] = $value['std'];
			} else {

			$$value['var_name'] = get_theme_mod($value['id']);
			}
		}

	}

	global $content_width;
	if ( !isset( $content_width  ) ) {
		$content_width  = $content_area;
	}
	add_theme_support( "title-tag" );
}

add_action( 'after_setup_theme', 'weddings_setup' );


function weddings_header_style(){
	$header_image = get_header_image();
	?>
	
	<style type="text/css">		
	<?php
	if ( ! empty( $header_image ) ) {
	?>.site-title {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			/*background-size: 1600px auto;*/
		}
		<?php
	}
	?>
	</style>
	
	<?php
}

add_action('wp_head', 'weddings_header');

function weddings_header(){
	global  $weddings_layout_page,		// leayut class varaible
		$weddings_typography_page,	// typagraphi class varaible
		$weddings_color_control_page;// color control class varaible
	foreach ($weddings_color_control_page->options_colorcontrol as $value) {
     $$value['var_name'] = $value['std']; 
	}	

	if ( is_singular() && get_theme_mod( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_get_post_tags('type=monthly&format=link');	

	$weddings_layout_page->update_layout_editor();
	$weddings_typography_page->print_fornt_end_style_typography();
	$weddings_color_control_page->update_color_control();

	weddings_favicon_img();
	weddings_custom_head();
	//weddings_custom_color();
	
	////////
	$menu_slug = 'primary-menu';
	 if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) && $locations[ $menu_slug ]!=0 ) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_slug ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	?>
	<script type="text/javascript">
	setTimeout(function(){
    <?php
	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $id = $menu_item->ID; ?>
		
       if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-item")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "<?php echo $selected_menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-parent")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-page-parent")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-ancestor")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		 
		
	<?php } ?>
	},500);
	</script>
	
<?php
 
}	
		
	////////
}



function weddings_entry_meta() {
    $categories_list = get_the_category_list(', ' );

	if ( $categories_list ) {
		echo '<span class="categories-links"><span class="sep">C.</span> ' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', ' , ' );
	
	if ( $tag_list ) {
		echo '<span class="tags-links"><span class="sep">T. </span>' . $tag_list . '</span>';
	}
}

function weddings_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>','weddings' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		get_the_author()
	);	
} 

function weddings_posted_on_blog() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">Posted on %4$s</time></a>','weddings' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		get_the_author()
	);	
}

function weddings_posted_on_single() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'weddings' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'weddings' ), get_the_author() ) ),
		get_the_author()
	);
}

function weddings_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next    = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<nav class="page-navigation">
			<?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title', 'Previous post link' ); ?>
			<?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>', 'Next post link'  ); ?>
		</nav>
	<?php
}

function weddings_widgets_init()
{

    // Area 1, located at the top of the sidebar.

    register_sidebar(array(
            'name' => __('Second Footer Widget Area', 'weddings'),
            'id' => 'sidebar-1',
            'description' => __('The primary widget area', 'weddings'),
            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',
            'after_widget' => '</div> ',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(
            'name' => __('Secondary Widget Area', 'weddings'),
            'id' => 'sidebar-2',
            'description' => __('The secondary widget area', 'weddings'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
	
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'weddings' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'weddings' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'weddings' ),
		'id' => 'primary-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'weddings' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
  
}



add_filter( 'wp_nav_menu_objects', 'weddings_add_menu_parent_class', 10);
function weddings_add_menu_parent_class( $items ) {
		
			$parents = array();
			foreach ( $items as $item ) {
				if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
					$parents[] = $item->menu_item_parent;
				}
			}
		
			foreach ( $items as $item ) {
				if ( in_array( $item->ID, $parents ) ) {
					$item->classes[] = 'haschild';
				}
			}
		
			return $items;
		}

//Register sidebars by running weddings_widgets_init() on the widgets_init hook.

add_action('widgets_init', 'weddings_widgets_init');

//Add support for WordPress 3.0's custom menus

add_action('init', 'weddings_register_menu');

//Register area for custom menu

function weddings_register_menu()
{

    register_nav_menu('primary-menu', __('Primary Menu','weddings'));

}
add_filter('nav_menu_css_class' , 'weddings_special_nav_class' , 10 , 2);
function weddings_special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function weddings_add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="menu-item', $output, 1);  
  $output = substr_replace($output, 'class="last menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}

add_filter('wp_nav_menu', 'weddings_add_first_and_last', 10);

function weddings_add_first_and_last_page_list($output) {
  $output = preg_replace('/class="page_item/', 'class="first page_item', $output, 1);  
  if(strripos($output, 'class="page_item'))
  $output = substr_replace($output, 'class="last page_item', strripos($output, 'class="page_item'), strlen('class="page_item'));
  return $output;
}

add_filter('wp_list_pages', 'weddings_add_first_and_last_page_list', 10);


if( !function_exists('weddings_the_excerpt_max_charlength')){
	function weddings_the_excerpt_max_charlength($charlength,$content=false) {
	if($content)
	{
		$excerpt=$content;
	}
	else
	{
		$excerpt = get_the_excerpt();
	}
		$charlength++;
	
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut ).'...';
			} else {
				echo $subex.'...';
			}
			
		} else {
			echo $excerpt;
		}
	}
}

function weddings_catch_that_image()
{

    global $post, $posts;

    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/', $post->post_content, $matches);
	if(isset($matches [1] [0])){	
    	$first_img = $matches [1] [0];
	}
    if (empty($first_img)) {

        //Defines a default image

        $first_img = get_template_directory_uri('template_url') . "/images/default.jpg";

    }

    return $first_img;
}


function weddings_first_image($width, $height,$url_or_img=0)
{
    $thumb = weddings_catch_that_image();
    if ($thumb) {

        $str = "<img src=\"";
        $str .= $thumb;

        $str .= '"';
        $str .= 'alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'" border="0" />';
        return $str;
    }
}

function weddings_empty_thumb()
{

    $thumb = get_post_custom_values("Image");

    return !empty($thumb);

}

function weddings_display_thumbnail($width, $height)
{
    if (has_post_thumbnail()) the_post_thumbnail(array($width, $height));

    elseif (!weddings_empty_thumb()) {
        return weddings_first_image($width, $height);
    } else {
        return the_post_thumbnail(array($width, $height));
    }
}

function weddings_thumbnail($width, $height)
{

    if (has_post_thumbnail())

        the_post_thumbnail(array($width, $height));

    elseif (weddings_empty_thumb()) {

        return the_post_thumbnail(array($width, $height));

    }
}



function weddings_remove_more_jump_link($link)
{

    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }

    return $link;

}

add_filter('the_content_more_link', 'weddings_remove_more_jump_link', 10);

function weddings_p2h_comment($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	
	switch ($comment->comment_type){
		case '' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-avatar"><?php echo get_avatar($comment, $size = '54'); ?></div>
		<div class="comment-body">
			<p class="comment-meta"><span
					class="comment-author"><?php comment_author_link(); ?></span><?php _e(' on ', 'weddings'); ?><?php comment_date() ?><?php _e(' at ', 'weddings'); ?><?php comment_time() ?>
				.</p>
			<?php if ($comment->comment_approved == '0') { ?>
				<p><strong><?php _e('Your comment is awaiting moderation.', 'weddings'); ?></strong></p>
			<?php } ?>
		
			<?php comment_text(); ?>
		
			<p class="comment-reply-meta"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
		</div>
		<?php
		break;
		
		case 'pingback'  :
		case 'trackback' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="post pingback">
		<p><?php _e('Pingback:', 'weddings'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'weddings'), ' '); ?></p>
		<?php
		break;
		
	}
}

///////////////////////////////////
///////////////////////////////////
//theme options end
///////////////////////////////////
///////////////////////////////////



function weddings_update_page_layout_meta_settings()
{
	
	global $weddings_layout_page, $post;
	foreach ($weddings_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id']) === FALSE) {
				
				$$value['var_name'] = $value['std'];
			} else {
				
				$$value['var_name'] = get_theme_mod($value['id']);
			}
		}

	}

    /*update page layout*/
  
	
	if(isset($post))
     $web_business_meta = get_post_meta($post->ID, '_weddings_meta', TRUE);

		
		if(!isset($web_business_meta['content_width']))
		$web_business_meta['content_width'] = $content_area;
		if(!isset($web_business_meta['main_col_width']))
		$web_business_meta['main_col_width'] = $main_column;
		if(!isset($web_business_meta['layout']))
		$web_business_meta['layout'] = $default_layout;
		if(!isset($web_business_meta['pr_widget_area_width']))
		$web_business_meta['pr_widget_area_width'] = $pwa_width;

	if (isset($web_business_meta['fullwidthpage']) && $web_business_meta['fullwidthpage']) {		
		$them_content_are_width='100%';
		?><script>var full_width_web_buisnes=1</script>
		  <style  type="text/css">
				     #footer-bottom{
						padding: 15px !important;
					}
		  </style><?php		
	}
	else {
			
		if(isset($web_business_meta['content_width']))
			$them_content_are_width=$web_business_meta['content_width'] . "px;";
		else
			$them_content_are_width=$content_area;
		
	}
    switch ($web_business_meta['layout']) {
        //set styles leauts
        case 1:
			?>
            <style type="text/css">
			#sidebar1,
			#sidebar2 {
				display:none;
			}
			#blog	{
				display:block; 
				margin: 0 auto;
				float: none;
			}      
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }          			 
            </style>
			<?php
            break;
        case 2:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:right;
			}
			#blog{
				display:block;
				float:left;
			} 
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }
            #blog{
				width:<?php echo esc_html($web_business_meta['main_col_width']); ?>%;
            }
            #sidebar1{
				width:<?php echo (100  - esc_html($web_business_meta['main_col_width'])); ?>%;
            }
            </style>
			<?php
            break;
        case 3:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }
            #blog{
				width:<?php echo esc_html($web_business_meta['main_col_width']); ?>%;
            }
            #sidebar1{
				width:<?php echo (100  - esc_html($web_business_meta['main_col_width'])); ?>%;
            }
            </style>
			<?php
            break;
        case 4:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
						border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block; float:right;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }
            #blog{
				width:<?php echo esc_html($web_business_meta['main_col_width']) ; ?>%;
            }
            #sidebar1{
				width:<?php echo esc_html($web_business_meta['pr_widget_area_width']); ?>%;
            }
            #sidebar2{
				width:<?php echo (100  - esc_html($web_business_meta['pr_widget_area_width']) - esc_html($web_business_meta['main_col_width'])); ?>%;
            }
            </style>
			 <?php
            break;
        case 5:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
				border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:left;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:right;
			}
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }
            #blog{
				width:<?php echo esc_html($web_business_meta['main_col_width']); ?>%;
            }
            #sidebar1{
				width:<?php echo esc_html($web_business_meta['pr_widget_area_width']); ?>%;
            }
            #sidebar2{
				width:<?php echo (100  - esc_html($web_business_meta['pr_widget_area_width']) - esc_html($web_business_meta['main_col_width'])); ?>%;
            }
            </style>
			<?php
            break;
        case 6:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
				border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block;
				float:left; 
			} 
			#blog{
				display:block;
				float:left;
			}    			       
            .container{
				width:<?php echo esc_html($them_content_are_width); ?>
            }
            #blog{
				width:<?php echo esc_html($web_business_meta['main_col_width']); ?>%;
            }
            #sidebar1{
				width:<?php echo esc_html($web_business_meta['pr_widget_area_width']); ?>%;
            }
            #sidebar2{
				width:<?php echo (100  - esc_html($web_business_meta['pr_widget_area_width']) - esc_html($web_business_meta['main_col_width'])); ?>%;
            }            
            </style><?php
            break;
    }
    /*update page layout end*/
}

/// include requerid scripts and styles


add_filter('wp_head','weddings_include_requerid_scripts_for_theme',1);

function weddings_include_requerid_scripts_for_theme(){
	wp_enqueue_script('jquery');	
	wp_enqueue_script('conect_js',get_template_directory_uri().'/scripts/conect_js.js');
	wp_enqueue_script('jquery-effects-transfer');
	wp_enqueue_style('weddings-nivo_slider',get_template_directory_uri().'/slideshow/style.css');
	wp_enqueue_script('weddings-custom_js',get_template_directory_uri().'/scripts/javascript.js');
	wp_enqueue_script('weddings-theme_responsive', get_template_directory_uri().'/scripts/responsive.js');
	wp_enqueue_style( 'weddings-style', get_stylesheet_uri(), array(), '2013-11-18' );

	if ( is_singular() && get_theme_mod( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
}



add_action( 'pre_get_posts', 'weddings_main_queries' );

function weddings_main_queries($query){
	if(is_home() && is_front_page() && $query->is_main_query()){

		global $weddings_home_page;
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
		//$cats = get_theme_mod('weddings_content_post_categories');		
        $cat_query="";
		$cat_checked="";
        $n_of_home_post=get_option( 'posts_per_page', 6 );
		$cat_query=substr($content_post_categories, 0, -1);
		$query->set( 'showposts', $n_of_home_post );
		$query->set( 'paged', get_query_var('paged'));
		$query->set( 'cat', $cat_query );
		$query->set( 'order', 'DESC' );
	}
}

function weddings_darkest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) - (hexdec( $color_part_1 )* $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  - (( ( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) - (( ( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	if(strlen($color_part_1)<2) $color_part_1="0".$color_part_1;
	if(strlen($color_part_2)<2) $color_part_2="0".$color_part_2;
	if(strlen($color_part_3)<2) $color_part_3="0".$color_part_3;

	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}

function weddings_ligthest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) + (( 255-( hexdec( $color_part_1 ) ) ) * $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  + (( 255-( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) + (( 255-( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}


function weddings_remove_last_comma($string=''){
	
	if(substr($string,-1)==',')
		return substr($string, 0, -1);
	else
		return $string;
	
}

add_filter('body_class', 'weddings_multisite_body_classes', 10);
function weddings_multisite_body_classes($classes){
	foreach($classes as $key=>$class)
	{
		if($class=='blog')
		$classes[$key]='blog_body';
	}
	return $classes;
	
}

function weddings_custom_head(){
	
global $weddings_general_settings_page;
foreach ($weddings_general_settings_page->options_generalsettings as $value) 
{
    if (get_theme_mod( $value['id'] ) === FALSE)
	{
		 $$value['var_name'] = $value['std']; 
	} else {
		 $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}	
?>

<script>
	var skzbi_hasce="<?php echo get_template_directory_uri(); ?>";
	$ = jQuery;
</script>
<?php

	echo "<style>".esc_html(stripslashes($custom_css))."</style>";
?>

<?php
	
	
}

function weddings_custom_color(){

global $weddings_color_control_page;

foreach ($weddings_color_control_page->options_colorcontrol as $value) {
     $$value['var_name'] = $value['std']; 
}
$background_color = get_background_color();
?>

<script type="text/javascript">
if(typeof(window.parent.weddings_menu_links_hover_color)=='undefined')
	var weddings_menu_links_hover_color='';
else
	var weddings_menu_links_hover_color=window.parent.weddings_menu_links_hover_color;
	
if(typeof(window.parent.weddings_menu_links_color)=='undefined')
	var weddings_menu_links_color='';
else
	var weddings_menu_links_color=window.parent.weddings_menu_links_color;

if(typeof(window.parent.weddings_link_color_stop)=='undefined')
	var weddings_link_color_stop='';
else
	var weddings_link_color_stop=window.parent.weddings_link_color_stop;
	
if(typeof(window.parent.weddings_logo_text_color)=='undefined')
	var weddings_logo_text_color='';
else
	var weddings_logo_text_color=window.parent.weddings_logo_text_color;	

if(typeof(window.parent.weddings_link_color_hover)=='undefined')
	var weddings_link_color_hover='';
else
	var weddings_link_color_hover=window.parent.weddings_link_color_hover;

if(typeof(window.parent.weddings_static_color)=='undefined')
	var weddings_static_color='';
else
	var weddings_static_color=window.parent.weddings_static_color;

if(typeof(window.parent.weddings_selected_menu_color)=='undefined')
	var weddings_selected_menu_color='';
else
	var weddings_selected_menu_color=window.parent.weddings_selected_menu_color;

if(typeof(window.parent.weddings_footer_back_color)=='undefined')
	var weddings_footer_back_color='';
else
	var weddings_footer_back_color=window.parent.weddings_footer_back_color;
	
if(typeof(window.parent.weddings_featured_posts_color)=='undefined')
	var weddings_featured_posts_color='';
else
	var weddings_featured_posts_color=window.parent.weddings_featured_posts_color;	

if(typeof(window.parent.weddings_sideb_background_color)=='undefined')
	var weddings_sideb_background_color='';
else
	var weddings_sideb_background_color=window.parent.weddings_sideb_background_color;
	
if(typeof(window.parent.weddings_top_posts_color)=='undefined')
	var weddings_top_posts_color='';
else
	var weddings_top_posts_color=window.parent.weddings_top_posts_color;	

if(typeof(window.parent.weddings_menu_hover_back_color)=='undefined')
	var weddings_menu_hover_back_color='';
else
	var weddings_menu_hover_back_color=window.parent.weddings_menu_hover_back_color;

if(typeof(window.parent.weddings_content_back_color)=='undefined')
	var weddings_content_back_color='';
else
	var weddings_content_back_color=window.parent.weddings_content_back_color;

if(typeof(window.parent.weddings_footer_sidebar)=='undefined')
	var weddings_footer_sidebar='';
else
	var weddings_footer_sidebar=window.parent.weddings_footer_sidebar;	
	
if(typeof(window.parent.weddings_primary_text_color)=='undefined')
	var weddings_primary_text_color='';
else
	var weddings_primary_text_color=window.parent.weddings_primary_text_color;

if(typeof(window.parent.weddings_text_headers_color)=='undefined')
	var weddings_text_headers_color='';
else
	var weddings_text_headers_color=window.parent.weddings_text_headers_color;

if(typeof(window.parent.weddings_footer_text_color)=='undefined')
	var weddings_footer_text_color='';
else
	var weddings_footer_text_color=window.parent.weddings_footer_text_color;

	if(typeof(window.parent.weddings_logo_text_color_for_phone)=='undefined')
	var weddings_logo_text_color_for_phone='';
else
	var weddings_logo_text_color_for_phone=window.parent.weddings_logo_text_color_for_phone;
	
function hex2rgb(hex) {
	if (hex[0]=="#") hex=hex.substr(1);
		if (hex.length==3) {
			var temp=hex; hex='';
			temp = /^([a-f0-9])([a-f0-9])([a-f0-9])$/i.exec(temp).slice(1);
			for (var i=0;i<3;i++) hex+=temp[i]+temp[i];
		}
		var triplets = /^([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})$/i.exec(hex).slice(1);
		return {
			red:   parseInt(triplets[0],16),
			green: parseInt(triplets[1],16),
			blue:  parseInt(triplets[2],16)
		}
	}
	
jQuery(document).ready(function() { 

jQuery(function(){	
    jQuery('#top-nav-list li:not(.top-nav-list .current-menu-item, #top-nav-list .activem, .phone .top-nav-list .current_page_item), .top-nav-list li:not( .top-nav-list .current-menu-item, .top-nav-list .active, .phone .top-nav-list .current_page_item)').hover(
	<?php
$menucolor=str_replace('#','',$selected_menu_color);
$menubg_color='rgba('.hexdec(substr($menucolor, 0, 2)).','.hexdec(substr($menucolor, 2, 2)).','.hexdec(substr($menucolor, 4, 2)).',0.4'.')'; ?>
       function(){	
            if(weddings_menu_hover_back_color == ""){
				jQuery(this).css('background-color','<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>');
			}
            else{
				var anyString = weddings_menu_hover_back_color;
				var hex = weddings_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css('background-color', hextorgb);						
			}	   
		}, 
	   function(){
			if(weddings_static_color == ""){
				jQuery(this).css('background-color', 'transparent');
			}
			else{						
				jQuery(this).css('background-color', weddings_static_color);
			}
		}	
    );
	
	 jQuery('.phone #top-nav-list li:not(.top-nav-list .current-menu-item, .phone #top-nav-list .active, .phone .top-nav-list .current_page_item), .phone .top-nav-list li:not( .top-nav-list .current-menu-item, .top-nav-list .active, .phone .top-nav-list .current_page_item)').hover(
	<?php
$menucolor1=str_replace('#','',$selected_menu_color);
$menubg_color1='rgba('.hexdec(substr($menucolor1, 0, 2)).','.hexdec(substr($menucolor1, 2, 2)).','.hexdec(substr($menucolor1, 4, 2)).',0.4'.')'; ?>
       function(){	
            if(weddings_menu_hover_back_color == ""){
				jQuery(this).attr('style', 'background-color: <?php if($menubg_color1){ echo $menubg_color1; } else { echo "#044967"; } ?> !important');
			}
            else{
				var anyString = weddings_menu_hover_back_color;
				var hex = weddings_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css('background-color', hextorgb);						
			}	   
		}, 
	   function(){
				jQuery(this).attr('style', 'background-color: <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
			if(weddings_static_color == ""){
			}
			else{						
				jQuery(this).css('background-color', weddings_static_color);
			}
		}	
    );
	
	if(weddings_content_back_color == ''){	 
	     jQuery( '#sidebar3 .sidebar-container, #sidebar4, #sidebar4 .sidebar-container' ).css('background-color','<?php if($content_back_color){ echo $content_back_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '#sidebar3 .sidebar-container, #sidebar4, #sidebar4 .sidebar-container' ).css('background-color',weddings_content_back_color );	
    }
	
	if(weddings_footer_sidebar == ''){	 
	     jQuery( '#sidebar4, #sidebar4 .sidebar-container' ).css('background-color','<?php if($footer_sidebar){ echo $footer_sidebar; } else { echo "#f8f8f8"; } ?>' );
    } else {	
	    jQuery( '#sidebar4, #sidebar4 .sidebar-container' ).css('background-color',weddings_footer_sidebar );	
    }
	
    jQuery('#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a').hover(
		function(){
		<?php 
		$menucolor=str_replace('#','',$selected_menu_color);
		$menubg_color='rgba('.hexdec(substr($menucolor, 0, 2)).','.hexdec(substr($menucolor, 2, 2)).','.hexdec(substr($menucolor, 4, 2)).',0.4'.')'; ?>
			if(weddings_menu_hover_back_color == '')
				jQuery(this).css( "background-color", "<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>");
			else{
				var anyString = weddings_menu_hover_back_color;
				var hex = weddings_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css( "background-color", weddings_menu_hover_back_color);
				}
			if(weddings_menu_links_hover_color == '')
				jQuery(this).css( "color", "<?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?>");
			else
				jQuery(this).css( "color", weddings_menu_links_hover_color);	
        }, 
		function(){
		<?php 
			$selectedmenucoloro=str_replace('#','',$selected_menu_color);
	$selmenubg_coloro='rgba('.hexdec(substr($selectedmenucoloro, 0, 2)).','.hexdec(substr($selectedmenucoloro, 2, 2)).','.hexdec(substr($selectedmenucoloro, 4, 2)).',0.4'.')';	?>
			if(weddings_selected_menu_color == "")
				jQuery(this).css( "background-color", "<?php if($selmenubg_coloro){ echo $selmenubg_coloro; } else { echo "#044967"; } ?>");
			else
				jQuery(this).css( "background-color", weddings_selected_menu_color);
			if(weddings_menu_links_hover_color == '')
				jQuery(this).css( "color", "<?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?>");
			else
				jQuery(this).css( "color", weddings_menu_links_hover_color);	
		}
	);
    jQuery('a:not(#top-nav-list a):not(.site-title-a):not(.top-nav-list a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a)').hover(
      function(){
			if(weddings_link_color_hover == '')
				jQuery(this).css('color', '<?php if($primary_links_hover_color){ echo $primary_links_hover_color; } else { echo "#000000"; } ?>');
			else
				jQuery(this).css( 'color', weddings_link_color_hover );
        }, 
		function(){
			if(weddings_link_color_stop == '')
				jQuery(this).css('color', '<?php if($primary_links_color){ echo $primary_links_color; } else { echo "#000000"; } ?>');
			else
				jQuery(this).css( 'color', weddings_link_color_stop);
		}
    );
	if(weddings_link_color_stop == ''){	 
	     jQuery( 'a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a), .gallery_cat, .test_cat, .blog h3' ).css('color','<?php if($primary_links_color){ echo $primary_links_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( 'a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a), .gallery_cat, .test_cat, .blog h3' ).css('color',weddings_link_color_stop );	
    }
	
	if(weddings_selected_menu_color == ''){	 
	<?php
	$selectedmenucolor=str_replace('#','',$selected_menu_color);
	$selmenubg_color='rgba('.hexdec(substr($selectedmenucolor, 0, 2)).','.hexdec(substr($selectedmenucolor, 2, 2)).','.hexdec(substr($selectedmenucolor, 4, 2)).',0.4'.')';  ?>
	     jQuery( '.top-nav-list .current-menu-item,.top-nav-list li.current_page_item, .top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active' ).css('background-color','<?php if($selmenubg_color){ echo $selmenubg_color; } else { echo "#044A9F"; } ?>' );
		 jQuery( '.sep' ).css('color','<?php if($selmenubg_color){ echo $selmenubg_color; } else { echo "#044A9F"; } ?>' );
		
    } else {
		var anyString = weddings_selected_menu_color;
		var hex = weddings_selected_menu_color;
		var rgb = hex2rgb(hex);
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '.top-nav-list .current-menu-item,.top-nav-list li.current_page_item, .top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active' ).css('background-color',hextorgba );	
    }
    if(weddings_footer_back_color == ''){	 
	     jQuery( '#footer, .device' ).css('background-color','<?php if($footer_back_color){ echo $footer_back_color; } else { echo "#E3E2E2"; } ?>' );
    } else {	
	    jQuery( '#footer, .device' ).css('background-color',weddings_footer_back_color );	
    }
    
    if(weddings_primary_text_color == ''){	 
	     jQuery( '#wrapper, #content, #sidebar3 p, #sidebar4 p, .blog p, .blog span, .sep' ).css('color','<?php if($primary_text_color){ echo $primary_text_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '#wrapper, #content, #sidebar3 p, #sidebar4 p, .blog p, #top-posts span, .sep' ).css('color',weddings_primary_text_color );	
    } 
    if(weddings_static_color == ''){	 
		<?php  $color=str_replace('#','',$menu_elem_back_color);
	    $bg_color='rgba('.hexdec(substr($color, 0, 2)).','.hexdec(substr($color, 2, 2)).','.hexdec(substr($color, 4, 2)).',0.4'.')'; ?>
	     jQuery( '#top-nav-list>li>ul, #top-nav, .read_more' ).css('background-color','<?php if($bg_color){ echo $bg_color; } else { echo "#091F3C"; } ?>' );
		 
    } else {	
		var anyString = weddings_static_color;
		var hex = weddings_static_color;
		var rgb = hex2rgb(hex);
		var hextorgb = "rgb("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";	
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '#top-nav-list>li>ul, #top-nav, .read_more' ).css('background-color',hextorgba );	
		
    }	
	if(weddings_text_headers_color == ''){
		 var slider_dir = jQuery('#top-nav').height();	
	     jQuery( 'h1, h2:not(.blog h2), h3:not(#top-posts-list h3):not(.widget-area h3):not(.blog h3), h4, h5, h6, .blog_wel h2 > a,#sidebar3, #sidebar4' ).css('color','<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' );
		 jQuery("#ccc").html("h1, h2, h3, h4, h5, h6{color:<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>;}");
		 jQuery('#top-nav-list > li ul  li').attr('style', 'border-bottom: 1px solid #<?php echo weddings_darkest_brigths($text_headers_color,10); ?>');
		 jQuery( '#top-nav-list > li ul' ).attr('style', 'border-bottom: 2px solid #<?php echo weddings_darkest_brigths($text_headers_color,10); ?>');
		 jQuery(".web #slideshow, .tablet #slideshow").attr("style","border-bottom: 1px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>; margin-top: -"+slider_dir+ "px");
		 jQuery( '.widget-area ul li' ).css('color', '<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' );
		 jQuery( 'h1 a, h2 a, h3 a:not(#top-posts-list h3 a):not(h3 a), h4 a:not(h4 a), h5 a, h6 a' ).css('color','<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' ); 
		 jQuery( '.sub-menu, .contact_send' ).attr('style','background-color: <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		 jQuery('#top-nav-list > li > a:hover, #top-nav-list > li.active > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		
		 jQuery("#top-nav-list > li.active > a").attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");
		 jQuery("#top-nav-list ul li > a").attr("style","border-top: 3px solid transparent !important");
		 jQuery('#top-nav-list > li.current_page_item > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		 jQuery("#top-nav-list > li.current_page_item > a").hover(function(){
		 jQuery(this).attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");				
			},function(){
		 jQuery(this).attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");
			  });				
			jQuery('.top-nav-list > li.current_page_item > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
			
			jQuery( '.blog_test img' ).attr('style', 'border-bottom: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
    } else {
		var slider_dir = jQuery('#top-nav').height();
		setTimeout(function() {
		jQuery("#top-nav-list > li.current_page_item > a, #top-nav-list > li.current-menu-ancestor > a").attr("style","border-top: 3px solid "+weddings_text_headers_color+" !important");
		jQuery( '.web #slideshow, .tablet #slideshow' ).attr('style', 'border-bottom: 1px solid '+weddings_text_headers_color+'; margin-top: -'+slider_dir+ 'px');
		},100);
		jQuery('#top-nav-list > li ul  li').attr('style', 'border-bottom: 1px solid '+weddings_text_headers_color);
		jQuery( '.widget-area ul li' ).css('color', weddings_text_headers_color );
		jQuery( '#top-nav-list > li ul' ).attr('style', 'border-bottom: 2px solid '+weddings_text_headers_color);
		jQuery( 'h1, h2:not(.blog h2), h3:not(#top-posts-list h3):not(.widget-area h3).blog h3, h4, h5, h6, #sidebar3, #sidebar4' ).css('color',weddings_text_headers_color );	
		jQuery("#ccc").html("h1, h2, h3, h4, h5, h6{color:"+weddings_text_headers_color+";}");	
		jQuery( '.sub-menu, .contact_send' ).attr('style','background-color:'+ weddings_text_headers_color +' !important');
		jQuery( 'h1 a, h2 a, h3 a:not(#top-posts-list h3 a):not(h3 a), h4 a:not(h4 a), h5 a, h6 a' ).css('color',weddings_text_headers_color );	
		jQuery('#top-nav-list > li > a:hover').attr('style', 'border-top: 3px solid '+weddings_text_headers_color+' !important');
		jQuery("#top-nav-list > li a").hover(function(){
			jQuery(this).attr("style","border-top: 3px solid "+weddings_text_headers_color+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid transparent !important");
			  });
		jQuery("#top-nav-list > li.active > a").attr("style","border-top: 3px solid "+weddings_text_headers_color+" !important");
		jQuery("#top-nav-list ul li > a").attr("style","border-top: 3px solid transparent !important");				
		jQuery("#top-nav-list > li.current_page_item > a").hover(function(){
		jQuery(this).attr("style","border-top: 3px solid "+weddings_text_headers_color+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid "+weddings_text_headers_color+" !important");
			  });				 
		jQuery( '.blog_test img' ).attr('style', 'border-bottom: 3px solid '+weddings_text_headers_color+' !important');
    } 
	if(weddings_footer_text_color == ''){	 
	     jQuery( '.device, #footer' ).css('color','<?php if($footer_text_color){ echo $footer_text_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '.device, #footer' ).css('color',weddings_footer_text_color );	
    }

	if(weddings_top_posts_color == ''){	 
	     jQuery( '.top-posts-texts' ).css('background-color','<?php if($top_posts_color){ echo $top_posts_color; } else { echo "#012331"; } ?>' );
    } else {	
	    jQuery( '.top-posts-texts' ).css('background-color',weddings_top_posts_color );	
    }
	if(weddings_sideb_background_color == ''){	 
	     jQuery( '#sidebar1 .sidebar-container, #sidebar2 .sidebar-container, .commentlist li' ).css('background-color','<?php if($sideb_background_color){ echo $sideb_background_color; } else { echo "#ffffff"; } ?>' );
    } else {	
	    jQuery( '#sidebar1 .sidebar-container, #sidebar2 .sidebar-container, .commentlist li' ).css('background-color',weddings_sideb_background_color );	
    }
	if(weddings_menu_hover_back_color == ''){			
	     jQuery( '.get_title, #menu-button-block' ).css('background-color','<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>' );
    } else {
		var anyString = weddings_menu_hover_back_color;
		var hex = weddings_menu_hover_back_color;
		var rgb = hex2rgb(hex);
		var hextorgb = "rgb("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";	
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '.get_title, #menu-button-block' ).css('background-color',hextorgba );	
    }

	if(weddings_logo_text_color == ''){	 
	     jQuery( '.site-title-a, .styledHeading' ).css('color','<?php if($logo_text_color){ echo $logo_text_color; } else { echo "#ffffff"; } ?>' );
    } else {	
	    jQuery( '.site-title-a, .styledHeading' ).css('color',weddings_logo_text_color );	
    } 
	
	if(weddings_menu_links_hover_color == ''){	 
	     jQuery( '#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .read_more, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a' ).attr('style', 'color: <?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?> !important' );
    } else {	
	    jQuery( '#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .read_more, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a' ).attr('style', 'color: ' +weddings_menu_links_hover_color+ ' !important' );	
    }
	if(weddings_menu_links_color == ""){	 
	     jQuery( "#top-nav-list li a:not(#top-nav-list .current-menu-item a, #top-nav-list .active), .top-nav-list li a:not(.top-nav-list .current-menu-item a, .top-nav-list .active)" ).css("color","<?php if($menu_links_color){ echo $menu_links_color; } else { echo "#ffffff"; } ?>" );
    } else {	
	    jQuery( "#top-nav-list li a:not(#top-nav-list .current-menu-item a, #top-nav-list .active), .top-nav-list li a:not(.top-nav-list .current-menu-item a, .top-nav-list .active)" ).css("color",weddings_menu_links_color );	
    }  
});
});
</script>
<style id="ccc" type="text/css">
</style>
<?php
}


function weddings_do_nothing($parametr=null){return $parametr;}
?>