@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>

  <div class="container">
    <div class="row">
      <div class="col-12">
        @if (!empty($post->image_path))
          <div>
            <img src="{{ asset('storage') . '/' . $post->image_path }}" alt="postImage">
          </div>
        @endif
      </div>          
      <div>
        <p>{{ $post->content }}</p>
      </div>
    </div>
  </div>

  <a href="{{ route('posts.index') }}">Indietro</a>

@endsection
