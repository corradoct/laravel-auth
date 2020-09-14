@extends('layouts.app')

@section('content')
  <h1>Benvenuto {{ $user->name }} Ecco i nostri posts</h1>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($posts as $post)
            <li>
              <a href="{{ route('admin.posts.show', $post) }}">{{ $post->user->name }} - {{ $post->title }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <a href="/">Home</a>

@endsection
