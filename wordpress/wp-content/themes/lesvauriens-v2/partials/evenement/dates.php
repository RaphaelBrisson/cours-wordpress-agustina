<?php
setlocale( LC_ALL, get_locale() . '.UTF-8' );
$debut = get_field('evenementDebut');
$fin = get_field('evenementFin');

if ( $debut === $fin ) : ?>
<?php setlocale(LC_TIME, "fr_FR"); ?>
	<div class="evenementDate">Le <?php echo strftime( '%d %B %Y', strtotime($fin) ); ?>
<?php else : ?>
	<div class="evenementDate"><?php echo 'Du ' . strftime( '%d %B %Y', strtotime($debut) ) . ' au ' . strftime( '%d %B %Y', strtotime($fin) ); ?>
<?php endif; ?>
<?php if( get_field('evenementRecurrent') ): ?> - Tous les ans<?php endif; ?>
</div>
