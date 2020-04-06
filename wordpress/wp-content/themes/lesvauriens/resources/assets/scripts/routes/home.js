export default {
	init() {
	// JavaScript to be fired on the home page
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
			}
			else
			{
				$(this).toggleClass('is-active');
				$('.banner .nav').css('display', 'none');
			}
		});
	},

	finalize() {
	// JavaScript to be fired on the home page, after the init JS

	},
};

