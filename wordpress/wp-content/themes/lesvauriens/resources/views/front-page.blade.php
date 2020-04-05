@extends('layouts.app')

@section('content')
  <!-- @include('partials.page-header') -->
<section id="home_presentation">
    <img class="red_triangle" src="@asset('images/red_triangle.png')" alt="">
    <?php $blog_title = "Association ".get_bloginfo('name'); ?>
    <div class="wrap2">
      <h1><?php echo($blog_title) ?></h1>
      <img src="@asset('images/logo.png')" alt="">
      <p class="slogan">Une âme, un état d'esprit, de la convivialité !</p>
      <p>Association multi-activités : ludiques, sportives, semi-culturelles… partagées dans un esprit de convivialit).<br>Association de lien social, destinée principalement aux habitants de Vaux-en-Bugey.<br>Notre slogan : « Une âme, un état d’esprit, de la convivialité !! »</p>
      <p>{{ get_field('description_accueil') }}</p>
      <svg xmlns="http://www.w3.org/2000/svg" width="36.132" height="17.006" viewBox="0 0 36.132 17.006">
        <path id="Tracé_2" data-name="Tracé 2" d="M0,0,17.658,13.895,34.241,0" transform="translate(0.928 1.179)" fill="none" stroke="#F72C3F" stroke-width="3"/>
      </svg>
    </div>
</section> 
  
<section id="actualites" class="wrap">
  <div class="h2">
    <h2>Nos dernières actualités</h2>
    <span></span>
  </div>

  @php($posts = $articles)
  <div class="articles-container">
    @foreach($posts as $post)
      <article>
        <div>
          <h3 class="entry-title"><a href="{{ get_permalink($post->ID) }}">{{ get_field('titre_article', $post->ID) }}</a></h3>
          <div class="entry-summary">
            {{ get_the_excerpt($post->ID) }}
          </div>
          <p class="see-more"><a href="{{ get_permalink($post->ID) }}">Voir l'article</a></p>
        </div>
        <div>
          <img src="{{ get_the_post_thumbnail_url($post->ID, 'medium') }}" alt="">
        </div>
      </article>
    @endforeach
  </div>
  
  <div>
    <p class="display-more"><a href="<?= get_post_type_archive_link('post') ?>">AFFICHER PLUS</a></p>
  </div>
</section>

<section id="evenements" class="wrap">
  <div class="h2">
    <h2>Nos événements à venir pour 2020</h2>
    <span></span>
  </div>

  @php($posts = $evenements)
  <div>
    @foreach($posts as $post)
      <div class="evenement">
        <p>{{ get_field('date_evenement', $post->ID) }}</p>
        <h3>{{ get_field('titre_evenement', $post->ID) }}</h3>
        <p>{{ get_field('description_evenement', $post->ID) }}</p>
        @if(get_field('lien_externe_evenement', $post->ID))
        <p>Plus d’infos sur : <a href="{{ get_field('lien_externe_evenement', $post->ID) }}" target="_blank">{{ get_field('lien_externe_evenement', $post->ID) }}</a></p>
        @endif
      </div>
    @endforeach

  </div>
</section>
{!! get_the_posts_navigation() !!}
@endsection