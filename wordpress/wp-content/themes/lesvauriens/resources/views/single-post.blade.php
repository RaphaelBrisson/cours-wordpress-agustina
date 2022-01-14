@extends('layouts.app')

@section('content')

<section class="single-post">
  <div class="wrap">
    <h1><?php echo get_the_title(); ?></h1>
    @include('partials/entry-meta')

    <div class="article wrap--small">
      @while(have_posts()) @php the_post() @endphp
        @php the_content() @endphp
      @endwhile
    </div>

  </div>

</section>

@endsection
