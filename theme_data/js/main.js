$('.baner').owlCarousel({
    items:1,
	loop:true,
	nav:false,
	dots:true,
	loop:true,
    margin:0,
	autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
	 smartSpeed:450
});	
$('.group').owlCarousel({
    items:1,
	loop:true,
	nav:false,
	loop:true,
    margin:0,
	
});

function menuOpen()
{ 
  $("nav.mobile-menu").show("slide", {direction:"left"},500);
}

function menuClose()
{ 
  $("nav.mobile-menu").hide("slide", {direction:"left"},500);
}
$('.slider-mobile').owlCarousel({
    items:1,
	loop:true,
	nav:false,
	dots:true,
	loop:true,
    margin:0,
	autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
	 smartSpeed:450
});	
 $('.customer-slider').owlCarousel({
    items:1,
	loop:true,
	nav:false,
	dots:true,
	loop:true,
    margin:0,
	autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
	 smartSpeed:450
});	
$( function() {
    $( "#button" ).on( "click", function() {
      $( "#effect" ).toggleClass( "new", 1000 );
    });
  } );
 
//--------------------------------------------//
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});

function datatoggle(t)
{
	$("#"+t).toggle();
}

$(document).ready(function(){

	$("#showMobileSearch").click(function(){
		$("#searchMobile").toggle("slide", { direction:"up"},500);
		//$("nav.mobile-menu").hide("slide", {direction:"left"},500);
		
	})
	
	//------------------------- IMAGE ACTIVE PRODUCTS DETAILS PAGE---------------------------//
	
	$(".magni").click(function(){
		$(".magni").removeClass('active');
		$(this).addClass('active');
		var src=$(this).attr('src');
		$(".block__pic").attr('src',src);
	})
})



$('.tab  ul li a').each(function(){

  $(this).click(function(e){
	  e.preventDefault();
  $(this).addClass('active');
  $(this).parent().siblings().children('a').removeClass('active');
  var l = $(this).attr('href');
  $('.tab-text').hide();
  $(l).show();
    }); 	

  });

$(document).ready(function(){
  $( ".frame-type" ).click(function(){
	  var id=$(this).attr('id');
	  //alert(id);
	  
	  var dis=$("."+id).css('display');
	  if(dis=='none')
	  {
	  $(".size-details").hide('fast');
	  $("."+id).slideToggle('fast');
	  }else
	  {
		  $(".size-details").hide('fast');
	  }
	 
  });
  
  //--------------WITH LENCE--------
  
  $(".checklence").click(function(){
	  var val=$(this).val();
	  if(val=='withlence')
	  {
		  $("#withlence").fadeIn();
	  }else{
		  $("#withlence").fadeOut();
	  }
  })
  
});




function mob1()
{ 
  $("nav.filter").show("slide", {direction:"left"},500);
}

function mob2()
{ 
  $("nav.filter").hide("slide", {direction:"left"},500);
}

$( function() {
    $( "#button" ).on( "click", function() {
      $( "#effect" ).toggleClass( "new", 1000 );
    });
  } );




$stick = $('aside');
$foot = $('footer');
margin = 20;
offtop = $stick.offset().top - margin;
offbtm = $foot.offset().top - ( margin*2 + $stick.height() );

$(window).scroll(function () {
	scrtop = $(window).scrollTop();
  if (scrtop > offtop && $stick.hasClass('natural')) {
    $stick.removeClass('natural').addClass('fixed').css('top', margin);
  }
  if (offtop > scrtop && $stick.hasClass('fixed')) {
    $stick.removeClass('fixed').addClass('natural').css('top', 'auto');
  }
  if (scrtop > offbtm && $stick.hasClass('fixed')) {
    $stick.removeClass('fixed').addClass('bottom').css('top', offbtm+margin);
  }
  if (offbtm > scrtop && $stick.hasClass('bottom')) {
    $stick.removeClass('bottom').addClass('fixed').css('top', margin);
  }
});


function mypopup() {
  $(".form-set").fadeIn('slow');
}
function popClose() {
  $(".form-set").fadeOut();
}

