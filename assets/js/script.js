jQuery(document).ready(function(){

	jQuery("#navigation_toggle").click(function(){
        jQuery("#megamenu").slideToggle();
        jQuery(this).toggleClass('active');
    });

    jQuery("#search_toggle").click(function(){
        jQuery("#searchform").slideToggle();
        jQuery(this).toggleClass('active');
        jQuery('#searchfield').focus();
    });

    jQuery("#ondernemers").bind("click", function() {
	    Cookies.remove('keuze','adviseurs');
	    Cookies.set('keuze', 'ondernemers');
	});

	jQuery("#adviseurs").bind("click", function() {
		Cookies.remove('keuze','ondernemers');
	    Cookies.set('keuze', 'adviseurs');
	});

	jQuery("#popup_ondernemers").bind("click", function() {
	    Cookies.remove('keuze','adviseurs');
	    Cookies.set('keuze', 'ondernemers');
	});

	jQuery("#popup_adviseurs").bind("click", function() {
		Cookies.remove('keuze','ondernemers');
	    Cookies.set('keuze', 'adviseurs');
	});

/* -- Specialist distance select
========================================== */

    var arr = [];
	var list = jQuery('.specialists_distance');

	jQuery('.gmw-distance-select option').each(function() {
		arr.push( jQuery(this).text() );
	});

	jQuery.each(arr, function(i) {
		jQuery('<li>').text(arr[i]).appendTo(list);
	});

	jQuery('.specialists_distance li').filter(
    function() {
        if( jQuery(this).text() == '---' || jQuery(this).text() == 'Choose color…'){
            jQuery(this).remove();
        }
    });

    //jQuery("#team_picture img").imagePanning();

	list.on("click", "li", function() {
	    jQuery('.gmw-distance-select').val( jQuery.trim(jQuery(this).text().toLowerCase().replace(/\s+/g, "-")));
	});

/*
	jQuery('.bureau_more').click(function () {
	    jQuery('#bureau_content').toggleClass('full');
	    jQuery(this).addClass('active');
	});
*/

	jQuery('.single_template_about_more').toggle(function() {
	    jQuery(this).text('Minder');
	    jQuery('.single_template_about').addClass('full');
	}, function() {
	    jQuery(this).text('Meer informatie');
	    jQuery('.single_template_about').removeClass('full');
	});

	jQuery('.specialists_distance li').click(function () {
	    jQuery('.specialists_distance li').not(this).removeClass('active');
	    jQuery(this).addClass('active');
	});

/* -- Slider
========================================== */

	jQuery('#slider').royalSlider({
		arrowsNav: true,
		loop: false,
		keyboardNavEnabled: true,
		controlsInside: false,
		imageScaleMode: 'fill',
		arrowsNavAutoHide: false,
		autoScaleSlider: true,
		autoScaleSliderWidth: 960,
		autoScaleSliderHeight: 350,
		controlNavigation: 'bullets',
		thumbsFitInViewport: false,
		navigateByClick: true,
		startSlideId: 0,
		autoPlay: false,
		transitionType:'move',
		globalCaption: false,
		slidesSpacing: 0,
		deeplinking: {
			enabled: true,
			change: false
		},
		/* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
		imgWidth: 1400,
		imgHeight: 680
	});

/* -- Home tour slider
========================================== */

	var rsi = jQuery('#home_tour_slider').royalSlider({
		autoHeight: false,
		arrowsNav: false,
		fadeinLoadedSlide: false,
		controlNavigationSpacing: 0,
		controlNavigation: 'bullets',
		imageScaleMode: 'fill',
		imageAlignCenter: true,
		loop: false,
		loopRewind: false,
		numImagesToPreload: 6,
		keyboardNavEnabled: true,
		autoScaleSlider: true,
		autoScaleSliderWidth: 486,
		autoScaleSliderHeight: 315,

		/* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
		imgWidth: 792,
		imgHeight: 479
	});

/* -- Logo carousel
========================================== */

	jQuery(".logo_carousel").owlCarousel({
		autoPlay: 5000, //Set AutoPlay to 3 seconds
		items : 4,
		itemsTablet: [768,4],
		itemsTabletSmall: [660,3],
		itemsMobile: [479,2],
		pagination: false
	});

/* -- Infinite scroll
========================================== */

    var infinite_scroll = {
		loading: {
			img: "https://www.mijnsubsidie.com/wp-content/themes/mijnsubsidie/assets/img/ajax-loader.gif",
			msgText: "",
			finishedMsg: ""
		},
		"nextSelector":".hidden_paging a",
		"navSelector":".hidden_paging",
		"itemSelector":".post",
		"contentSelector":"#posts"
	};
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );

/*
	jQuery('#posts').infinitescroll('unbind');

	jQuery('#load_more').on('click', function(e) {
		e.preventDefault();
		jQuery('#posts').infinitescroll('retrieve');
	});
*/

/* -- Tour more content
========================================== */

    jQuery(".tour_section .row").click(function() {
	    jQuery(".tour_more").stop().slideUp();
	    jQuery(this).toggleClass("active");
	    jQuery(this).next(".tour_more").stop().slideToggle().siblings(".tour_more").slideUp()
	});

/* -- Testimonials
========================================== */

	var testimonials = jQuery("#testimonials");
	var testimonials_nav = jQuery("#testimonials_nav");

	testimonials.owlCarousel({
		singleItem : true,
		slideSpeed : 1000,
		autoPlay: 10000,
		navigation: false,
		pagination:false,
		autoHeight: true,
		afterAction : syncPosition,
		responsiveRefreshRate : 200,
	});

	testimonials_nav.owlCarousel({
		items : 15,
		itemsDesktop      : [1199,10],
		itemsDesktopSmall     : [979,10],
		itemsTablet       : [768,8],
		itemsMobile       : [479,4],
		pagination:false,
		responsiveRefreshRate : 100,
		afterInit : function(el){
			el.find(".owl-item").eq(0).addClass("synced");
		}
	});

	function syncPosition(el){
		var current = this.currentItem;
		jQuery("#testimonials_nav")
		.find(".owl-item")
		.removeClass("synced")
		.eq(current)
		.addClass("synced")
		if(jQuery("#testimonials_nav").data("owlCarousel") !== undefined){
			center(current)
		}
	}

  function getUrlParameter(sParam)
	{
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++)
	    {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam)
	        {
	            return sParameterName[1];
	        }
	    }
	}

	var shared = getUrlParameter('gmw_post');

	if (shared) {
		jQuery('html, body').animate({
            scrollTop: jQuery("#gmw-address-field-wrapper-1").offset().top
        }, 1000);
	}

  jQuery("#testimonials_nav").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = jQuery(this).data("owlItem");
    testimonials.trigger("owl.goTo",number);
  });

  function center(number){
    var testimonials_navvisible = testimonials_nav.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in testimonials_navvisible){
      if(num === testimonials_navvisible[i]){
        var found = true;
      }
    }

    if(found===false){
      if(num>testimonials_navvisible[testimonials_navvisible.length-1]){
        testimonials_nav.trigger("owl.goTo", num - testimonials_navvisible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        testimonials_nav.trigger("owl.goTo", num);
      }
    } else if(num === testimonials_navvisible[testimonials_navvisible.length-1]){
      testimonials_nav.trigger("owl.goTo", testimonials_navvisible[1])
    } else if(num === testimonials_navvisible[0]){
      testimonials_nav.trigger("owl.goTo", num-1)
    }

  }
});
/* -- Shortcodes libs
========================================== */

(function(e){e.fn.extend({tabs:function(t){var n={type:"default",width:"auto",fit:true,closed:false,update_hash:false,auto:false,autoInterval:6e3,prev:"",next:"",pause_resume:"",activate:function(){}};var t=e.extend(n,t);var r=t,i=r.type,s=r.fit,o=r.width,u=r.update_hash,a="vertical",f="accordion";var l=window.location.hash;var c=!!(u&&window.history&&history.replaceState);e(this).bind("tabactivate",function(e,n){if(typeof t.activate==="function"){t.activate.call(n,e)}});this.each(function(){function h(){if(i==a){n.addClass("tabs_vertical")}if(s==true){n.css({width:"100%",margin:"0px"})}if(i==f){n.addClass("accordion_group");n.find(".tabs_nav").css("display","none")}}function T(e){r.find("[role=tab]").eq(e).trigger("click",["is_triggered"])}function N(){E=r.find(".active").index();E===w?E=0:E=E+1;T(E)}var n=e(this);var r=n.find("ul.tabs_nav");var u=n.attr("id");n.find("ul.tabs_nav li").addClass("tabs_nav_item");n.css({display:"block",width:o});n.find(".tabs_container > div").addClass("tabs_content");h();var p;n.find(".tabs_content").before("<span class='accordion_title' role='tab'><span class='accordion_icon'></span></span>");var d=0;n.find(".accordion_title").each(function(){p=e(this);var t=n.find(".tabs_nav_item:eq("+d+")");var r=n.find(".accordion_title:eq("+d+")");r.append(t.html());r.data(t.data());p.attr("aria-controls","tab_item-"+d);d++});var v=0,m;n.find(".tabs_nav_item").each(function(){$tabItem=e(this);$tabItem.attr("aria-controls","tab_item-"+v);$tabItem.attr("role","tab");var t=0;n.find(".tabs_content").each(function(){m=e(this);m.attr("aria-labelledby","tab_item-"+t);t++});v++});var g=0;if(l!=""){var y=l.match(new RegExp(u+"([0-9]+)"));if(y!==null&&y.length===2){g=parseInt(y[1],10)-1;if(g>v){g=0}}}e(n.find(".tabs_nav_item")[g]).addClass("active");if(t.closed!==true&&!(t.closed==="accordion"&&!r.is(":visible"))&&!(t.closed==="tabs"&&r.is(":visible"))){e(n.find(".accordion_title")[g]).addClass("active");e(n.find(".tabs_content")[g]).addClass("tabs_content-active").attr("style","display:block")}else{e(n.find(".tabs_content")[g]).addClass("tabs_content-active accordion_title-closed")}var b=r.find("[role=tab]").length;var w=b-1;var E;var S;var x=false;if(t.auto===true){S=setInterval(N,t.autoInterval);n.on({mouseenter:function(){if(x===false){clearInterval(S)}},mouseleave:function(){if(x!==true){S=setInterval(N,t.autoInterval)}}})}if(e(t.prev).length>0){e(t.prev).on("click",function(e){e.preventDefault();E=r.find(".active").index();E===0?E=w:E=E-1;T(E);n.trigger("prev_item")})}if(e(t.next).length>0){e(t.next).on("click",function(e){e.preventDefault();E=r.find(".active").index();E===w?E=0:E=E+1;T(E);n.trigger("next_item")})}if(e(t.pause_resume).length>0){e(t.pause_resume).on("click",function(n){n.preventDefault();if(x===false){x=true;clearInterval(S);e(t.pause_resume).trigger("paused")}else{x=false;S=setInterval(N,t.autoInterval);e(t.pause_resume).trigger("resumed")}})}n.find("[role=tab]").each(function(){var r=e(this);r.on("click",function(r,i){var s=e(this);var o=s.attr("aria-controls");if(s.hasClass("accordion_title")&&s.hasClass("active")){n.find(".tabs_content-active").slideUp("",function(){e(this).addClass("accordion_title-closed")});s.removeClass("active");return false}if(!s.hasClass("active")&&s.hasClass("accordion_title")){n.find(".active").removeClass("active");n.find(".tabs_content-active").slideUp().removeClass("tabs_content-active accordion_title-closed");n.find("[aria-controls="+o+"]").addClass("active");n.find(".tabs_content[aria-labelledby = "+o+"]").slideDown().addClass("tabs_content-active")}else{n.find(".active").removeClass("active");n.find(".tabs_content-active").removeAttr("style").removeClass("tabs_content-active").removeClass("accordion_title-closed");n.find("[aria-controls="+o+"]").addClass("active");n.find(".tabs_content[aria-labelledby = "+o+"]").fadeIn().addClass("tabs_content-active")}s.trigger("tabactivate",s);if(typeof S!=="undefined"&&typeof i==="undefined"){x=true;clearInterval(S);if(e(t.pause_resume).length>0){e(t.pause_resume).trigger("paused",["is_tab_clicked"])}}if(c){var a=window.location.hash;var f=u+(parseInt(o.substring(9),10)+1).toString();if(a!=""){var l=new RegExp(u+"[0-9]+");if(a.match(l)!=null){f=a.replace(l,f)}else{f=a+"|"+f}}else{f="#"+f}history.replaceState(null,null,f)}})});e(window).resize(function(){n.find(".accordion_title-closed").removeAttr("style")})})}})})(jQuery)