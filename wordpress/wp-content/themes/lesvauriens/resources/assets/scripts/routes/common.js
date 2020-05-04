export default {
	init() {
	// JavaScript to be fired on all pages
	this.smoothScroll();
	this.responsiveMenu();
	},

	smoothScroll () {
	  $("a").on('click', function(event) {

	    if (this.hash !== "") {
	      event.preventDefault();

	      let hash = this.hash;

	      $('html, body').animate({
	        scrollTop: -50 + $(hash).offset().top
	      }, 500, () => {
	        // Ajoute le hash (#) à l'URL quand le scroll est terminé
	        window.location.hash = -50 + hash;
	      });
	    }
	  $('.h2 span').css('width', '0%');
	  $('.h2 span').animate({'width':'100%'}, 1000);

	  });
	},

	responsiveMenu () {
		$('.hamburger').click(function() 
		{
			if($(this).hasClass('is-active') == false) 
			{
				$(this).toggleClass('is-active');
				$('.banner .nav').css('display', 'flex');
				$('.banner .nav2').css('display', 'flex');
				$('.banner .nav3').css('display', 'flex');
			}
			else
			{
				$(this).toggleClass('is-active');
				$('.banner .nav').css('display', 'none');
				$('.banner .nav2').css('display', 'none');
				$('.banner .nav3').css('display', 'none');
			}
		});

		if (window.screen.width <= 980)
		{
			$('.banner .nav a').click(function()
			{
				$('.hamburger').removeClass('is-active');
				$('.banner .nav').css('display', 'none');
			});

			$('.banner .nav2 a').click(function()
			{
				$('.hamburger').removeClass('is-active');
				$('.banner .nav2').css('display', 'none');
			});

			$('.banner .nav3 a').click(function()
			{
				$('.hamburger').removeClass('is-active');
				$('.banner .nav3').css('display', 'none');
			});
		}

		// Menu 1
		$('.nav-primary .nav li:nth-child(4)').after("<span>");
		$('.nav-primary .nav li:nth-child(6) a').attr("target","_blank");
		$('.nav-primary .nav li:nth-child(7) a').attr("target","_blank");

		//Menu 2
		$('.nav-primary .nav2 li:nth-child(1)').after("<span>");
		$('.nav-primary .nav2 li:nth-child(4)').after("<span>");
		$('.nav-primary .nav2 li:nth-child(6) a').attr("target","_blank");
		$('.nav-primary .nav2 li:nth-child(7) a').attr("target","_blank");
	},

	finalize() {
	// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
