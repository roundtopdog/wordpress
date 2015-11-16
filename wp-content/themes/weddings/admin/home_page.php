<?php
class weddings_home_page_class{
	public $homepage;
	public $shorthomepage;
	public $options_homepage;
	
	function __construct(){
	  global $weddings_special_id_for_db;
		$this->homepage = "Homepage";
		$this->shorthomepage = $weddings_special_id_for_db;
		
		$value_of_std[0]=get_theme_mod($this->shorthomepage."_n_of_home_post",'6');		
		$value_of_std[2]=get_theme_mod($this->shorthomepage."_hide_top_posts",'');
		$value_of_std[5]=get_theme_mod($this->shorthomepage."_top_post_categories",'');
		$value_of_std[6]=get_theme_mod($this->shorthomepage."_content_post_categories",'');
		$value_of_std[7]=get_theme_mod($this->shorthomepage."_categories_name",'My Wedding Gallery');
		$value_of_std[8]=get_theme_mod($this->shorthomepage."_cat_name",'');
		$value_of_std[9]=get_theme_mod($this->shorthomepage."_content_post_cats",'');
		$value_of_std[10]=get_theme_mod($this->shorthomepage."_n_of_testimonials",'4');
		$value_of_std[11]=get_theme_mod($this->shorthomepage."_content_post",'');
		
		
		$this->options_homepage = array(

			"hide_top_posts" => array(
			
				"name" => "Hide Top Posts",
				
				"description" => "Using this option, you can hide the top posts from the homepage.",
				
				"var_name" => "hide_top_posts",

				"id" => $this->shorthomepage."_hide_top_posts",

				"std" => $value_of_std[2]
			
			),
			
			"top_post_categories" => array(
			
				"name" => "Hide Top Posts",
				
				"description" => "Select the categories from which you want the homepage top posts to be selected (the posts are selected automatically).",
				
				"var_name" => "top_post_categories",

				"id" => $this->shorthomepage."_top_post_categories",

				"std" => $value_of_std[5]
			
			),
			"content_post_categories" => array(
			
				"name" => "Select Categories for Custom Post Gallery",
				
				"description" => "Select the categories from which you want the homepage content posts to be selected (the posts are selected automatically)..",
				
				"var_name" => "content_post_categories",

				"id" => $this->shorthomepage."_content_post_categories",

				"std" => $value_of_std[6]
			
			),
			"categories_name" => array(
			
				"name" => "Custom Post Gallery",
				
				"description" => "Provide Post Gallery Name",
				
				"var_name" => "categories_name",

				"id" => $this->shorthomepage."_categories_name",

				"std" => $value_of_std[7]
			
			),
			"cat_name" => array(
			
				"name" => "Testimonials Name",
				
				"description" => "Provide Category name",
				
				"var_name" => "cat_name",

				"id" => $this->shorthomepage."_cat_name",

				"std" => $value_of_std[8]
			
			),
			
			"content_post_cats" => array(
			
				"name" => "Select Categories for Testimonials Posts",
				
				"description" => "Select the categories from which you want the homepage content posts to be selected (the posts are selected automatically)..",
				
				"var_name" => "content_post_cats",

				"id" => $this->shorthomepage."_content_post_cats",

				"std" => $value_of_std[9]
			
			),
			
			"n_of_testimonials" => array(
			
				"name" => "Number of testimonials",
				
				"description" => "",
				
				"var_name" => "n_of_testimonials",

				"id" => $this->shorthomepage."_n_of_testimonials",

				"std" => $value_of_std[10]
			
			),
			
			"content_post" => array(
			
				"name" => "Home page post",
				
				"description" => "",
				
				"var_name" => "content_post",

				"id" => $this->shorthomepage."_content_post",

				"std" => $value_of_std[11]
			
			)
		);
	}


	/* save changes or reset options */
	public function web_dorado_theme_update_and_get_options_home(){
		if (isset($_GET['page']) &&  $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "home_page") {
			if (isset($_REQUEST['action']) && $_REQUEST['action']=='save' ) {
				foreach ($this->options_homepage as $value) {
					if(isset($_REQUEST[$value['var_name']]))
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
				}
				foreach ($this->options_homepage as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
					} 
					else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=home_page&saved=true");
				die;
			} 
			else {				
				if (isset($_REQUEST['action']) && $_REQUEST['action']=='reset') {					
					foreach ($this->options_homepage as $value) {
						remove_theme_mod($value['id']);
					}
					header("Location: themes.php?page=web_dorado_theme&controller=home_page&reset=true");
					die;
				}							
			}
		}	
	}
	
	public function update_parametr($param_name,$value){
		set_theme_mod($this->options_homepage[$param_name]['id'],$value);
	}
	
	public function web_dorado_home_page_admin_scripts(){	
		wp_enqueue_style('home_page_main_style',get_template_directory_uri().'/admin/css/home_page.css');	
	}
	
	private function get_all_posts_in_select(){
		$args= array(
			'posts_per_page'   => 10000,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
		);
		$posts_array_custom=array();
		
		$posts_array = get_posts( $args );
			foreach($posts_array as $post){
				$posts_array_custom[$post->ID]=$post->post_title;
			}
		return $posts_array_custom;
	}
	
	public function dorado_theme_admin_home(){
		if(isset($_REQUEST['controller']) && $_REQUEST['controller']=='home_page'){			
			if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
				echo '<div id="message" class="updated"><p><strong>Home settings are saved.</strong></p></div>';
			if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
				echo '<div id="message" class="updated"><p><strong>Home settings are reset.</strong></p></div>';
		}
		foreach ($this->options_homepage as $value) {
			if(isset($value['id'])){
				if (get_theme_mod( $value['id'] ) === FALSE) {
					 $$value['var_name'] = $value['std']; 
				} 
				else { 		
					$$value['var_name'] = get_theme_mod( $value['id'] );
				}	
			}
		}
		global $weddings_admin_helepr_functions, $weddings_web_dor;  ?>
	
		<div id="main_home_page">
			<script>
			function open_or_hide_param_home(cur_element){			
				if(!cur_element.checked){
					jQuery(cur_element).parent().parent().parent().find('.open_hide').show();
				}
				else
				{
					jQuery(cur_element).parent().parent().parent().find('.open_hide').hide();
				}
				
			} 
			jQuery(document).ready(function() {
				jQuery('.with_input_home').each(function(){open_or_hide_param_home(this)})
				
				});					
			</script>
			<table align="center" width="90%" style="margin-top: 0px;">
			    <tr>
					<td colspan="2">
						<h2 style="margin:15px 0px 0px;font-family:Segoe UI;padding-bottom: 10px;color: rgb(111, 111, 111); font-size:28pt;">Home</h2>
					</td>
				</tr>
				<tr>   
					<td style="font-size:14px; font-weight:bold;padding-left: 5px;">
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to customize the homepage. 
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-theme-options/3-4.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					</td>   
					<td  align="right" style="font-size:16px;">
						<a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes/wedding.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
							<img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
						</a>
					</td>
                </tr>
			</table>
			<form method="post"  action="themes.php?page=web_dorado_theme&controller=home_page">
				<table align="center" width="90%" style=" padding-bottom:0px; padding-top:0px;">
					<tr>
						<td>
							<?php 
							$weddings_admin_helepr_functions->only_category_checkboxses($this->options_homepage['content_post']);  /* Home content posts */
							$weddings_admin_helepr_functions->checkbox_category_checkboxses($this->options_homepage['hide_top_posts'],$this->options_homepage['top_post_categories']);/* Home Top posts */
							$weddings_admin_helepr_functions->only_input($this->options_homepage['categories_name']);  /* Home Number of posts */
							$weddings_admin_helepr_functions->only_category_checkboxses($this->options_homepage['content_post_categories']);  /* Home content posts */
							$weddings_admin_helepr_functions->only_input($this->options_homepage['cat_name']);  
							$weddings_admin_helepr_functions->only_input($this->options_homepage['n_of_testimonials']);  /* Testimonials Number of posts */
							$weddings_admin_helepr_functions->only_category_checkboxses($this->options_homepage['content_post_cats']);  /* Home content posts */
							?>						
						</td>
					</tr>
				</table>
                
                <br/>
				<p class="submit" style="float: left; margin-left: 63px; margin-right: 8px;">
					<input class="button" name="save" type="submit" value="Save changes"/>
					<input type="hidden" name="action" value="save"/>
				</p>
			</form>
			<form method="post" action="themes.php?page=web_dorado_theme&controller=home_page">
				<p class="submit">
					<input class="button" name="reset" type="submit" value="Reset"/>
					<input type="hidden" name="action" value="reset"/>
				</p>
			</form>
		</div>
	<?php
	}	
}
 