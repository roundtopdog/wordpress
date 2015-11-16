var wedding_footer_back_color='';
( function( jQuery ){

/*

  wp.customize( 'web_bussines[color_schema]', function( value ) {
	 
		value.bind( function( to ) {
      switch (to) {
        case 'Theme-1': {
          var footer_background_color = '#E3E2E2';
          var content_background_color = '#ffffff';
          var wrapper_color = '#1f1f1f';
          var h3_color = '#0B2749';
          var a_link_color = '#FFFFFF';
          var a_hover_color = '#FFFFFF';
          var footer_color = '#1f1f1f';
		  var top_posts_color = '#0D2C53';
          break;

        }
        case 'Theme-2': {
          var footer_background_color = '#E3E2E2';
          var content_background_color = '#ffffff';
          var wrapper_color = '#1f1f1f';
          var h3_color = '#086200';
          var a_link_color = '#3E3E3E';
          var a_hover_color = '#3E3E3E';
          var footer_color = '#1f1f1f';
		  var top_posts_color = '#086200';
          break;

        }
        case 'Theme-3': {
          var footer_background_color = '#E3E2E2';
          var content_background_color = '#ffffff';
          var wrapper_color = '#1f1f1f';
          var h3_color = '#012331';
          var a_link_color = '#ffffff';
          var a_hover_color = '#ffffff';
          var footer_color = '#1f1f1f';
		  var top_posts_color = '#012331';
          break;
        }
		case 'Theme-4': {
          var footer_background_color = '#E3E2E2';
          var content_background_color = '#ffffff';
          var wrapper_color = '#1f1f1f';
          var h3_color = '#BE4415';
          var a_link_color = '#383838';
          var a_hover_color = '#383838';
          var footer_color = '#1f1f1f';
		  var top_posts_color = '#BE4415';
          break;
        }
      }
      jQuery( '.device' ).attr('style', 'background-color:' + footer_background_color + ' !important;' );
	   jQuery( '#footer' ).attr('style', 'background-color:' + footer_background_color + ' !important;' );
      jQuery( '#wrapper' ).attr('style', 'background-color:' + content_background_color + ' !important;' );
      jQuery( 'body' ).attr('style', 'color:' + wrapper_color + ' !important;' );
      jQuery( 'h3' ).attr('style', 'color:' + h3_color + ' !important;' );
      jQuery( 'a:link, a:visited' ).attr('style', 'color:' + a_link_color + ' !important;' );
      jQuery( 'a:hover' ).attr('style', 'color:' + a_hover_color + ' !important;' );
      jQuery( '.device' ).attr('style', 'color:' + footer_color + ' !important;' );
	  jQuery( '#footer' ).attr('style', 'color:' + footer_color + ' !important;' );
		} );
	} );*/
	
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
	
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-title-a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			jQuery( '#site-description-p' ).text( to );
		} );
	} );
	 wp.customize( 'theme_mods_weddings[weddingscc_menu_elem_back_color]', function( value ) {
		value.bind( function( to ) {

				var anyString = to;
				var hex = to;
				var rgb = hex2rgb(hex);
				var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery( '#top-nav' ).css('background-color',  hextorgba );
				jQuery( '.read_more' ).css('background-color',  to );				
				jQuery(".top-nav-list li, #top-nav-list .current-menu-item > a, .top-nav-list .current-menu-item > a").hover(	
        	function(){
			    if(wedding_menu_hover_back_color==""){
					jQuery(this).attr("style","background-color:none !important");
					}
				else{
					jQuery(this).attr("style","background-color:"+wedding_menu_hover_back_color+" !important");
					}
				if(wedding_menu_links_hover_color == "")
					jQuery(this).attr("style","color:none !important" );
				else				
					jQuery(this).attr("style","color:"+wedding_menu_links_hover_color+" !important");	
			},
			function(){
			    if(wedding_static_color== "")
					jQuery(this).attr("style","background-color:none !important");
				else	
					jQuery(this).attr("style","background-color:"+wedding_static_color+" !important");
				if(wedding_menu_links_color == "")
					jQuery(this).attr("style","color:none !important" );
				else				
					jQuery(this).attr("style","color:"+wedding_menu_links_color+" !important");
			
			  }); 
				 window.parent.wedding_static_color=to;
		} );
	  } );
	  
	  wp.customize( 'theme_mods_weddings[weddingscc_selected_menu_color]', function( value ) {
     	value.bind( function( to ) {		
			var anyString = to;
			var hex = to;
			var rgb = hex2rgb(hex);
			var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
			jQuery( '#top-nav-list .current-menu-item,.top-nav-list li.current_page_item, #top-nav-list .current_page_item,.top-nav-list li.current-menu-item, #top-nav-list .current-menu-item > a,.top-nav-list li.current_page_item > a, #top-nav-list .current_page_item > a,.top-nav-list li.current-menu-item > a' ).css('background-color',hextorgba );
			jQuery("#top-nav-list .current-menu-item,.top-nav-list li.current_page_item, #top-nav-list .current_page_item,.top-nav-list li.current-menu-item,#top-nav-list .current-menu-item > a,.top-nav-list li.current_page_item > a, #top-nav-list .current_page_item > a,.top-nav-list li.current-menu-item > a").hover(
			   function(){
			       if(wedding_menu_hover_back_color == "")
						jQuery(this).css("background-color", "none");
				   else		
						jQuery(this).css("background-color",wedding_menu_hover_back_color);				
				},
				function(){
						jQuery(this).css("background-color", hextorgba);
						
			  });
			 window.parent.wedding_selected_menu_color=to;
       } );
     } ); 
	
	 wp.customize( 'theme_mods_weddings[blogdescription]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#site-description-p' ).html( to  ); 
           		
		} );
	} );
    wp.customize( 'theme_mods_weddings[weddingscc_footer_back_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '.device' ).css('background-color', to  );  
			jQuery( '#footer' ).css('background-color', to  ); 
			 window.parent.wedding_footer_back_color=to;		
		} );
	} ); 
   wp.customize( 'theme_mods_weddings[weddingscc_home_top_posts_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#top-page' ).css('background-color', to  );		
             window.parent.wedding_featured_posts_color=to;
		} );
	} ); 	
   wp.customize( 'theme_mods_weddings[weddingscc_sideb_background_color]', function( value ) {
   	value.bind( function( to ) {
			jQuery( '#sidebar1 .sidebar-container, #sidebar2 .sidebar-container' ).css('background-color',  to  );
			 window.parent.wedding_sideb_background_color=to;	
    } );
  } );
     wp.customize( 'theme_mods_weddings[weddingscc_top_posts_color]', function( value ) {
   	value.bind( function( to ) {
			jQuery( '.top-posts-texts' ).css('background-color',to );
			 window.parent.wedding_top_posts_color=to;	
    } );
  } );
  
   wp.customize( 'theme_mods_weddings[weddingscc_menu_links_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '.top-nav-list a:not(.top-nav-list .current-menu-item a), #top-nav-list a:not(#top-nav-list .current-menu-item a), .reply, #top-nav-list > li ul > li > a' ).attr('style', 'color:'+to );
			jQuery( '.read_more' ).css('color',  to ); 
			jQuery("#top-nav-list li a:not(#top-nav-list .current-menu-item a, #top-nav-list .active), .top-nav-list li a:not(.top-nav-list .current-menu-item a, .top-nav-list .active)").hover(
			   function(){
			       if(wedding_menu_links_hover_color == "")
						jQuery(this).css("color: none");
				   else		
						jQuery(this).css("color",wedding_menu_links_hover_color);				
				},
				function(){
						jQuery(this).css("color", to);			
			  });
			 window.parent.wedding_menu_links_color=to;			
		} );
	} );

   wp.customize( 'theme_mods_weddings[weddingscc_menu_color]', function( value ) {
    value.bind( function( to ) {    
	 jQuery( '#slideshow' ).css('background-color',to );
	 jQuery( '.get_title' ).css('background-color',  to );	   
	 jQuery( '#menu-button-block' ).css('background-color',  to );
	 jQuery( '#top-nav-list li.menu-item-has-children.active:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item)' ).css('background-color',  to );
	
	   var anyString = to;
	   var hex = to;
	   var rgb = hex2rgb(hex);
	   var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	   jQuery(".top-nav-list li:not(#top-nav-list .current-menu-item, .top-nav-list .current-menu-item)").hover(	
        	function(){
				jQuery(this).attr("style","background-color:"+hextorgb+" !important");				
			},
			function(){
			    if(wedding_static_color== "")
					jQuery(this).attr("style","background-color:none !important");
				else	
					jQuery(this).attr("style","background-color:"+wedding_static_color+" !important");
				if(wedding_menu_links_color == "")
					jQuery(this).attr("style","color:none !important" );
				else				
					jQuery(this).attr("style","color:"+wedding_menu_links_color+" !important");
			
			  });
			  

       jQuery("#top-nav-list .current-menu-item a, .top-nav-list .current-menu-item a").hover(	
        	function(){
				jQuery(this).attr("style","background-color:"+hextorgb+" !important");				
			},
			function(){
			    if(wedding_selected_menu_color== "")
					jQuery(this).attr("style","background-color:"+wedding_selected_menu_color+" !important");
				else	
					jQuery(this).attr("style","background-color:"+wedding_selected_menu_color+" !important");
				if(wedding_menu_links_hover_color == "")
					jQuery(this).attr("style","color:none !important" );
				else				
					jQuery(this).attr("style","color:"+wedding_menu_links_hover_color+" !important");
			
			  });
			
			jQuery("#top-nav-list .current-menu-item,.top-nav-list li.current_page_item, #top-nav-list .current_page_item,.top-nav-list li.current-menu-item,#top-nav-list .current-menu-item a,.top-nav-list li.current_page_item > a, #top-nav-list .current_page_item > a,.top-nav-list li.current-menu-item > a").hover(
			   function(){
			        if(wedding_menu_links_hover_color == "")
						jQuery(this).css("color", "none");
				    else		
						jQuery(this).css("color",wedding_menu_links_hover_color);	
				},
				function(){
					if(wedding_menu_links_hover_color == "")
						jQuery(this).css("color", "none");
				    else		
						jQuery(this).css("color",wedding_menu_links_hover_color);	
						
			  });
	  window.parent.wedding_menu_hover_back_color=to;
    } );
  } );
  
   wp.customize( 'theme_mods_weddings[weddingscc_content_back_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#sidebar3 .sidebar-container' ).css('background-color',  to );
			 window.parent.wedding_content_back_color=to;
		} );
	} );
	
	wp.customize( 'theme_mods_weddings[weddingscc_footer_sidebar]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#sidebar4, #sidebar4 .sidebar-container' ).css('background-color',  to );
			 window.parent.wedding_wedding_footer_sidebar=to;
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingscc_primary_text_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#wrapper' ).css('color', to );
			jQuery( '#content' ).css('color', to );
			jQuery( '#sidebar3' ).css('color', to );
			jQuery( '#sidebar4' ).css('color', to );
			jQuery( '#sidebar3 p' ).css('color', to );
			jQuery( '#sidebar4 p' ).css('color', to );
			jQuery( '.blog p, #top-posts span, .sep' ).css('color', to );
			 window.parent.wedding_primary_text_color=to;
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingscc_text_headers_color]', function( value ) {
		value.bind( function( to ) {
			jQuery("#ccc").html("h1, .bwg_slideshow_description_text > h2, .bwg_slideshow_description_text > h3, h4, h5, h6{color:"+to+" !important;}");
			jQuery( 'h1' ).css('color', to );
			jQuery( 'h3:not(#top-posts-list h3):not(.widget-area h3)' ).css('color', to );
			jQuery( 'h4' ).css('color', to );
			jQuery( 'h5' ).css('color', to );
			jQuery( 'h6' ).css('color', to );
			jQuery( 'h1 a:not(.site-title-a)' ).css('color', to );
			jQuery( 'h2 a:not(.blog h2 a)' ).css('color', to );
			jQuery( 'h2:not(.blog h2)' ).css('color', to );
			jQuery( '.blog_wel h2 > a' ).css('color', to );
			jQuery( 'h3 a:not(#top-posts-list h3 a):not(h3 a)' ).css('color', to );
			jQuery( 'h4 a:not(h4 a)' ).css('color', to );
			jQuery( '.widget-area ul li:before' ).css('color', to );
			jQuery('.widget-area ul li').css('color', to);
			
			jQuery( 'h5 a' ).css('color', to );
			jQuery( 'h6 a' ).css('color', to );
			jQuery(".web #slideshow:not(.home #slideshow), .tablet #slideshow:not(.home #slideshow)").attr("style","border-bottom: 1px solid "+to+" !important");
			
			jQuery('#top-nav-list > li.current_page_item > a, #top-nav-list > li.current-menu-ancestor > a').attr('style', 'border-top: 3px solid '+to+' !important');
			jQuery("#top-nav-list > li > a").hover(function(){
				jQuery(this).attr("style","border-top: 3px solid "+to+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid transparent !important");
			});
			jQuery("#top-nav-list > li.current_page_item > a, #top-nav-list > li.current-menu-ancestor > a").hover(function(){
				jQuery(this).attr("style","border-top: 3px solid "+to+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid "+to+" !important");
			});
			jQuery("#top-nav-list ul li.active").attr("style","border-top: 3px solid "+to+" !important");
			jQuery( '.blog_test img' ).attr('style', 'border-bottom: 3px solid '+to+' !important');
			jQuery( '.sub-menu' ).attr('style','background-color:'+ to +' !important');
			jQuery( '.contact_send' ).css('background-color', to);
			 window.parent.wedding_text_headers_color=to;
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingscc_primary_links_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( 'a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h4 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a), .gallery_cat, .test_cat, .blog h3' ).css('color', to );
			jQuery("a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h4 a):not(h5 a):not(h6 a):not(#wpadminbar a), .gallery_cat, .test_cat, .blog h3").hover(function(){
			    if(wedding_link_color_hover == "")
				  jQuery(this).css("color", "none" );
				else				
				  jQuery(this).css("color", wedding_link_color_hover);
				},function(){
				  jQuery(this).css("color",to); 
			  });
			 window.parent.wedding_link_color_stop=to;			
		} );
	} );
		
	  wp.customize( 'theme_mods_weddings[weddingscc_logo_text_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-title-a, .styledHeading' ).css('color', to );
			 window.parent.wedding_logo_text_color=to;
		} );
	} );
	wp.customize( 'theme_mods_weddings[weddingscc_logo_text_color_for_phone]', function( value ) {
		value.bind( function( to ) {
			jQuery( '.phone a:link.site-title-a,.phone a:hover.site-title-a,.phone a:visited.site-title-a,.phone a.site-title-a' ).css('color', to );
			 window.parent.wedding_logo_text_color_for_phone=to;
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingscc_primary_links_hover_color]', function( value ) {
		value.bind( function( to ) {
            
			jQuery("a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h4 a):not(h5 a):not(h6 a):not(#wpadminbar a)").hover(function(){
				jQuery(this).css("color",to);				
				},function(){
				if(wedding_link_color_stop == "")
				  jQuery(this).css("color", "none" );
				else				
				  jQuery(this).css("color", wedding_link_color_stop);
			  });
		
			 window.parent.wedding_link_color_hover=to;
		} );
	} );
	
	
	
	   wp.customize( 'theme_mods_weddings[weddingscc_menu_links_hover_color]', function( value ) {
		value.bind( function( to ) {
            jQuery( '.read_more, .top-nav-list .current-menu-item > a' ).attr('style', 'color:'+to+' !important');
			jQuery("#top-nav-list li > a:not(#top-nav-list .current-menu-item a), .top-nav-list li > a:not(.top-nav-list .current-menu-item a)").hover(			
			   function(){
					jQuery(this).attr("style","color:"+to+" !important");				
				},
				function(){
						if(wedding_menu_links_color == "")
							jQuery(this).attr("style", "color: "+wedding_menu_links_color+" !important");
						else				
							jQuery(this).attr("style", "color: "+to+" !important");			
			  });
			  jQuery("#top-nav-list .current-menu-item,.top-nav-list li.current_page_item, #top-nav-list .current_page_item,.top-nav-list li.current-menu-item,#top-nav-list .current-menu-item a,.top-nav-list li.current_page_item > a, #top-nav-list .current_page_item > a,.top-nav-list li.current-menu-item > a").hover(
			   function(){
			        jQuery(this).css("color", to);
				},
				function(){
				    jQuery(this).css("color", to);
					if(wedding_menu_hover_back_color == "")
						jQuery(this).css("background-color", "none");
				    else		
						jQuery(this).css("background-color",wedding_menu_hover_back_color);	
						
			  });
			 window.parent.wedding_menu_links_hover_color=to;
		} );
	} );
	
   wp.customize( 'theme_mods_weddings[weddingscc_footer_text_color]', function( value ) {
		value.bind( function( to ) {
			jQuery( '.device' ).css('color', to );
			jQuery( '#footer' ).css('color', to  ); 
			 window.parent.wedding_footer_text_color=to;
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingsty_type_headers_font]', function( value ) {
		value.bind( function( to ) {
      jQuery( 'h1,h2,h3,h4,h5,h6, strong.heading' ).css('font-family', to );
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingsty_type_primary_font]', function( value ) {
		value.bind( function( to ) {
			jQuery( 'body:not(#top-nav-list a):not(.top-nav-list a)' ).css('font-family',  to  );
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingsty_type_secondary_font]', function( value ) {
		value.bind( function( to ) {
			jQuery( '#site-description-p' ).css('font-family',  to );
		} );
	} );
   wp.customize( 'theme_mods_weddings[weddingsty_type_inputs_font]', function( value ) {
		value.bind( function( to ) {
			jQuery( 'textarea,input[type="text"], .read_more' ).css('font-family', to );
		} );
	} );
} )( jQuery );