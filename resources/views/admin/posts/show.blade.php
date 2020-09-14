@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>{{ $post->title }}</h2>
        <div>
          <h3>Autore: {{ $post->user->name }}</h3>
          <h4>Email: {{ $post->user->email }}</h4>
        </div>
        <div>
          <img src="{{ $post->image_path }}" alt="post_image">
        </div>
        <p>{{ $post->content }}</p>
      </div>
    </div>
  </div>

  <a href="{{ route('admin.posts.index') }}">Indietro</a>

@endsection
