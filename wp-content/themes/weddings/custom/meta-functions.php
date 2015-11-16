<?php
add_action('admin_init','weddings_meta_init');

function weddings_meta_init()
{
    wp_enqueue_script('weddings_meta_js', get_template_directory_uri() . '/custom/meta.js', array('jquery'));
    wp_enqueue_style('weddings_meta_css', get_template_directory_uri() . '/custom/meta.css');

    foreach (array('post', 'page') as $type) {
        add_meta_box('weddings_all_meta', 'Weddings Custom Meta Box', 'weddings_meta_setup', $type, 'normal', 'high');
    }

    add_action('save_post', 'weddings_meta_save');
}

function weddings_meta_setup()
{
	global $weddings_layout_page,$weddings_general_settings_page,$post;
	
	foreach ($weddings_general_settings_page->options_generalsettings as $value) 
{
    if (get_theme_mod( $value['id'] ) === FALSE)
	{
		 $$value['var_name'] = $value['std']; 
	} else {
		 $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}

	foreach ($weddings_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id']) === FALSE) {
				
				$$value['var_name'] = $value['std'];
			} else {
				
				$$value['var_name'] = get_theme_mod($value['id']);
			}
		}

	}
    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID, '_weddings_meta', TRUE);
    $n_of_home_post=get_option( 'posts_per_page', 6 );
	if( gettype ($post->ID) == 'integer' ){
		$meta=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area ,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'blogstyle' => '',
			'showthumb' => '',
			'blog_perpage' => $n_of_home_post,
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
		);
		
	}
	else
	{
		$meta_if_par_not_initilas=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area ,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'blogstyle' => '',
			'showthumb' => '',
			'blog_perpage' => $n_of_home_post,
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
			'blog_posts_on' => '',
		);
		foreach($meta_if_par_not_initilas as $key=>$meta_if_par_not_initila){
			
			if(!isset($meta[$key])){
				$meta[$key]=$meta_if_par_not_initila;
			}
		
		}
		
	}

    // instead of writing HTML here, lets do an include
    include(get_template_directory(). '/custom/meta.php');

    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="weddings_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function weddings_meta_save($post_id) 
{

    // authentication checks
    // check user permissions
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'page') {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    } else {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }
	
    $current_data = get_post_meta($post_id, 'weddings_meta_date', TRUE);
	if(isset($_POST['weddings_meta_date']))
		$new_data = $_POST['weddings_meta_date'];
    else
		$new_data = "";

    if (gettype ($post_id) == 'integer') {
       if(is_null($new_data)){ 
		delete_post_meta($post_id, 'weddings_meta_date');
		}
	   else{ 
		update_post_meta($post_id, 'weddings_meta_date', $new_data);
		add_post_meta($post_id, 'weddings_meta_date', $new_data, TRUE);
		}
   } elseif (!is_null($new_data)) {
      update_post_meta($post_id, 'weddings_meta_date', $new_data);

   }  

    return $post_id;
}

function weddings_meta_clean(&$arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $i => $v)
		{
			if (is_array($arr[$i])) 
			{
				weddings_meta_clean($arr[$i]);

				if (!count($arr[$i])) 
				{
					unset($arr[$i]);
				}
			}
			else 
			{
				if (trim($arr[$i]) == '') 
				{
					unset($arr[$i]);
				}
			}
		}

		if (!count($arr)) 
		{
			$arr = NULL;
		}
	}
}

?>