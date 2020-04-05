<header class="banner">
  <div class="container">

    <nav class="nav-primary wrap2">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
  <img class="logo-top-left" src="@asset('images/logo2.png')"alt="logo-small">
</header>
