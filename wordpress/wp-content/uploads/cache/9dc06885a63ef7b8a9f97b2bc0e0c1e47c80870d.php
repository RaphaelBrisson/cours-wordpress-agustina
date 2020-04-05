<header class="banner">
  <div class="container">

    <nav class="nav-primary wrap2">
      <?php if(has_nav_menu('primary_navigation')): ?>
        <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']); ?>

      <?php endif; ?>
    </nav>
  </div>
  <img class="logo-top-left" src="<?= App\asset_path('images/logo2.png'); ?>"alt="logo-small">
</header>
