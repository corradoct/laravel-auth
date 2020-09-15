@extends('layouts.app')

@section('content')
  <h1>Benvenuto {{ $user->name }} Ecco i nostri posts</h1>

  <a href="{{ route('admin.posts.create') }}">Crea un nuovo post</a>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($posts as $post)
            <li>
              <a href="{{ route('admin.posts.show', $post) }}">{{ $post->user->name }} - {{ $post->title }}</a>
              <div>
                <a class="edit" href="{{ route('admin.posts.edit', $post) }}">Modifica</a>
              </div>
              <div>
                <form class="delete" action="{{ route('admin.posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                  <input type="submit" value="Elimina">
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <a href="/">Home</a>

@endsection
