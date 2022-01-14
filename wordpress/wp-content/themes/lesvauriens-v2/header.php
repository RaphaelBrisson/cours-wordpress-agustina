<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8"/>
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Le site web de l'association Les Vauriens. Notre slogan : « Une âme, un état d’esprit, de la convivialité !! »">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo get_theme_file_uri('/assets/dist/img/favicon.png') ?>"/>
	<?php wp_head(); ?>
    <!--	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" type="text/css" media="screen" />-->
</head>

<body <?php body_class(); ?> id="body">

    <div class="container" role="document">

        <div class="content">
            <main class="main">
                <header class="header">
                    <div class="burger">
                        <button class="burgerItem">
                            <span class="sr-only"><?php _e( 'Menu', DOMAIN ); ?></span>
                            <span class="burgerItemBar--1"></span>
                            <span class="burgerItemBar--2"></span>
                            <span class="burgerItemBar--3"></span>
                        </button>
                    </div>

                    <a href="<?= get_home_url() ?>"><img class="logo-top-left" src="<?php echo get_theme_file_uri('/assets/dist/img/logo2.png') ?>" alt="logo-small"></a>

                    <nav class="nav-primary">
                        <div class="wrap">
                            <?php if (has_nav_menu('primary_navigation')):
                                wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
                            endif; ?>
                        </div>
                    </nav>

                    <form class="searchForm" role="search" method="get" action="<?php echo home_url(); ?>">
                        <input class="searchInput" type="text" value="<?php echo get_search_query(); ?>" name="s" id="searchFormText" placeholder="Rechercher">
                        <button class="searchButton"><span class="sr-only">Rechercher</span></button>
                    </form>

                </header>


