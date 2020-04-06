@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <?= get_search_form() ?>

  <section id="all-posts" class="wrap">
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
  </section>


  {!! get_the_posts_navigation() !!}
  {!! get_the_posts_pagination() !!}
@endsection
