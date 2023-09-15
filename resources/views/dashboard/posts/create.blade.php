@extends('dashboard.layouts.main')
@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new post</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>

          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
          
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Categorty</label>
          <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="category_id">
              <option selected disabled>Open this select menu</option>
              @foreach ($categories as $category)

                @if(old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach

            </select>
            <label for="floatingSelect">Pilih Category</label>
          </div>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Pilih Gambar</label>
          <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image">

          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>  
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Create Post</button>
      </form>
  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })
  </script>
@endsection