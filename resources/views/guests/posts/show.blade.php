@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>

  <div class="container">
    <div class="row">
      <div>
        <img src="{{ $post->image_path }}" alt="">
      </div>
      <div>
        <p>{{ $post->content }}</p>
      </div>
    </div>
  </div>

  <a href="{{ route('posts.index') }}">Indietro</a>

@endsection
