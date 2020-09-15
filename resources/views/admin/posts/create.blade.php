@extends('layouts.app')

@section('content')

  <h1>Add post</h1>
  {{-- Validazione form --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Add new car form --}}
  <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('POST')

    <div>
      <label for="title">Title:</label><br>
      <input type="text" name="title" value="{{ old('title')}}" placeholder="Inserisci il titolo">
    </div>

    <div>
      <label for="content">Content:</label><br>
      <textarea name="content" rows="8" cols="80" value="{{ old('content')}}" placeholder="Inserisci il contenuto"></textarea>
    </div>

    <div>
      <label for="image_path">Upload image</label>
      <input type="file" name="image_path" accept="image/*">
    </div>

    <div>
      <input type="submit" name="" value="save">
    </div>
  </form>

  <a href="{{ route('admin.posts.index') }}">Torna alla lista</a>

@endsection
