<header class="banner">
  <div class="container">

    <nav class="nav-primary wrap2">
      @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav2']) !!}
      @endif
    </nav>
  </div>
  <button class="hamburger hamburger--spin" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <a href="<?= get_home_url() ?>"><img class="logo-top-left" src="@asset('images/logo2.png')"alt="logo-small"></a>
</header>
