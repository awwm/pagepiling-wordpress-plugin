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
             	           if (nextIndex > 1) {
                		$('.carWhite').hide();
				$('.nextBtn #text').text("Next >");
				$('.scroll').fadeIn(2000);
				$('.carRed').css("opacity", 0);
				$('.carRed').css("left", -300);
				window.setTimeout(function() {
				$('.scroll').addClass('pause'); 
  				}, 2000);
            			}
 			    if(nextIndex == 2 && direction =='down'){
				$('.carRed').css("display", "block"),
				$('.carRed').animate({left: 0, opacity: 1 }, 700, "linear");
				}
 			    if(nextIndex >1 && direction =='up'){
				$('.carRed').css("display", "block"),
				$('.carRed').animate({left: 0, opacity: 1 }, 700, "linear");
				}
		            if (nextIndex < 2) {
				$('.nextBtn #text').text("Start >");
				$('.carRed').hide();
				$('.scroll').fadeOut('fast');
                		$('.carWhite').fadeIn(2000); 
            			}
       			 },
		});

	 });
	$('.nextBtn').click(function() {
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
			

	});


	$('.prevBtn').click(function() {
    		$.fn.pagepiling.moveSectionUp();
	});

	var btn = document.getElementsByClassName("click-to-open"); 

	for (var i = 0; i < btn.length; i++) {
  		var thisBtn = btn[i];
  		thisBtn.addEventListener("click", function(){
    			var modal = document.getElementById(this.dataset.modal);
    			modal.style.display = "block";
		}, false); 
	}

	$('.modal-close').on('click', function(){
  		$('.modal').hide();
	})

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
  		if (event.target.className == 'modal') {
    			$('.modal').hide();
  		}
	}

})( jQuery );
