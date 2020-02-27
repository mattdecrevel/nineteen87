/* 
 * The main jQuery functions for our site
 *
 * @author goBRANDgo@gbg
 * 
 */

jQuery(function($){
                
             /*! ^# Document.ready */
            $(document).ready(function() { 
	            
	            if(isMobile.any()){
				    $('body').addClass("isMobileDevice");
				}
				                
                /*! -- ^# Scroll on GF Submit */
                if ( $('.gform_confirmation_wrapper')[0] ) {
                    var dest = $('.gform_confirmation_wrapper').offset().top - $('header').height();
                    $('html,body').animate({scrollTop:dest}, 1000, 'swing');
                }
                if ( $('.gform_validation_error')[0] ) {
                    var dest = $('.gform_validation_error').offset().top - $('header').height();
                    $('html,body').animate({scrollTop:dest}, 1000, 'swing');
                }
                
                if ( $('.default-form')[0] ) {
	                
	                $('.default-form textarea').each(function() {
						var thisID = "#" + $(this).attr('id');
						$(thisID).autoGrow();
					});
					
					$('.default-form .ginput_container_fileupload').each(function(i) {
						$(this).prev('label').addClass('file-label');
						var label = $(this).prev('label').text();
						$(this).parent().prepend('<label>'+label+'</label>');
						$(this).prev('label').text('Select File');
					});
					
	            }//default forms
				
            }); //! ^# end document.ready
            
            /*! ^#ON Resize */
			// menu resizing fixes
			var oldWidth = $(window).width();
        	$(window).on('resize', function(){
	        	
	        	/* -- INSERT CODE HERE -- */
	        	
	        	oldWidth = $(window).width();
	        }); //end window.resize
            
            /*! ^#ON scroll */
			$(window).scroll(function(){
				
				/* -- INSERT CODE HERE -- */
				
			}); //end Window.scroll
            
            /*! ^#Is Element in Viewport Function */
			function isElementInViewport (el) {
			
			    var win = $(window);
			
			    var viewport = {
			        top : win.scrollTop(),
			        left : win.scrollLeft()
			    };
			    
			    viewport.right = viewport.left + win.width();
			    viewport.bottom = viewport.top + win.height();
			
			    var bounds = el.offset();
			    bounds.right = bounds.left + el.outerWidth();
			    bounds.bottom = bounds.top + el.outerHeight();
			
			    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));			
			
			}//is element in viewport
            
			/*! ^#Scroll To Function */
            function scrollPageTo( destination ) {
	            var dest = destination.offset().top - $('header').height();
	            $('html,body').animate({scrollTop:dest}, 1000, 'swing');
            }
              
});


/* 
 * Tests if the site is being viewed on a mobile device. If so, adds the class "isMobileDevice" to 
 * the body tag. 	
*/
/*! ^# isMobile Function */

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};