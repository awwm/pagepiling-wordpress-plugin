(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	$(document).ready(function() {
			/*
			* Plugin intialization
			*/
	    	$('#pagepiling').pagepiling({
	          	direction: 'horizontal',
	    		menu: '#menu',
			loopBottom: true,
	    		anchors: [],
			sectionsColor: [],
			css3: true,
			navigation: false,
       			normalScrollElements: null,
        		normalScrollElementTouchThreshold: 7,
        		touchSensitivity: 7,
        		afterRender: function () {
				$.fn.pagepiling.setAllowScrolling(false, 'left, right');
                		$('.carWhite').show(); 
				 $('.scroll').fadeOut('fast');
      			 },

        		onLeave: function (index, nextIndex, direction) {
			   if (nextIndex === $('#pagepiling .section').length) {
				$("#exhaust").hide();
				} 
             	           if (nextIndex > 1) {
                		$('.carWhite').hide();
				$('.scroll').fadeIn(2000);
				$('.carRed').css("opacity", 0);
				$('.carRed').css("left", -300);
				window.setTimeout(function() {
					$('.scroll').addClass('pause'); 
					$("#exhaust").animate({opacity: 0 }, 1000, "linear");
  					}, 1750);
            			}
 			    if(nextIndex == 2 && direction =='down'){
				$('.carRed').css("display", "block"),
				$('.carRed').animate({left: 0, opacity: 1 }, 700, "linear");
				$('#exhaust').show().animate({left: 0, opacity: 1 }, 700, "linear");
				}
 			    if(nextIndex >1 && direction =='up'){
				$('.carRed').css("display", "block"),
				$('.carRed').animate({left: 0, opacity: 1 }, 700, "linear");
				$('#exhaust').show().animate({left: 0, opacity: 1 }, 700, "linear");
				}
		            if (nextIndex < 2) {
				$('.carRed').hide();
				$('.scroll').fadeOut('fast');
                		$('.carWhite').fadeIn(2000);
				$("#exhaust").hide();
            			}
 			    if(nextIndex == 2){
				$("#exhaust").css({"width": 200, "margin-right": -50, "margin-top": 50}); 
				}
 			    if(nextIndex == 3){
				$("#exhaust").css({"width": 160, "margin-right": -30, "margin-top": 60}); 
				}
 			    if(nextIndex == 4){
				$("#exhaust").css({"width": 120, "margin-right": -15, "margin-top": 85}); 
				}
 			    if(nextIndex == 5){
				$("#exhaust").css({"width": 80, "margin-right": -15, "margin-top": 100}); 
				}
 			    if(nextIndex == 6){
				$("#exhaust").css({"width": 40, "margin-right": -15, "margin-top": 115}); 
				}
 			    if(nextIndex > 6){
				$("#exhaust").css({"width": 0, "margin-right": 0, "margin-top": 50}); 
				}
       			 },
		});

	 });
	$(document).ready(function() {
	if ( $( '.page-1' ).hasClass( 'active' ) ) {
		$('#pagepiling').find('.slideBottom').addClass('clickCar'); 
		$('#pagepiling').find('#nextBtn').addClass('pEvent');
 	}
	});
	$('.nextBtn').add('.page-1').add('.clickCar').click(function() {
			$('.nxtPrevBtn').fadeOut('fast');
			$("#exhaust").css("opacity", 1);
			var movingCar = $(".carImage img");
     			window.setTimeout(function() { 
	                 	$('.scroll').removeClass('pause');
			}, 50);
			movingCar.animate({left: $('.section').width(), }, 1980, "linear", function() {
	    			movingCar.css("opacity", 0);
				movingCar.css("left", -300);

  			});

			window.setTimeout(function() {
      				$.fn.pagepiling.moveSectionDown();
	         	$('.scroll').on('webkitAnimationEnd', function () {
	             		$('.scroll').style.webkitAnimationPlayState = "paused";
	         	});
  			}, 2000);
     			window.setTimeout(function() { 
	                 	movingCar.animate({left: 0, opacity: 1 }, 1000, "linear");
			}, 100);
			window.setTimeout(function() {
			$('.nxtPrevBtn').fadeIn('slow');
  			}, 3000);

	});

	$( function() {
		var icons = {
			header: "ui-icon-triangle-1-e",
      			activeHeader: "ui-icon-triangle-1-s"
    		};
    		$( "#accordion" ).accordion({
      			icons: icons,
 			collapsible: true,
			heightStyle: "content" 
    		});
    		$( "#toggle" ).button().on( "click", function() {
      			if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        			$( "#accordion" ).accordion( "option", "icons", null );
      			} else {
        			$( "#accordion" ).accordion( "option", "icons", icons );
      			}
    		});
  	} );
	$('.prevBtn').click(function() {
		$('.nxtPrevBtn').fadeOut('fast');
    		$.fn.pagepiling.moveSectionUp();
		$('.nxtPrevBtn').fadeIn('slow');
	});

	var btn = document.getElementsByClassName("click-to-open"); 

	for (var i = 0; i < btn.length; i++) {
  		var thisBtn = btn[i];
  		thisBtn.addEventListener("click", function(){
    			var modal = document.getElementById(this.dataset.modal);
    			modal.style.display = "block";
			$('#pagepiling').find('.slideBottom').css("z-index", -1);
			$('#pagepiling').find('.nxtPrevBtn').css("z-index", -1);
		}, false); 
	}

	$('.modal-close').on('click', function(){
  		$('.modal').hide();
		$('#pagepiling').find('.slideBottom').css("z-index", 99);
		$('#pagepiling').find('.nxtPrevBtn').css("z-index", 99);
	});

	// When the user clicks anywhere outside of the modal, close it
	//window.onclick = function(event) {
  	//	if (event.target.className == 'modal') {
    	//		$('.modal').hide();
  	//	}
	//}


})( jQuery );
