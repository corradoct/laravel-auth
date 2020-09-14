@extends('layouts.app')

@section('content')
  <h1>Ecco i nostri posts</h1>

  <div class="container">
    <div class="row">
      <ul>
        @foreach ($posts as $post)
          <li>
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <a href="/">Home</a>

@endsection
