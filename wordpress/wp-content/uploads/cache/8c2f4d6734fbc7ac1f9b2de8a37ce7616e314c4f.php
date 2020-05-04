<header class="banner">
  <div class="container">

    <nav class="nav-primary wrap2">
      <?php if(has_nav_menu('single_navigation')): ?>
        <?php echo wp_nav_menu(['theme_location' => 'single_navigation', 'menu_class' => 'nav3']); ?>

      <?php endif; ?>
    </nav>
  </div>
  <button class="hamburger hamburger--spin" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <a href="<?= get_home_url() ?>"><img class="logo-top-left" src="<?= App\asset_path('images/logo2.png'); ?>"alt="logo-small"></a>
</header>
