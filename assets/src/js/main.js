$(document).ready(function(){
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		if ($('.menu-mobile').hasClass('opacity')) {
			$('.menu-mobile').removeClass('opacity');
		}
		else {
			$('.menu-mobile').addClass('opacity');
		}
		if ($(this).hasClass('open')) {
			$('html, body').css({
				overflow: 'hidden',
				height: '100vh'
			});
		}
		else {
			$('html, body').css({
				overflow: 'auto',
				height: 'auto'
			});
		}
	});

	let $h = $('.offers__tablature').height() + 50;
	let $h1 = $('.offers__content').height() + 100;

	$('.offers__content').css("top", $h + "px");
	$('.content__tablature').css("height", $h1 + "px");

	$('.offer').click(function(){
		$(".offer.active").removeClass("active");
		$(this).addClass('active');
	});

	$('.numbers__number').each(function () {
		$(this).prop('Licznik',0).animate({
			Counter: $(this).text()
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
});