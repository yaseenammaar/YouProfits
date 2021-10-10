

$('.owl-carousel').owlCarousel({
	items:1,
	loop:true,
	nav:true,
	dots:false
    
});

$('.sub-menu').each(function(){

var h = $(this).parent().children('a');

$('<div class="child"></div>').appendTo(h);



});

$('.menu > li > a').each(function(){
	$(this).click(function(){
		$(this).parent().toggleClass('active-sub-menu');
		$(this).parent().siblings().removeClass('active-sub-menu');
	});
});



$('.accordin>h1').click(
function(){
	$(this).next().slideToggle();
	$(this).toggleClass('active');
	$(this).parent().parent().siblings().children().find('.accordin-content').slideDown();
	$(this).parent().parent().siblings().children().find('h1').removeClass('active');
}

);








