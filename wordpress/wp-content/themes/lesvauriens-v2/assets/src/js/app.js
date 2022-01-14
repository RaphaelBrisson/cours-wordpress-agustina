import { Fancybox } from "@fancyapps/ui";
import LazyLoad from "vanilla-lazyload";
import '@lesvauriens/scss/app.scss';


$(document).ready(function() {
	smoothScroll();
	lazyLoad();
	search();
	fancybox();
	burger();
});

function lazyLoad() {
	const lazyLoadInstance = new LazyLoad({
		elements_selector: '[data-src]',
		threshold: 0,
	});
}

function fancybox() {
	$( 'article a:has(>img):not([target="_blank"]):not("[nofancybox]")' ).each( function () {

		const href = $( this ).attr( 'href' );

		if ( href.match( /(.jpg|.jpeg|.png|.gif|.svg|.webp)$/ ) ) {
			$( this ).attr( 'data-fancybox', 'fancybox' );
		} else {
			if ( href.indexOf( Theme.server_url ) === -1 ) {
				$( this ).attr( 'target', '_blank' );
			}
		}
	} );

	let counter = 0;
	$( 'article .wp-block-gallery' ).each( function () {
		counter++;
		$( this ).find( 'a:has(>img)' ).attr( 'data-fancybox', 'wp-block-gallery-' + counter );
	} );

	counter = 0;
	$( 'article .wp-block-image' ).each( function () {
		counter++;
		$( this ).find( 'a:has(>img)' ).attr( 'data-fancybox', 'wp-block-image-' + counter );
	} );

	Fancybox.bind("[data-fancybox]", {
		l10n : {
			CLOSE: "Fermer",
			NEXT: "Suivant",
			PREV: "Précédent",
			MODAL: "Appuyer sur Echap pour fermer",
			ERROR: "Erreur, réessayer",
			IMAGE_ERROR: "Image non trouvée",
			ELEMENT_NOT_FOUND: "Élément non trouvé",
			TOGGLE_ZOOM: "Zoom",
			TOGGLE_SLIDESHOW: "Diaporama",
			TOGGLE_FULLSCREEN: "Plein écran",
			TOGGLE_THUMBS: "Miniatures",
		},
		caption: function ( instance, item ) {
			let caption = $( this ).closest( 'figure' ).find( 'figcaption' ).html();

			if ( !caption ) {
				caption = $( this ).find( 'img' ).attr( 'title' );
			}

			if ( !caption ) {
				caption = $( this ).find( 'img' ).attr( 'alt' );
			}

			return caption;
		}
	});
}

function smoothScroll() {
	const trigger = 'a';

	$( document ).on( 'click', trigger, function ( ) {

		const target = $(this).attr("href"),
			duration = 1000,
			scroll_top = $( target ).offset().top;

		$( 'html, body' ).animate( {
			scrollTop: scroll_top
		}, {
			duration: duration,
			step: ( now, fx ) => {
				let real_pos = scroll_top;
				if ( fx.end !== real_pos ) {
					fx.end = real_pos;
				}
			}
		});
	})
}

function search() {
	const trigger = '.searchButton',
		$element = $('.searchInput');

	$(document).on('click', trigger, function(e) {

		$($element).toggleClass('active');

		if( $($element).hasClass('active') ) {
			e.preventDefault();
		}
	});
}

function burger() {
	const trigger = $('.burger');

	$(trigger).on( 'click', function ( e ) {
		$('body').toggleClass('menuOpened');
	} );

	$('.nav a').on( 'click', function ( e ) {
		$('body').removeClass('menuOpened');
	} );
}
