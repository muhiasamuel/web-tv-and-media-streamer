(function ($) {
	"use strict";
	
	/*----------------------------
    Responsive menu Active
    ------------------------------ */
	$(".mainmenu ul#primary-menu").slicknav({
		allowParentLinks: true,
		prependTo: '.responsive-menu',
	});
	
	/*----------------------------
    START - Scroll to Top
    ------------------------------ */
	$(window).on('scroll', function() {
		if ($(this).scrollTop() > 600) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	$('.scrollToTop').on('click', function () {
		$('html, body').animate({scrollTop : 0},2000);
		return false;
	});
	$('.menu-area ul > li > .theme').on('click', function () {
		$('.buy-ticket').show();
		return false;
	});
	$('.buy-ticket .buy-ticket-area > a').on('click', function () {
		$('.buy-ticket').hide();
		return false;
	});
	$('.login-popup').on('click', function () {
		$('.login-area').show();
		return false;
	});
	$('.login-box > a').on('click', function () {
		$('.login-area').hide();
		return false;
	});
	
	/*----------------------------
    START - Slider activation
    ------------------------------ */
	var heroSlider = $('.hero-area-slider');
	heroSlider.owlCarousel({
		loop:true,
		dots: true,
		autoplay: true,
		autoplayTimeout:2000,
		nav: false,
		items: 1,
		responsive:{
			992:{
				dots: true,
			}
		}
	});
	heroSlider.on('changed.owl.carousel', function(property) {
		var current = property.item.index;
		var prevRating = $(property.target).find(".owl-item").eq(current).prev().find('.hero-area-slide').html();
		var nextRating = $(property.target).find(".owl-item").eq(current).next().find('.hero-area-slide').html();
		$('.thumb-prev .hero-area-slide').html(prevRating);
		$('.thumb-next .hero-area-slide').html(nextRating);
	});
	$('.thumb-next').on('click', function() {
		heroSlider.trigger('next.owl.carousel', [300]);
		return false;
	});
	$('.thumb-prev').on('click', function() {
		heroSlider.trigger('prev.owl.carousel', [300]);
		return false;
	});
	var newsSlider = $('.news-slider');
	newsSlider.owlCarousel({
		loop:true,
		dots: true,
		autoplay: true,
		autoplayTimeout:1500,
		nav: false,
		responsive:{
			0:{
				items: 1,
				margin: 0
			},
			576:{
				items: 2,
				margin: 10
			},
			768:{
				items: 3,
				margin: 15
			},
			992:{
				items: 4,
				margin: 18,
				dots:false
			}
		}
	});
	newsSlider.on('changed.owl.carousel', function(property) {
		var current = property.item.index;
		var prevRating = $(property.target).find(".owl-item").eq(current).prev().find('.single-news').html();
		var nextRating = $(property.target).find(".owl-item").eq(current).next().find('.single-news').html();
		$('.news-prev .single-news').html(prevRating);
		$('.news-next .single-news').html(nextRating);
	});
	$('.news-next').on('click', function() {
		newsSlider.trigger('next.owl.carousel', [300]);
		return false;
	});
	$('.news-prev').on('click', function() {
		newsSlider.trigger('prev.owl.carousel', [300]);
		return false;
	});
	var videoSlider = $('.video-slider');
	videoSlider.owlCarousel({
		loop:true,
		dots: true,
		autoplay: true,
		autoplayTimeout:2000,
		nav: false,
		responsive:{
			0:{
				items: 1,
				margin: 0
			},
			576:{
				items: 2,
				margin: 30
			},
			768:{
				items: 3,
				margin: 30
			},
			992:{
				items: 4,
				margin: 30
			}
		}
	});
	var relatedSlider = $('.related-slider');
	relatedSlider.owlCarousel({
		loop:true,
		dots: false,
		autoplay: true,
		autoplayTimeout:4500,
		nav: false,
		responsive:{
			0:{
				items: 1,
				margin: 0,
				autoplayTimeout:2000,
			},
			576:{
				items: 2,
				margin: 10
			},
			768:{
				items: 3,
				margin: 15
			},
			992:{
				items: 4,
				margin: 18,
			}
		}
	});
	
	/*----------------------------
	START - videos popup
	------------------------------ */
	$('.popup-youtube').magnificPopup({type:'iframe'});
	//iframe scripts
	$.extend(true, $.magnificPopup.defaults, {  
		iframe: {
			patterns: {
				//youtube videos
				youtube: {
					index: 'youtube.com/', 
					id: 'v=', 
					src: 'https://www.youtube.com/embed/%id%?autoplay=1' 
				}
			}
		}
	});
    
	var navpos = $('.header').offset();
	$(window).bind('scroll', function() {
	  if ($(window).scrollTop() > 11 ) {
		$('.header').css({"background-color": "#13151f" ,"position": "sticky","z-index": 200,"transform": "translateY(-50%)", });		
	  } else {
		$('.header').css({"background-color": "#13151f","transform": "translateY(-1%)","position": "relative"});
	
	  }
	});

	$('.toggle-share').click(function(){
		$('.social-send').toggle();
	})

        $('i.icofont-thumbs-up').click(function(){   
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

            var id = $(this).parents(".panel").attr('id');

            $.ajax({
               type:'POST',
               url:'/like',
               data:{id:id},
               success:function(data){
				$('#liked'+id).html('<p style="font-size:11px; left:2px; position:absolute;top:14px;color:black; " class="alert alert-danger">unLiked</p>');
                  
               }
            });

			$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox();
			}); 
                                              
    });
	$('i.icofont-thumbs-down').click(function(){   
			
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var id = $(this).parents(".panel").attr('id');

		$.ajax({
		   type:'POST',
		   url:'/like',
		   data:{id:id},
		   success:function(data){
			$('#liked'+id).html('<p style="font-size:11px; position:absolute;top:14px;color:black; " class="alert alert-success">Liked</p>');
			  
		   }
		});

		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		}); 
										  
});

	
	
	$('.icofont-minus').click(function(){


		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var id = $(this).parents(".fav").attr('id');
		$.ajax({
		 type:'POST',
		   url:'/favourite',
		   data:{id:id},
		   success:function(){
					$('#'+id).html('<p style="font-size:11px; left:2px; position:relative " class="alert alert-danger">Removed from watchlist</p>');
				
			}
		});

		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});
	});



	$(' .icofont-plus').click(function(){


		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var id = $(this).parents(".fav").attr('id');
		$.ajax({
		 type:'POST',
		   url:'/favourite',
		   data:{id:id},
		   success:function(){
					$('#'+id).html('<p style="font-size:11px; left:2px; position:relative" class="alert alert-success">Added To watchlist</p>');
				
			}
		});

		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});
	});

	
	/*----------------------------
    START - Isotope
    ------------------------------ */
    jQuery(".portfolio-item").isotope();
    $(".portfolio-menu li").on("click", function(){
      $(".portfolio-menu li").removeClass("active");
      $(this).addClass("active");
      var selector = $(this).attr('data-filter');
      $(".portfolio-item").isotope({
        filter: selector
      })
    });
	
	/*----------------------------
    START - Preloader
    ------------------------------ */
	jQuery(window).load(function(){
		jQuery("#preloader").fadeOut(500);
	});
	

}(jQuery));