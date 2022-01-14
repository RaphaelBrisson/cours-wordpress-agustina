<footer id="footer">
  <div class="wrap">
    <div class="footerContent">
      <div class="footerContact">
        <h3>Nous contacter</h3>
        <p class="footerText">Que vous ayez une question sur un événement, une potentielle inscription, n'hésitez pas à nous écrire !</p>
        <div class="footerContactItem">
          <img src="@asset('images/mail.png')" width="18" alt="mail">
          <p><a href="mailto:<?php echo antispambot(get_field('footerMail', 'option')); ?>"><?php echo antispambot(get_field('footerMail', 'option')); ?></a></p>
        </div>
        <div class="footerContactItem">
          <img src="@asset('images/phone.png')" width="18" alt="phone">
          <p></p>
          <div><a href="tel:<?php echo str_replace(' ', '', get_field('footerPhone', 'option')); ?>"><?php echo get_field('footerPhone', 'option'); ?></a></div>
        </div>
        <div class="footerContactItem">
          <img src="@asset('images/position.png')" width="18" alt="gps_position">
          <div><?php echo get_field('footerAddress', 'option'); ?></div>
        </div>
      </div>
      <div class="footerBureau">
        <h3 class="footerBureauTitle">Le bureau</h3>
        <div><?php echo get_field('footerBureau', 'option'); ?></div>
      </div>
    </div>
    <span class="footerCopyright">Les Vauriens ©<?php echo date('Y') ?></span>
  </div>

  <?php edit_post_link( 'Modifier', '', '', 0, 'editLink');  ?>
</footer>
