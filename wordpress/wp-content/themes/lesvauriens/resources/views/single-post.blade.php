@extends('layouts.app3')

@section('content')

<section class="single-post wrap">
  <div class="titles">
    <div>
      <h1><?php the_field('titre_article'); ?></h1>
      <p>@include('partials/entry-meta')</p>
    </div>
  </div>

  <div class="post-content">
    <p><strong>Le <?php the_field('date_sujet_article'); ?></strong> - <?php the_field('description_article'); ?></p>
  </div>

  <div class="post-images"> 
    @for ($i=1; $i < 13; $i++) 
      @if (get_field('photo_'. $i .'_article'))
        <img src="<?php the_field('photo_'. $i .'_article'); ?>">
      @endif
    @endfor
    @if (get_field('video_article'))
        <?php echo(the_field('video_article')); ?>
    @endif
  </div>

  <div>
    <p><?php the_field('conclusion_article'); ?></p>
  </div>
  
  
  
</section>

@endsection