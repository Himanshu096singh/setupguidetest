/*************************************
@@File: Listing Hub  Template Custom Js

All custom js files contents are below
**************************************
* 01. Bottom To Top Scroll Script
* 02. Testimonial 1 Script
* 03. Testimonial 2 Script
* 04. Listing Slide
* 05. Category Slide
* 06. Counter Script
* 07. Add field Script
**************************************/
(function($){
	"use strict";

	/*---- Bottom To Top Scroll Script ---*/
	$(window).on('scroll', function() {
		var height = $(window).scrollTop();
		if (height > 100) {
			$('#back2Top').fadeIn();
		} else {
			$('#back2Top').fadeOut();
		}
	});
	
	$("#back2Top").on('click', function(event) {
		event.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	
	
	/*----coockies apply----*/
// 	$(window).on('scroll', function(){
// 	   var height = $(window).scrollTop();
// 	   if(height>200){
// 	       $('.fix-social').fadeIn();
// 	            }
// 	    else{
// 	         $('.fix-social').fadeOut();
// 	    }
	  
// 	});
	
	/*----End coockies apply----*/	
	
	/*------ Testimonial 1 Script ----*/
	$('.slick-carousel').slick({
	  slidesToShow:1,
	  arrows: false,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerPadding: '40px',
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*------ Testimonial 2 Script ----*/
	$('.slick-carousel-2').slick({
	  slidesToShow: 3,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerPadding: '40px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*------ Testimonial 3 Script ----*/
	$('.slick-carousel-3').slick({
	   infinite: true,
  		slidesToShow: 6,
 		arrows: false,
 		dots:false,
 		responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  
        ]

		});
		
	/*------ Testimonial 3 Script ----*/
	$('.slick-carousel-4').slick({
	    loop: true,
  		slidesToShow: 6,
  		 slidesToScroll:3,
 		arrows: false,
 		dots:false,
 		responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
     {
      breakpoint: 420,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  
        ]

		});
		
		/*------ Testimonial 5 Script ----*/
	$('.slick-carousel-5').slick({
	    infinite: true,
  		slidesToShow: 1,
 		arrows: true,
 		dots:false,
 	    autoplay: true,
 	    padding:10,
 		responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  
        ]

		});
	
	/*--- Listing Slide ---*/
	$('.list-slide').slick({
	  centerMode: true,
	  centerPadding: '60px',
	  slidesToShow: 3,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*--- Trending Slide ---*/
	$('.trending-slick').slick({
	  centerMode: true,
	  centerPadding: '0px',
	  slidesToShow: 3,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '0px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '0px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*---- Category Slide ---*/
	$('.category-slide').slick({
	  centerMode: true,
	  centerPadding: '60px',
	  slidesToShow: 3,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*----- Counter Script ------*/
	$('.cto').counterUp({
		delay: 80,
		time: 5000
	});
	
	/*-----Add field Script------*/
	$('.extra-field-box').each(function() {
	var $wrapp = $('.multi-box', this);
	$(".add-field", $(this)).on('click', function() {
		$('.dublicat-box:first-child', $wrapp).clone(true).appendTo($wrapp).find('input').val('').focus();
	});
	$('.dublicat-box .remove-field', $wrapp).on('click', function() {
		if ($('.dublicat-box', $wrapp).length > 1)
			$(this).parent('.dublicat-box').remove();
		});
	});

})(jQuery);