@extends('layouts.app2')

@section('content')
<!--   @include('partials.page-header') -->

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Aucun résultat trouvé :(', 'sage') }}
    </div>
  @endif
  
  <section id="all-posts" class="wrap">
    
    <div class="h2">
      <h1>Résultats pour : <?= $_GET["s"] ?></h1>
    </div>
  
    <?= get_search_form() ?>

    <div class="articles-container">
      @while (have_posts()) @php the_post() @endphp
      <article>
        <div>
          <h3 class="entry-title"><a href="{{ get_permalink($post->ID) }}">{{ get_field('titre_article', $post->ID) }}</a></h3>
          <div class="entry-summary">
            {{ get_the_excerpt($post->ID) }}
          </div>
        </div>
        <div>
          <img src="{{ get_the_post_thumbnail_url($post->ID, 'medium') }}" alt="">
          <p class="see-more-small"><a href="{{ get_permalink($post->ID) }}">Voir l'article</a></p>
        </div>
      </article>
      @endwhile
    </div>

    {!! get_the_posts_pagination() !!}

    <div>
      <p class="display-more"><a href="<?= get_post_type_archive_link('post') ?>">TOUS LES ARTICLES</a></p>
    </div>

  </section>
@endsection
