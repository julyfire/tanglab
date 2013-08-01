// show billboard info on hover
$(function() {
	infoFade();
	logoHover();
});

function infoFade() {	
	$('.picture a').hover(
		function () {
        	$(this).find('strong').fadeIn('normal');
        	},
        function () {
        	$(this).find('strong').fadeOut('normal');
      	}
	);
}

function logoHover() {	
	$('#logo-type').hover(
		function () {
        	$('#logo-mark').addClass('logo-over');
        	},
        function () {
        	$('#logo-mark').removeClass('logo-over');
      	}
	);
}