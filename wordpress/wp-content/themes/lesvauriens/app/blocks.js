/**
 * Created by IRIS Interactive
 * User : IRIS Interactive
 */


/* Reset style
/* ============================================= */
wp.domReady( function(){
  wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
  wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
  wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
  wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
});

/* Code embed
/* ============================================= */
wp.domReady( function() {
  var blocks_embed = [
    'amazon-kindle',
    'animoto',
    'cloudup',
    'collegehumor',
    'crowdsignal',
    'dailymotion',
    // 'facebook',
    // 'flickr',
    'imgur',
    // 'instagram',
    'issuu',
    'kickstarter',
    'meetup-com',
    'mixcloud',
    'reddit',
    'reverbnation',
    'screencast',
    'scribd',
    'slideshare',
    'smugmug',
    // 'soundcloud',
    'speaker-deck',
    // 'spotify',
    'ted',
    'tiktok',
    'tumblr',
    // 'twitter',
    'videopress',
    //'vimeo'
    'wordpress',
    'wordpress-tv',
    //'youtube'
  ];

  for (var i = blocks_embed.length - 1; i >= 0; i--) {
    wp.blocks.unregisterBlockVariation('core/embed', blocks_embed[i]);
  }
} );
