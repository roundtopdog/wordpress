jQuery(document).ready(function(){
		jQuery('embed,object,iframe').wrap("<div class='video-container'></div>")
		var count_width_of_list=0;
       
		jQuery("#top-nav-list li,#top-nav > div > ul  li").hover(function(){
			jQuery(this).parent("ul").find("ul").slideUp(50);
			jQuery(this).parent("ul").children().removeClass("active");
			jQuery(this).addClass("active");
			if(jQuery(this).find("ul").length){jQuery(this).children("ul").slideDown("slow").addClass("opensub");}
		},function(){
			jQuery(this).parent("ul").children().removeClass("active");
			jQuery(this).parent("ul").children().children("ul").css('display','none');
			jQuery(this).parent("ul").find("ul").slideUp(50).stop();
			jQuery(".opensub").removeClass("opensub");
		});
	
	setTimeout(function(){
        if(jQuery(".phone .top-nav-list li.haschild").hasClass("current-menu-item")){
			jQuery(".phone .top-nav-list li.haschild > ul").css("display", "block");
		 }
		 if(jQuery(".phone .top-nav-list li.haschild").hasClass("current-menu-parent")){	 
			   jQuery(".phone.top-nav-list li.haschild > ul").css("display", "block");
		 }
		 if(jQuery(".phone .top-nav-list li.haschild").hasClass("current-page-parent")){
			   jQuery(".phone .top-nav-list li.haschild > ul").css("display", "block");
		 }
		 
		},1000);
	
		
		$("#top-posts-list .image-block").hover(function(){
			if($("#top-posts").hasClass("web")){
			$(this).stop(true, false).animate({		
				height: "210px",
				width: "320px",
				"margin-top":"-10px",
				"margin-bottom":"-10px",
			}, 300);
			}
	
			else if($("#top-posts").hasClass("tablet"))
			{
				$(this).animate({
				height: "210px",
				width: "235px",
				"margin-top":"-10px",
				"margin-bottom":"-10px",
			}, 300);
			
			
			}
			else if($("#top-posts").hasClass("phone"))
			{
				$(this).animate({
				height: "210px",
				width: "100%",
				"position":"relative",
				"margin-top":"-10px",
				"margin-bottom":"-10px",			
			}, 300);
			}
			
			return false;
		},function(){
		 if($("#top-posts").hasClass("web"))
			{
			
				$(this).animate({
				height: "180px",
				width: "320px",
				"margin-top":"10px",
				"margin-bottom":"0px",			
			}, 200);
			//$(this).children().removeAttr('height');
			}

			else if($("#top-posts").hasClass("tablet"))
			{
				$(this).animate({
				height: "180px",
				width: "235px",
				"margin-top":"10px",
				"margin-bottom":"0px",			
			}, 200);
			}
			else if($("#top-posts").hasClass("phone"))
			{
				$(this).animate({
				height: "180px",
				width: "100%",
				"position":"relative",
				"margin-top":"10px",
				"margin-bottom":"0px",			
			}, 200);
			}
			return false;
		}).stop();
		
		
		jQuery("header").on("click","#menu-button-block", function(){
			if(jQuery("#top-nav").hasClass("open")){
				jQuery("#top-nav").slideUp("fast");
				jQuery("#top-nav").removeClass("open");
				jQuery('.header-phone-block').css('display','block');
			}
			else{
				jQuery("#top-nav").slideDown("slow");
				jQuery("#top-nav").addClass("open");
				if(jQuery("body").hasClass("phone")){
					jQuery('.header-phone-block').css('display','none');
				}
			}
		});
		
		
		//in responsive js added size of staff-list-block
		function leftMove(){
			
			leftsize=jQuery('.staff-list-block').offset().left;
			if((jQuery('.staff-list').offset().left-jQuery('.staff-list-block').width()+jQuery('.staff-list').outerWidth())>=leftsize){
				clearInterval(goleft);
				return false;
			}
			jQuery('.staff-list-block').css({"left": "-=1px"});
			leftsize-=1;
		}
		
		
		function rightMove(){
			
			if(jQuery('.staff-list-block').offset().left>=jQuery('.staff-list').offset().left){
				clearInterval(goleft);
				return false;
			}
			jQuery('.staff-list-block').css({"left": "+=1px"});
			leftsize-=1;
		}
		
		var mobile   = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent); 
		windowsPhone = /windows phone/i.test(navigator.userAgent); 
		var clickstart = mobile ? "touchstart" : "mousedown";
		var clickend = mobile ? "touchend" : "mouseup";

		
		if(windowsPhone){
			jQuery(".staff-button-right").click(function(event){
				leftsize=jQuery('.staff-list-block').offset().left;
				if((jQuery('.staff-list').offset().left-jQuery('.staff-list-block').width()+jQuery('.staff-list').outerWidth())>=leftsize){
					clearInterval(goleft);
					return false;
				}
				jQuery('.staff-list-block').animate({"left": "-=50px"},500);
				leftsize-=100;
			});
				
			jQuery(".staff-button-left").click(function(event){
				if(jQuery('.staff-list-block').offset().left>=jQuery('.staff-list').offset().left){
				clearInterval(goleft);
				return false;
				}
				jQuery('.staff-list-block').animate({"left": "+=100px"},10);
				leftsize-=100;
			});
			
		}else{
			jQuery(".staff-button-right").bind(clickstart,function(event){
				goleft=setInterval(leftMove,5);
			}).bind(clickend,function(event) {
				clearInterval(goleft);
				return false;
			});
			
				
			jQuery(".staff-button-left").bind(clickstart,function(event){
				goright=setInterval(rightMove,5);
			}).bind(clickend,function(event) {
				clearInterval(goright);
				return false;
			});
		}
	 
});