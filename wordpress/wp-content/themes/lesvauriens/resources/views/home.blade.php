@extends('layouts.app')

@section('content')
<!--   @include('partials.page-header') -->

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Aucun résultat trouvé :(', 'sage') }}
    </div>
  @endif

  <section id="all-posts" class="wrap">

    <div class="h2">
      <h1>Tous nos articles</h1>
    </div>

    <?= get_search_form() ?>

    <div class="articles-container">
      @while (have_posts()) @php the_post() @endphp
      <article>
        <div>
          <h3 class="entry-title"><a href="{{ get_permalink($post->ID) }}">{{ get_field('titre_article', $post->ID) }}</a></h3>
          <div class="entry-summary">
            <p><strong>Le {{ get_field('date_sujet_article', $post->ID) }}</strong> -
            {{ get_the_excerpt($post->ID) }}</p>
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

  </section>
@endsection
