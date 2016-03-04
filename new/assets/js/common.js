$(function() {
	


	$('.main-menu li').hover(function(){
		$('.main-menu li').removeClass('active');
		$(this).addClass('active');
	}, function() {
		$('.main-menu li').removeClass('active');
		$('.main-menu li[data-active=1]').addClass('active');
	});


});
(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
 }})();