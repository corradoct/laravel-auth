@extends('layouts.app')

@section('content')
  <h1>Ecco i nostri posts</h1>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($posts as $post)
            <li>
              <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
          @endforeach
        </ul>

        {{ $posts->links() }}

      </div>
    </div>
  </div>

  <a href="/">Home</a>

  @if (Route::has('login'))
    <div>
      @auth
        <a href="{{ route('admin.posts.index') }}">Lista per admin</a>
      @endauth
    </div>
  @endif

@endsection
