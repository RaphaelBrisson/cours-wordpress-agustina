@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <div class="404-page">
    <h1>
      {{ __('La page n’existe pas :/', 'sage') }}
    </h1>
    <a href="<?= get_home_url() ?>">Revenir à l'accueil</a>
  </div>
  @endif
@endsection