<?php
class weddings_color_control_page_class{
	public $colorcontrol;
	public $shortcolorcontrol;
	public $options_colorcontrol;
	
	function __construct(){
		global $weddings_special_id_for_db;
		add_action( 'customize_preview_init', array($this,'web_bussines_customize_preview_js') );
		
		$this->colorcontrol = "Color Control";
		$this->shortcolorcontrol = $weddings_special_id_for_db."cc";
		
		$value_of_std[0]=get_theme_mod($this->shortcolorcontrol."_menu_elem_back_color",'#f0f0f0');
		$value_of_std[2]=get_theme_mod($this->shortcolorcontrol."_sideb_background_color",'#ffffff');
		$value_of_std[3]=get_theme_mod($this->shortcolorcontrol."_footer_back_color",'#ececec');
		$value_of_std[5]=get_theme_mod($this->shortcolorcontrol."_top_posts_color",'#FCFCFC');
		$value_of_std[6]=get_theme_mod($this->shortcolorcontrol."_text_headers_color",'#CCEA03');
		$value_of_std[7]=get_theme_mod($this->shortcolorcontrol."_primary_text_color",'#464646');
		$value_of_std[8]=get_theme_mod($this->shortcolorcontrol."_footer_text_color",'#000000');
		$value_of_std[9]=get_theme_mod($this->shortcolorcontrol."_primary_links_color",'#464646');
		$value_of_std[10]=get_theme_mod($this->shortcolorcontrol."_primary_links_hover_color",'#464646');
		$value_of_std[11]=get_theme_mod($this->shortcolorcontrol."_menu_links_color",'#464646');
		$value_of_std[12]=get_theme_mod($this->shortcolorcontrol."_menu_links_hover_color",'#464646');		
		$value_of_std[13]=get_theme_mod($this->shortcolorcontrol."_menu_color",'#ffffff');
		$value_of_std[14]=get_theme_mod($this->shortcolorcontrol."_selected_menu_color",'#ffffff');
		$value_of_std[15]=get_theme_mod($this->shortcolorcontrol."_color_scheme",'#E0E0E0');	
		$value_of_std[16]=get_theme_mod($this->shortcolorcontrol."_logo_text_color",'#CCEA03');
		$value_of_std[17]=get_theme_mod($this->shortcolorcontrol."_content_back_color",'#ffffff');
		$value_of_std[18]=get_theme_mod($this->shortcolorcontrol."_footer_sidebar",'#f8f8f8');	

		
		$this->options_colorcontrol = array(
		  
		  "menu_elem_back_color" => array(
			
				"name" => "Menu Items Background Color",
				
				"desc" => "",
				
				"var_name" =>'menu_elem_back_color',

				"id" => $this->shortcolorcontrol . "_menu_elem_back_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[0]
			), 	
			
			"content_back_color" =>  array(

				"name" => "Footer Primary Sidebar Bg Color",

				"desc" => "",
				
				"var_name" =>'content_back_color',

				"id" => $this->shortcolorcontrol . "_content_back_color",

				"type" => "picker",

				"std" => $value_of_std[17]
				
			),	
			
			"footer_sidebar" =>  array(

				"name" => "Footer Secondary Sidebar Bg Color",

				"desc" => "",
				
				"var_name" =>'footer_sidebar',

				"id" => $this->shortcolorcontrol . "_footer_sidebar",

				"type" => "picker",

				"std" => $value_of_std[18]
				
			),	
			
			 "sideb_background_color" =>  array(
			
				"name" => "Sidebar Background Color",
				
				"desc" => "",
				
				"var_name" =>'sideb_background_color',

				"id" => $this->shortcolorcontrol . "_sideb_background_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[2]
			),	

			 "footer_back_color" =>  array(

				"name" => "Footer Background Color",

				"desc" => "",
				
				"var_name" =>'footer_back_color',

				"id" => $this->shortcolorcontrol . "_footer_back_color",

				"type" => "picker",

				"std" => $value_of_std[3]
				),
	
			"top_posts_color" =>  array(

				"name" => "Top Posts Background Color",

				"desc" => "",
				
				"var_name" =>'top_posts_color',

				"id" => $this->shortcolorcontrol . "_top_posts_color",

				"type" => "picker",

				"std" => $value_of_std[5]
				),	
				
			"text_headers_color" =>  array(

				"name" => "Lineup and Submenu background",

				"desc" => "",
				
				"var_name" =>'text_headers_color',

				"id" => $this->shortcolorcontrol . "_text_headers_color",

				"type" => "picker",

				"std" => $value_of_std[6]
			),	

			"primary_text_color" =>  array(

				"name" => "Primary Text Color",

				"desc" => "",
				
				"var_name" =>'primary_text_color',

				"id" => $this->shortcolorcontrol . "_primary_text_color",

				"type" => "picker",

				"std" => $value_of_std[7]
			),
			
			"footer_text_color" =>  array(

				"name" => "Footer Text Color",

				"desc" => "",
				
				"var_name" =>'footer_text_color',

				"id" => $this->shortcolorcontrol . "_footer_text_color",

				"type" => "picker",

				"std" => $value_of_std[8]
			),

			"primary_links_color" =>  array(

				"name" => "Primary Links",

				"desc" => "",
				
				"var_name" =>'primary_links_color',

				"id" => $this->shortcolorcontrol . "_primary_links_color",

				"type" => "picker",

				"std" => $value_of_std[9]
			),

			"primary_links_hover_color" =>  array(

				"name" => "Primary Links Hover",

				"desc" => "",
				
				"var_name" =>'primary_links_hover_color',

				"id" => $this->shortcolorcontrol . "_primary_links_hover_color",

				"type" => "picker",

				"std" => $value_of_std[10]
			),

			"menu_links_color" =>  array(

				"name" => "Menu Links",

				"desc" => "",
				
				"var_name" =>'menu_links_color',

				"id" => $this->shortcolorcontrol . "_menu_links_color",

				"type" => "picker",

				"std" => $value_of_std[11]
			),

			"menu_links_hover_color" =>  array(

				"name" => "Menu Links Hover",

				"desc" => "",
				
				"var_name" =>'menu_links_hover_color',

				"id" => $this->shortcolorcontrol . "_menu_links_hover_color",

				"type" => "picker",

				"std" => $value_of_std[12]
			),			
		
			 "menu_color" =>  array(

				"name" => "Hover Menu Item",

				"desc" => "",
				
				"var_name" =>'menu_color',

				"id" => $this->shortcolorcontrol . "_menu_color",

				"type" => "picker",

				"std" => $value_of_std[13]
			),
			
			"selected_menu_color" =>  array(

				"name" => "Selected Menu Item",

				"desc" => "",
				
				"var_name" =>'selected_menu_color',

				"id" => $this->shortcolorcontrol . "_selected_menu_color",

				"type" => "picker",

				"std" => $value_of_std[14]
			),

			"color_scheme" =>  array(
			
				"name" => " ",
				
				"var_name" =>'color_scheme',

				"id" => $this->shortcolorcontrol . "_color_scheme",
				
				"type" => "",
				
				"std" => $value_of_std[15]
			),
			
			"logo_text_color" =>  array(
			
				"name" => "Logo Text Color ",
				
				"desc" => "",
				
				"var_name" =>'logo_text_color',

				"id" => $this->shortcolorcontrol . "_logo_text_color",
				
				"type" => "picker",
				
				"std" => $value_of_std[16]
			)		
		);
	}
	
	public function web_bussines_customize_preview_js() {
	 	wp_enqueue_script( 'web_bussines-customizer', get_template_directory_uri() . '/scripts/theme-customizer.js', array( 'customize-preview' ) );
	}
	
	/* save changes or reset options */
	public function web_dorado_theme_update_and_get_options_color_control(){	
		if ( isset($_GET['page']) && $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "color_control_page") {
			if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' ) {
				foreach ($this->options_colorcontrol as $value) {
					set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
				}
				foreach ($this->options_colorcontrol as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
					} 
					else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=color_control_page&saved=true");
				die;
			} 
			else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
				foreach ($this->options_colorcontrol as $value) {
					remove_theme_mod($value['id']);
				}
				header("Location: themes.php?page=web_dorado_theme&controller=color_control_page&reset=true");
				die;
			}
		}	
	}
	
	public function web_dorado_color_control_page_admin_scripts(){
		wp_enqueue_style('color_control_page_main_style',get_template_directory_uri('template_directory').'/admin/css/color_control.css');	
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style( 'wp-color-picker' );
	}
	
	public function update_color_control(){
		/* for update global options */
		global $weddings_color_control_page;
		global $weddings_home_page;

		foreach ($weddings_home_page->options_homepage as $value){
			if(isset($value['id'])){
				if (get_theme_mod( $value['id'] ) === FALSE){ 
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
		$background_color = get_background_color();
		$background_image=get_background_image();
		$selected_menu = str_replace('#','',$selected_menu_color);
		$selected_menu_bgcolor='rgba('.HEXDEC(SUBSTR($selected_menu, 0, 2)).','.HEXDEC(SUBSTR($selected_menu, 2, 2)).','.HEXDEC(SUBSTR($selected_menu, 4, 2)).',0.4'.')';

		$selmenucolor = str_replace('#','',$menu_color);
		$selectedmenu_bgcolor='rgba('.HEXDEC(SUBSTR($selmenucolor, 0, 2)).','.HEXDEC(SUBSTR($selmenucolor, 2, 2)).','.HEXDEC(SUBSTR($selmenucolor, 4, 2)).',0.4'.')';
		?>
<style type="text/css">

h1, h2, h3, h4, h5, h6, h1>a, h2>a, h3>a, h4>a, h5>a, h6>a,h1 > a:link, h2 > a:link, h3 > a:link, h4 > a:link, h5 > a:link, h6 > a:link,h1 > a:hover,h2 > a:hover,h3 > a:hover,h4 > a:hover,h5 > a:hover,h6 > a:hover,h61> a:visited,h2 > a:visited,h3 > a:visited,h4 > a:visited,h5 > a:visited,h6 > a:visited,#sidebar1 li, #sidebar2 li,#sidebar3 li,#sidebar4 li{
    color:<?php echo $text_headers_color; ?>;
}

.widget-area h3{
	color: <?php echo $primary_links_color; ?>;
}

#back h3 a{
	color: <?php echo '#'.$this->negativeColor(weddings_ligthest_brigths($menu_elem_back_color, 10)); ?> !important;
}
a:link.site-title-a,a:hover.site-title-a,a:visited.site-title-a,a.site-title-a{
	color:<?php echo $logo_text_color;?>;
}

a.read_more:visited,a.read_more:link,.read_more, .more-link, .reply {
     color:<?php echo $menu_links_color; ?> !important;
}
.commentlist li {
	background-color:<?php echo $sideb_background_color; ?>;
}
.children .comment{
	background-color:#<?php echo weddings_ligthest_brigths($sideb_background_color,37); ?>;
}

.comment-body .reply a,
#cancel-comment-reply-link{
	background-color: #<?php echo weddings_darkest_brigths($text_headers_color,10); ?>;
}

.children li{
	border-left: 3px solid #E0E0E0;
}

.commentlist > li.parent > div{
	border-left: 3px solid #<?php echo weddings_darkest_brigths($text_headers_color,10); ?>;
}

cite{
	color: #<?php echo weddings_darkest_brigths($text_headers_color,20); ?> !important;
}

.contact_send,
.log-out {
	background:<?php echo $text_headers_color; ?>;
}

.reply a, .more-link{ 
	color:<?php echo $selected_menu_color;?> !important;
	font-weight: 600;
}

.read_more:hover, a.read_more:hover, .more-link:hover {
    color:<?php echo '#'.weddings_ligthest_brigths($menu_links_color,50); ?> !important;
    background-color: <?php echo '#'.weddings_ligthest_brigths($menu_elem_back_color,15); ?>;
}

#back {
    background-color: <?php echo '#'.weddings_ligthest_brigths($menu_elem_back_color, 10); ?>;
}

.widget-area .sidebar-container > div h3{
	color: <?php echo $primary_links_color; ?>;
	border-bottom: 2px solid  <?php echo $footer_back_color;?>;
	font-weight: 600;
}

#sidebar4, #sidebar4 .sidebar-container{
	background-color: <?php echo $footer_sidebar; ?>;
}

.blog_test img{
	border-bottom: 3px solid <?php echo $text_headers_color; ?>;
}

#header-block{
	background-color:<?php echo $menu_color; ?>;
}

.container.device.phone,
#footer{
	background-color:<?php echo $footer_back_color; ?>;
}

.topPost {
    background-image: url(<?php echo get_template_directory_uri('template_url'); ?>/images/topPost-back<?php if($color_scheme == "Theme-1") echo "1"; elseif($color_scheme == "Theme-2") echo "2"; elseif($color_scheme == "Theme-3") echo "3"; else echo "1"; ?>.png);
}

#menu-button-block {
    background: url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu.button<?php if($color_scheme == "Theme-1") echo "1"; elseif($color_scheme == "Theme-2") echo "2"; elseif($color_scheme == "Theme-3") echo "3"; elseif($color_scheme == "Theme-4") echo "4"; elseif($color_scheme == "Theme-5") echo "5"; else echo "1"; ?>.png) <?php echo $selectedmenu_bgcolor; ?> right no-repeat;
}

#top-nav-list  > li.haschild:hover,#top-nav-list  > li.haschild:focus,#top-nav-list  > li.haschild:active{
	background:url(<?php echo get_template_directory_uri('template_url') ?>/images/arrow.down<?php if($color_scheme == "Theme-1") echo "1"; elseif($color_scheme == "Theme-2") echo "2"; elseif($color_scheme == "Theme-3") echo "3"; elseif($color_scheme == "Theme-4") echo "4"; elseif($color_scheme == "Theme-5") echo "5"; else echo "1"; ?>.png) bottom no-repeat;	
}

.content {
    background-color: #<?php echo $background_color; ?>;
}

.container.device,
#footer {
    background-color: <?php echo $footer_back_color; ?>;
}

body{
	color: <?php echo $primary_text_color; ?> !important;
}

#wrapper{
    color: <?php echo $primary_text_color; ?>;
}

.container.device,
#footer {
    color: <?php echo $footer_text_color; ?>;
}

a:link, a:visited {
    text-decoration: none;
    color: <?php echo $primary_links_color; ?>;
}

 .top-nav-list .current-menu-item, 
 .top-nav-list .current_page_item{
    color: <?php echo $menu_links_hover_color; ?> !important;
	background-color: <?php echo  $selected_menu_color; ?>;
}

a:hover {color: <?php echo $primary_links_hover_color; ?>; }

.sep { color: #BDBDBD;}

.get_title{
	background-color:<?php echo $menu_color; ?>;
	background-image:url(<?php echo get_template_directory_uri( 'template_url' ); ?>/images/Shado.png);
	background-position: bottom;
	background-repeat: no-repeat;
}

.phone #top-nav-list > li{
	background-color: <?php echo $text_headers_color; ?> !important;
	border-left: 10px solid #<?php echo weddings_ligthest_brigths($menu_color,40); ?>;
}

#top-nav-list  > li > a:hover,#top-nav-list > li > a:focus,.top-nav-list li.active > a,
#top-nav-list > li.active > a,
#top-nav-list li.current-menu-item > a, #top-nav-list li.current_page_item > a,
#top-nav > div li.current-menu-item > a, #top-nav > div li.current_page_item > a,
.top-nav-list  > ul > li > a:hover,
.phone .top-nav-list .current-page-parent,
.top-nav-list li.current-menu-parent > a,
#top-nav-list > li.current-menu-ancestor > a{
	border-top: 3px solid <?php echo $text_headers_color; ?> !important;
}

#top-nav{
	background-color: rgba(240, 240, 240, 0.4);
}

.phone .top-nav-list li.active > a{
	border-top: 0px !important;
}

#top-nav-list > li ul{
	border-top: 2px solid <?php echo $text_headers_color; ?>;
}

.sub-menu,.top-nav-list > ul > li ul{
	background-color: <?php echo $text_headers_color; ?> !important;
}

.children li:first-child > a{
	border-top:none !important;
}

.phone #top-nav-list > li > a, .phone #top-nav-list > li > a:link, .phone #top-nav-list > li > a:visited{
	border-left: 2px solid <?php echo $menu_color; ?>;
}

.top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover{
    background-color: <?php echo $selectedmenu_bgcolor; ?>;
}

.top-nav-list li:hover {
    background-color: <?php echo $selected_menu_bgcolor; ?>;
}

.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item, .top-nav-list.phone li.current-menu-item, .top-nav-list.phone li.current_page_item, .top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active,  .top-nav-list.phone  li.current-menu-item > a:hover,   .top-nav-list.phone  li.current-menu-item:hover{
    color:<?php echo $menu_links_hover_color ?> !important;
	background: url(<?php echo get_template_directory_uri( 'template_url' ); ?>/images/line.png) right no-repeat <?php echo $selected_menu_bgcolor; ?> ;
}

.top-nav-list  > li  > a, .top-nav-list  > ul > li  > a:link, .top-nav-list  > ul > li  > a:visited{
	border-top: 3px solid transparent;
}

.top-nav-list  > li:active  > a{
	border-top: 3px solid <?php echo $menu_color; ?> !important;
}

.top-nav-list li.current-menu-item > a, .top-nav-list li.current_page_item > a{
	color: <?php echo $menu_links_hover_color; ?>;
}

.container.top-posts.phone{
	background-color:#<?php echo $background_color; ?> !important;
}

.phone .header-phone-block{
	background-color:#<?php echo $background_color; ?> !important;
}
<?php
 $hide_slider = get_theme_mod('ct_hide_slider');
 if($hide_slider){ ?>
#top-nav {
   background:<?php echo $menu_elem_back_color; ?> !important;
}
<?php } ?>
#reply-title small a:link, .top-nav-list li a{
   color:<?php echo $menu_links_color; ?>;	
}

#commentform #submit{
	    background-color: #<?php echo weddings_darkest_brigths($text_headers_color,20); ?>;
		color:#FFF !important;
}

#log_in div .read_more{
	    background-color: <?php echo $text_headers_color; ?>;
		color:#FFF !important;
}

#top-nav-list > li ul  li{
		border-bottom: 1px solid #<?php echo weddings_darkest_brigths($text_headers_color,10); ?> ;
}

#top-nav-list > li ul  li:last-child{
		border-bottom: transparent !important;
}

#top-nav-list > li ul{
	background:<?php echo $this->hex_to_rgba($menu_elem_back_color,0.6); ?>;
	border-bottom:2px solid #<?php echo weddings_ligthest_brigths($selected_menu_color,30); ?>;
	width: 100%;
}

.phone #top-nav ul{
   background:<?php echo $menu_elem_back_color; ?> !important;
}
.sidebar-container {
   background-color:<?php echo $sideb_background_color; ?>;
}

#sidebar3 .sidebar-container{
	background-color:<?php echo $content_back_color; ?>;
}

.commentlist li {
	  background-color:<?php echo $sideb_background_color; ?>;
}
.children .comment{
	background-color:<?php echo weddings_ligthest_brigths($sideb_background_color,37); ?>;
}

#reply-title small{
	background:<?php echo $menu_elem_back_color; ?>;
}

#top-nav.phone  > li  > a, #top-nav.phone  > li  > a:link, #top-nav.phone  > li  > a:visited, a .page-links-number, .post-password-form input[type="submit"], .more-link  {
	color:<?php echo $menu_links_color; ?>;
	background:<?php echo $menu_elem_back_color; ?>;
}

.top-nav-list.phone  > li:hover > a ,.top-nav-list.phone  > li  > a:hover, .top-nav-list.phone  > li  > a:focus, .top-nav-list.phone  > li  > a:active {
	color:<?php echo $menu_links_hover_color; ?> !important;
	background:<?php echo $menu_color; ?>;
}

.top-posts-texts {  
   background-color:<?php echo $top_posts_color; ?>;
}

#slideshow{
	border-bottom: 1px solid <?php echo $text_headers_color; ?>;
}

.home #slideshow{
	border-bottom: 2px solid rgba(105, 105, 105, 0.35) !important;
}

#menu-button-block a{
	border-left: 2px solid <?php echo $text_headers_color; ?>;
}

#menu-button-block{
	border-left: 10px solid <?php echo $text_headers_color; ?>;
}

.top-nav-list.phone   li ul li  > a, .top-nav-list.phone   li ul li  > a:link, .top-nav-list.phone   li  ul li > a:visited {
	color:<?php echo $menu_links_color ?> !important;
}

#top-nav-list > li > a:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item), #top-nav-list > li ul > li > a:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item), #top-nav-list li a:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item), .top-nav-list li a:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item), #top-nav-list > li ul > li > a:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item){
    color:<?php echo $menu_links_color ?>;
}

#top-nav-list > li > a:hover, .top-nav-list > li > a:hover, #top-nav-list > li ul > li > a:hover{
    color:<?php echo $menu_links_hover_color ?>;
}

.top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active {
	color:<?php echo $menu_links_hover_color; ?> !important;
	background-color:<?php echo $menu_color; ?> !important;
}

.top-nav-list.phone  li.has-sub >  a, .top-nav-list.phone  li.has-sub > a:link, .top-nav-list.phone  li.has-sub >  a:visited {
	background:<?php echo $menu_elem_back_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_right.png) right top no-repeat;
	background-size: contain !important;
}

.top-nav-list.phone  li.current-menu-item.has-sub:hover > a, .top-nav-list.phone  li.current-page-ancestor.has-sub:hover > a, .top-nav-list.phone  li.current-menu-item.has-sub > a:hover, .top-nav-list.phone  li.current-menu-item.has-sub > a:focus, .top-nav-list.phone  li.current-menu-item.has-sub >  a:active {
	background:<?php echo $menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right top no-repeat !important;
	background-size: contain !important;
}

.top-nav-list.phone  li ul li.has-sub > a, .top-nav-list.phone  li ul li.has-sub > a:link, .top-nav-list.phone  li ul li.has-sub > a:visited{
	background:<?php echo '#'.weddings_ligthest_brigths($menu_elem_back_color,10); ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_right.png) right no-repeat;
	background-size: contain !important;
}

.phone #top-nav > div > ul > li ul li a, .phone #top-nav > div > ul > li ul li a:link{
	margin-left: 2px;
	border-left: 2px solid <?php echo $menu_color; ?> !important;
}

.phone div.top-nav-list > ul > li.active{
	border-left: 10px solid #<?php echo weddings_ligthest_brigths($menu_color,40); ?> !important;
}

.phone div.top-nav-list > ul > li.active > a{
	border-left: 2px solid #<?php echo weddings_ligthest_brigths($menu_color,40); ?> !important;
}

.phone #top-nav-list > li.current-page-ancestor > a{
	border-left: border-left: 2px solid <?php echo $menu_color; ?> !important;	
}

.phone .top-nav-list > li:hover,
.phone .top-nav-list >.current-menu-item,
.phone .top-nav-list >.current_page_parent  {
	border-left: 10px solid #<?php echo weddings_ligthest_brigths($text_headers_color,40); ?> !important;
}

.phone .sub-menu{
	position: relative !important;
}

.top-nav-list li.active > a{
	color: <?php echo $menu_links_hover_color; ?> !important;
}

.phone .top-nav-list > li a:hover,
.phone .top-nav-list .current-menu-item a,
.phone .top-nav-list > li.active a,
.phone .top-nav-list .current-page-parent a{
	border-left: 2px solid #<?php echo weddings_ligthest_brigths($text_headers_color,40); ?> !important;
}

.top-nav-list.phone  li.current-menu-ancestor > a:hover, .top-nav-list.phone  li.current-menu-item > a:focus, .top-nav-list.phone  li.current-menu-item > a:active{
	color:<?php echo $menu_links_color ?>;
	background-color:<?php echo $menu_color; ?> !important;
}

.top-nav-list.phone  li.current-menu-ancestor.has-sub > a, .top-nav-list.phone  li.current-menu-item.has-sub > a, .top-nav-list.phone  li.current-menu-item.has-sub > a{
	background:<?php echo $selected_menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat;
	background-size: contain !important;
}

.top-nav-list.phone  li.current-menu-ancestor.has-sub > a:hover, .top-nav-list.phone  li.current_page_item.has-sub > a:hover, .top-nav-list.phone  li.current-menu-item.has-sub > a:focus, .top-nav-list.phone  li.current-menu-item.has-sub > a:active{
	background:<?php echo $menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat !important;
	background-size: contain !important;
}

.top-nav-list.phone  li.current-menu-item > a,.top-nav-list.phone  li.current-menu-item > a:visited,{
	color:<?php echo $primary_links_hover_color ?> !important;
	background-color:<?php echo $selected_menu_color; ?> !important;
}

.phone  #top-nav-list > ul li:first-child { 
border-top:3px solid <?php echo $menu_color; ?> !important;
}

.widget-area ul li { list-style: none !important; }

.widget-area ul li:before{	
 	width:	 0; 
 	height:	 0; 
	border-top:	 solid transparent;
	border-bottom: solid transparent;
	//color: <?php echo $text_headers_color; ?>;	
	border-width:	5px;
	content: "\27a8";
	margin-right:	5px;
	font-style: normal;
	font-weight: 100;
}

.sitemap li{
	color: <?php echo $text_headers_color; ?>;
}

#sidebar1 .widget-area li,
#sidebar2 .widget-area li{
	border-bottom: 1px solid rgb(201, 201, 201);
	padding-top: 5px;
	padding-bottom: 5px;
	font-style: italic;
}

#sidebar1 .widget-area li:last-child,
#sidebar2 .widget-area li:last-child{
	border-bottom: 0px !important;
}
</style>
<script>
	setTimeout(function(){
        jQuery("header").on("click","#menu-button-block", function(){
			if(jQuery("#top-nav").hasClass("open")){
			jQuery("#menu-button-block").attr("style", "background:url(<?php echo get_template_directory_uri('template_url') ?>/images/menu.button<?php if($color_scheme == "Theme-1") echo "1"; elseif($color_scheme == "Theme-2") echo "2"; elseif($color_scheme == "Theme-3") echo "3"; elseif($color_scheme == "Theme-4") echo "4"; elseif($color_scheme == "Theme-5") echo "5"; else echo "1"; ?>1.png) <?php echo $selectedmenu_bgcolor; ?> right no-repeat");
			}
			else{
			jQuery("#menu-button-block").attr("style", "background:url(<?php echo get_template_directory_uri('template_url') ?>/images/menu.button<?php if($color_scheme == "Theme-1") echo "1"; elseif($color_scheme == "Theme-2") echo "2"; elseif($color_scheme == "Theme-3") echo "3"; elseif($color_scheme == "Theme-4") echo "4"; elseif($color_scheme == "Theme-5") echo "5"; else echo "1"; ?>.png) <?php echo $selectedmenu_bgcolor; ?> right no-repeat");
			}
		});
	},1000);
</script>
<?php
}
	private function negativeColor($color) {
		//get red, green and blue
		$r = substr($color, 0, 2);
		$g = substr($color, 2, 2);
		$b = substr($color, 4, 2);
		
		//revert them, they are decimal now
		$r = 0xff-hexdec($r);
		$g = 0xff-hexdec($g);
		$b = 0xff-hexdec($b);
		
		//now convert them to hex and return.
		return dechex($r).dechex($g).dechex($b);
	}
	
	public function dorado_theme_admin_color_control(){
		if(isset($_REQUEST['controller']) && $_REQUEST['controller']=='color_control_page'){
			if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
			echo '<div id="message" class="updated"><p><strong>' . $this->colorcontrol . ' settings saved.</strong></p></div>';	
		if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
			echo '<div id="message" class="updated"><p><strong>' . $this->colorcontrol . ' settings reset.</strong></p></div>';
		}
		global $weddings_admin_helepr_functions;
		$pickers=$this->get_option_type('picker');
		$count_picker=count( $pickers );
		$array_of_colors=array(
			array(
				"menu_elem_back_color" => "#ffffff", 
				"content_back_color" => "#ffffff", 
				"sideb_background_color" => "#ffffff", 
				"footer_back_color" => "#ececec", 
				"top_posts_color" => "#FCFCFC", 
				"text_headers_color" => "#CCEA03", 
				"primary_text_color" => "#464646", 
				"footer_text_color" => "#000000", 
				"primary_links_color" => "#464646", 
				"primary_links_hover_color" => "#464646", 
				"menu_links_color" => "#464646", 
				"menu_links_hover_color" => "#464646", 
				"menu_color" => "#ffffff", 
				"selected_menu_color" => "#ffffff", 
				"logo_text_color" => "#CCEA03", 
			),
			array(
				"menu_elem_back_color" => "#ffffff", 
				"content_back_color" => "#ffffff", 
				"sideb_background_color" => "#ffffff", 
				"footer_back_color" => "#ececec",  
				"top_posts_color" => "#FCFCFC", 
				"text_headers_color" => "#E0DD0B", 
				"primary_text_color" => "#464646", 
				"footer_text_color" => "#000000", 
				"primary_links_color" => "#464646", 
				"primary_links_hover_color" => "#464646", 
				"menu_links_color" => "#464646", 
				"menu_links_hover_color" => "#464646", 
				"menu_color" => "#ffffff", 
				"selected_menu_color" => "#ffffff", 
				"logo_text_color" => "#E0DD0B", 
			),
			array(
				"menu_elem_back_color" => "#ffffff", 
				"content_back_color" => "#ffffff", 
				"sideb_background_color" => "#ffffff", 
				"footer_back_color" => "#ececec",  
				"top_posts_color" => "#FCFCFC", 
				"text_headers_color" => "#EA6EFF", 
				"primary_text_color" => "#464646", 
				"footer_text_color" => "#000000", 
				"primary_links_color" => "#464646", 
				"primary_links_hover_color" => "#464646", 
				"menu_links_color" => "#464646", 
				"menu_links_hover_color" => "#464646", 
				"menu_color" => "#ffffff", 
				"selected_menu_color" => "#ffffff", 
				"logo_text_color" => "#EA6EFF", 
			),
			array(
				"menu_elem_back_color" => "#ffffff", 
				"content_back_color" => "#ffffff", 
				"sideb_background_color" => "#ffffff", 
				"footer_back_color" => "#ececec", 
				"top_posts_color" => "#FCFCFC", 
				"text_headers_color" => "#FF9ED0", 
				"primary_text_color" => "#464646", 
				"footer_text_color" => "#000000", 
				"primary_links_color" => "#464646", 
				"primary_links_hover_color" => "#464646", 
				"menu_links_color" => "#464646", 
				"menu_links_hover_color" => "#464646", 
				"menu_color" => "#ffffff", 
				"selected_menu_color" => "#ffffff", 
				"logo_text_color" => "#FF9ED0", 
			),
			array(
				"menu_elem_back_color" => "#ffffff", 
				"content_back_color" => "#ffffff", 
				"sideb_background_color" => "#ffffff", 
				"footer_back_color" => "#ececec",  
				"top_posts_color" => "#FCFCFC", 
				"text_headers_color" => "#81B6FF", 
				"primary_text_color" => "#464646", 
				"footer_text_color" => "#000000", 
				"primary_links_color" => "#464646", 
				"primary_links_hover_color" => "#464646", 
				"menu_links_color" => "#464646", 
				"menu_links_hover_color" => "#464646", 
				"menu_color" => "#ffffff", 
				"selected_menu_color" => "#ffffff", 
				"logo_text_color" => "#81B6FF", 
			)
			);
		
		$this->default_themes_jquery($array_of_colors) ?>
		
        <?php global $weddings_web_dor; ?>
		
		<div id="main_color_control_page">			
			<table align="center" width="90%" style="margin-top: 0px;">
			    <tr>
					<td style="height: 70px;">
						<h2 style="margin:15px 0px 0px;font-family:Segoe UI;padding-bottom: 10px;color: rgb(111, 111, 111); font-size:28pt;">Color Control</h2>
					</td>
				</tr>
				<tr>   
					<td style="font-size:14px; font-weight:bold;padding-left: 5px;">
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you customize the color features.
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-theme-options/3-6.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					</td>    
					<td  align="right" style="font-size:16px;">
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes/wedding.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
							<img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
						</a>
					</td>
				</tr>
			</table>
			<div style="margin: 0 auto;width:90%;padding-bottom:0px; padding-top:0px;">		
				<div class="optiontitle" style="">
					<p style="font-size:15px;font-weight:bold;color: #333;">The color customization parameters are disabled in free version. Please buy the commercial version in order to enable this functionality.</p>
					<img src="<?php echo get_template_directory_uri(); ?>/images/color.jpg" width="100%" style="border-bottom: 1px solid rgb(206, 206, 206);">
				</div>
			</div>
		</div>	
		 <?php
	}
	
	private function get_option_type($type=''){
		$cur_type_elements=array();
		$k=0;
		foreach( $this->options_colorcontrol as $option ){
			if(isset($type) && isset($option['type']) && $option['type'] == $type ){
				$cur_type_elements[$k]=$option;
				$k++;
			}
		}
			return $cur_type_elements;
	}
	
	private function default_themes_jquery($array_of_colors=NULL){
		/* print array if it not set */
		if($array_of_colors===NULL){
			echo "\$array_of_colors=array(<br>array(<br>";
			foreach($this->options_colorcontrol as $key=>$special_color){
				if($special_color['type']=='picker'){
					echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
				}
			}
			echo "),<br>array(<br>";
			foreach($this->options_colorcontrol as $key=>$special_color){
				if($special_color['type']=='picker'){
					echo "	\"".$special_color['var_name']."\" => \"".$special_color['std']."\", <br>";
				}
			}
			echo ")); esi copy past ara array_of_colors tex@ kashxati";
			die();
			
		}
		/* print jQuery and initial colors standard themes */
		else {			
			echo '<script>jQuery(document).ready(function(){
				jQuery("#color_scheme").change(function () {
					var bkg = jQuery("#color_scheme option:selected").val();  ';

			foreach($array_of_colors as $key=>$colors){
				echo 'if (bkg == "Theme-'.($key+1).'") {';
					foreach($colors as $key=>$color){					
						echo 'jQuery("#'.$key.'").val("'.$color.'"); ';
						echo 'jQuery("#'.$key.'").css("backgroundColor", "'.$color.'"); ';
						echo 'jQuery("#'.$key.'").iris("color", "'.$color.'"); ';
						echo 'jQuery("#'.$key.'_picker").children("div").css("backgroundColor", "'.$color.'"); ';
 
					}
				echo " }";
			}
			echo "});  });</script>";
		}
	}
	
	private function default_theme_select($array_of_colors=NULL){
		$count_of_selects=count($array_of_colors);		
			echo '<select name="color_scheme" id="color_scheme">';		
		for($i=1;$i<=$count_of_selects;$i++){
			$selected='';
			$selected=selected($this->options_colorcontrol['color_scheme']['std'], 'Theme-'.$i );
			echo '<option value="Theme-'.$i.'" '.$selected.'>Theme-'.$i.'</option>';			
		}		
		echo '</select>';
	}
	private function hex_to_rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';
		//Return default if no color provided */
		if(empty($color))
			  return $default; 
		/* Sanitize $color if "#" is provided  */
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			/* Check if color has 6 or 3 characters and get values */
			if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			}
			elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} 
			else {
				return $default;
			}
			/* Convert hexadec to rgb */
			$rgb =  array_map('hexdec', $hex);
			/* Check if opacity is set(rgba or rgb) */
			if($opacity){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
			/* Return rgb(a) color string */
			return $output;
	}
}
