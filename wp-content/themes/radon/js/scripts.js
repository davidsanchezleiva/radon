$( document ).ready(function() {
	$('.slidesjs-container').find('img').each(function(i, obj){
		if (obj.clientHeight <= 0){
			obj.style.height = obj.offsetParent.clientHeight + 'px';
		}
	});
	$('.qtranxs_text_en span').text('EN');
	$('.qtranxs_text_es span').text('ES');
	$('a.dropdown-toggle, .dropdown-menu a').on('touchstart', function(e) { e.stopPropagation(); }); 
	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
});
(function($){
      $( document ).ready(function() {
        $(".testimonial").slidesjs({
          width: 960,
          height: 400,
          play: { auto: true, effect: "fade", interval: 7000},
          navigation: { active: false},
          pagination: { active: false},
          effect: {
            fade: {
              speed: 800
            }
          }
        });
      });
    })(jQuery);
$(window).load(function() {
	var widthmenu = $('#menu-main').parent('nav').outerWidth();
	var widthbody = $('body').outerWidth() - 1;
	/*var css ="";
	$('.page-id-8 h3').each(function(index, value){
		css += '.page-id-8 h3:nth-of-type(' + index + '):before{margin-bottom:' + $(this).outerHeight()/1.65 + 'px;}';
		console.log($(this).outerHeight());
	});
	$('head').append('<style>' + css + '</style');*/
	if(widthbody >960) {
		$('.logo').css('width', widthbody - widthmenu );
		$(window).resize(function() {
			var widthmenu = $('#menu-main').parent('nav').outerWidth();
			var widthbody = $('body').outerWidth() - 1;
			$('.logo').css('width', widthbody - widthmenu );
		});
	}
});