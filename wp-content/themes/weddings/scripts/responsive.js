var window_cur_size = 'screen';

jQuery('document').ready(function(){
	
	
	sliderHeight=parseInt(jQuery("#slider-wrapper").height());
	sliderWidth=parseInt(jQuery("#slider-wrapper").width());
	sliderIndex=sliderHeight/sliderWidth;

	
	if(full_width_web_buisnes)
			screenSize=jQuery("body").width() - 25;
	else
			screenSize=jQuery(".container").width();
	
	if($(".container").hasClass("phone")){
		phone();		
	}
	else if($(".container").hasClass("tablet")){
		tablet();
	}
	else{checkMedia();}
	
	jQuery(window).resize(function(){checkMedia();});

	function checkMedia(){
		//###############################SCREEN
		if(jQuery('body').width()>=screenSize){screen();}
		//###############################TABLET
		if(jQuery('body').width()<screenSize && jQuery('body').width()>=768){tablet();}
		//################################PHONE
		if(jQuery('body').width()<768){phone(false);}
	}
	
	

	
	function screen(){
		if($(".container").hasClass("phone") || $(".container").hasClass("tablet")){
			jQuery('#sidebar1').after(jQuery('#blog'));
			jQuery('.blog').before(jQuery('#blog_posts'))
			}
		jQuery(".container").width(screenSize);
		jQuery("#header > .container").height('130px');
		jQuery(".top-nav-list").width(screenSize);
		jQuery(".container").removeClass("tablet");
		jQuery(".container").removeClass("phone");
		jQuery('.container').removeClass('small_shrifts')
	
		jQuery('.sub-menu').css('position','absolute');
		jQuery("#top-posts").removeClass("phone");
		jQuery("#top-posts").removeClass("tablet");
		jQuery("#top-posts").addClass("web");
		
		
		jQuery("body").removeClass("phone");
		jQuery("body").removeClass("tablet");
		jQuery("body").addClass("web");
		var slider_dir = jQuery('#top-nav').height();
		jQuery(".web #slideshow").attr("style","margin-top: -"+slider_dir+ "px");
		jQuery("#sidebar3 .sidebar-container, #sidebar4 .sidebar-container").width(screenSize);
		jQuery('#blog_posts').after(jQuery('#sidebar2'));
	
		jQuery(".site-title-a").removeClass("phone");
		$('.staff-list-block ').width('100%');
		jQuery("#header-wrapper").width($("body").attr("screen-size"));
		$("body header, body footer,  body nav").width("100%");
		jQuery("#top-nav").width("100%");
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);	
		if(window_cur_size == 'phone'){
			$("#header").find("#menu-button-block").remove();
			$("#top-nav").css({"display":"block"});
		}
		
		
		var contwidth=$("header .container").width();
		describtionwidth=parseInt(contwidth-597);
		$("#site-description p").width(describtionwidth);
		
		menumaxwidth=parseInt($(".container").width()-240);
		if($("#top-nav-list").length>0){
			if($("#top-nav-list").width()>menumaxwidth){
	
			if($("#top-nav-list").height())
				lisize=$("#top-nav-list").height();
			else
				lisize=66;
								
				$("#top-nav").css({"display":"block"});
				$("#logo-block a div").css({"height":(lisize+13)+"px"});
			}else{
				if($("#top-nav-list").height())
					lisize=$("#top-nav-list").height();
				else
					lisize=66;
								
				$("#top-nav").css({"display":"block"});
				$("#header .container").not(".phone").css({"min-height":(lisize+13)+"px","height":"auto"});
				$("#logo-block a div").css({"height":(lisize+13)+"px"});
			}
		}
		else
		{
			
			if($("#top-nav .top-nav-list").width()>menumaxwidth){
		
				if($("#top-nav-list").height())
					lisize=$("#top-nav-list").height();
				else
					lisize=66;	
												
				$("#top-nav").css({"display":"block"});
				$("#header .container").not(".phone").css({"min-height":(lisize+57)+"px","height":"auto"});
				$("#logo-block a div").css({"height":(lisize+57)+"px"});
			}else{
				if($("#top-nav-list").height())
					lisize=$("#top-nav-list").height();
				else
					lisize=66;
				$("#top-nav").width("100%");			
				$("#top-nav").css({"display":"block"});
				$("#header .container").not(".phone").css({"min-height":(lisize+57)+"px","height":"auto"});
				$("#logo-block a div").css({"height":(lisize+57)+"px"});
			}
			
			
		}
		jQuery('#top-nav-list > li').removeAttr('style');
		$(".header-phone-block").css({'margin-top':"0px"});

	
		window_cur_size	= 'screen';
	}
	
	function tablet(){	
		if(!($(".container").hasClass("phone") || $(".container").hasClass("tablet"))){
			jQuery('#sidebar1').before(jQuery('#blog'))
			jQuery('#blog').before(jQuery('.blog_wel'))
		}
		jQuery('.sub-menu').css('position','absolute');
		jQuery(".container").removeClass("phone");
		jQuery(".site-title-a").removeClass("phone");
		jQuery(".container").addClass("tablet");
		jQuery(".container").css('width','768px');
		jQuery("#sidebar3 .sidebar-container, #sidebar4 .sidebar-container").css('width','768px');
		jQuery(".container").css('min-height','110px');
		jQuery("#footer .container").css('min-height','initial');
		jQuery('.container').removeClass('small_shrifts')
		$('.staff-list-block ').width('100%');
		
		var slider_dir = jQuery('#top-nav').height();
		jQuery(".tablet #slideshow").attr("style","margin-top: -"+slider_dir+ "px");
		
		jQuery("#top-posts").removeClass("web");
		jQuery("#top-posts").removeClass("phone");
		jQuery("#top-posts").addClass("tablet");
		
		jQuery("body").removeClass("web");
		jQuery("body").removeClass("phone");
		jQuery("body").addClass("tablet");
	
		$("#top-nav #top-nav-list").width("768px");
		$("#top-nav #top-nav-list").css('width', '768px');
		if(window_cur_size == 'phone'){$("#header").find("#menu-button-block").remove();$("#top-nav").css({"display":"block"});}
		
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);
				
		
		var contwidth=$("header .container.tablet").width();
		describtionwidth=parseInt(contwidth-470);
		$("#site-description p").width(describtionwidth);
		
		$("#top-nav").css({"display":"block"});
		tabletmenumaxwidth=parseInt($(".container.tablet").width()-230);
		if($(".tablet #top-nav-list").width()>tabletmenumaxwidth){

			if($("#top-nav-list").height())
				lisize=$("#top-nav-list").height();
			else
				lisize=66;
			
			$("#header .container.tablet").not(".phone").css({"min-height":(lisize+14)+"px","height":"auto"});
			$("#logo-block a div").css({"height":(lisize+56)+"px"});
		}
		
		$(".header-phone-block").css({'margin-top':"0px"});
		
		jQuery('#top-nav-list > li').removeAttr('style');

		
		$(".container").find("#sidebar1 .sidebar-container,#sidebar2 .sidebar-container").css({"height":"auto","min-height":"0px"});
		
		window_cur_size	= 'tablet';
	}
	
	function phone(full){
		if(!($(".container").hasClass("phone") || $(".container").hasClass("tablet"))){		
			jQuery('#blog').after(jQuery('#sidebar1'));
			jQuery('#blog_posts').after(jQuery('blog'));
			jQuery('.blog_wel').after(jQuery('#blog'));
			}
		
		jQuery("#header > .container").height('auto');
		jQuery(".container").removeClass("tablet");
		jQuery(".container").addClass("phone");
		jQuery(".site-title-a").addClass("phone");
		jQuery("#logo-block").removeAttr('style');
		jQuery('#blog').after(jQuery('#sidebar1'));
		
		jQuery("#top-posts").removeClass("web");
		jQuery("#top-posts").removeClass("tablet");
		jQuery("#top-posts").addClass("phone");
		jQuery("body").removeClass("web");
		jQuery("body").removeClass("tablet");
		jQuery("body").addClass("phone");
		
		jQuery(".container").css('width','98%');
		jQuery("#sidebar3 .sidebar-container, #sidebar4 .sidebar-container").css('width','98%');
		count_width_of_list=$('.phone #our-staff li').length;
		count_width_of_list=count_width_of_list*130+50;

		$('.phone .staff-list-block ').width('100%');
		
		if(jQuery('body').width()>320 && jQuery('body').width()<640){width="100%";}else if(jQuery('body').width()<=320){width=jQuery('body').width(); }else{width="";}
		
		if(jQuery('body').width()>420){ 
			jQuery('.container').removeClass('small_shrifts');
		}
		else
		{
			jQuery('.container').addClass('small_shrifts');
		}
		jQuery(".container").width(width);
		$(" body nav, #top-nav-list,.container").width(width);
		
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);
		
		
		if(!$("#top-nav").hasClass("open")){$("#top-nav").css({"display":"none"})};
		
		if($("#top-nav").hasClass("open"))
		jQuery('.header-phone-block').css('height','100px')
				
		$(".phone #site-description p").css({"width":($(".container").width()-120)+"px"});
		jQuery('#top-nav-list > li').css('float','none');
		jQuery('.sub-menu').css('position','relative');
		
		$("#header").find("#menu-button-block").remove();

		$("#header>.container.phone").prepend('<div id="menu-button-block"><a href="#"></a></div>');
		
		jQuery('#logo-block').after(jQuery('#search-block'));
		jQuery('#search-block').after(jQuery('#menu-button-block'));

		$("#header .container.phone").css({"min-height":(jQuery('.container').width()*18.75/100)+20+"px"});
		
		
		
		
		$(".phone #top-posts-list li").css({
			"height":(jQuery('.container').width()*(15.62/100)+20)+"px"
		});
	
		
		$(".phone #top-posts-list li a").css({
			"height":(jQuery('.container').width()*15.62/100)+"px"
		});
		
		
		$(".phone #top-posts-list li a img").css({
			"height":(jQuery('.container').width()*15.62/100)+"px"
		});
		$(".container").find("#sidebar1 .sidebar-container,#sidebar2 .sidebar-container").css({"height":"auto","min-height":"0px"});
		window_cur_size	= 'phone';
	}
	
	
	function sliderSize(sHeight) {
		jQuery("#slider-wrapper").css('height',sHeight);
	}		
});

