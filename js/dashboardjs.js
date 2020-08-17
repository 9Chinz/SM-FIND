$(function(){
 
(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('.sidebar').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('.sidebar').collapse('hide')
})

})