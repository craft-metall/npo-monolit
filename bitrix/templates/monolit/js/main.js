//Fancybox
$(document).ready(function() {
	$(".fancybox").fancybox({
		helpers: {
			title : {
				type : 'inside'
			}
		}
	});
});

//Isotop Filter
$(document).ready(function() {

        $('.objects').isotope({
            itemSelector: '.object'
        });

        $('#filter a').click(function(){
		
            $('#filter a').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
			
            $('.objects').isotope({
                filter: selector,
                animationOptions: {
                    duration: 1000,
                    easing: 'easeOutQuart',
                    queue: false
                }
            });
            return false;

        });

});

//mask in order
$(function(){
  $("#ORDER_PROP_4").mask("+7(999)999-9999");
});

	//mobile menu
!function (e, t, n) {
   "use strict";
    var r = e.querySelectorAll(".menu"), a = function (e, t) {
    var n = t.getAttribute("aria-hidden");
    "false" == n ? (e.setAttribute("aria-expanded", "false"), 
		            t.setAttribute("aria-hidden", "true") ) : 
		           (e.setAttribute("aria-expanded", "true"), 
		            t.setAttribute("aria-hidden", "false")
					);
    };
    [].forEach.call(r, function (e, t) {
    var n = e.nextElementSibling;
            e.setAttribute("aria-expanded", "false"), 
		    e.setAttribute("aria-controls", "button-menu-" + t), 
            n.setAttribute("aria-hidden", "true"), 
			n.setAttribute("aria-labelledby", "content-menu-" + t),
			n.setAttribute("tabindex", "0"), 
		e.addEventListener("click", function () {
            return a(this, n), !1;
        }, !1), e.addEventListener("keydown", function (e) {
            32 === e.which && (e.preventDefault(), a(this, n));
        }, !1);
    });
}(document, window);