@extends('layouts.main')

@section('container')

    {{-- <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>
                    <h5>Author: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-#279EFF">{{ $post->category->name }}</a></h5>

                    @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                    

                    <a href="/posts" class="d-block mt-3 text-decoration-none p-2 text-#C70039 border-1px-solid-black border-radius-1rem">Back To Posts</a>
            </div>
        </div>
    </div> --}}
    <div class="mx-6 mt-6 mb-10 flex flex-col items-center">
        <div class="flex flex-col items-center justify-center">
        <header class="bg-white p-4">
          <div class="container mx-auto">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <p class="text-gray-600">Oleh <span class="font-bold"><a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a></span> - <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-#279EFF">{{ $post->category->name }}</a></p>
          </div>
        </header>
      
        <main class="container mx-auto mt-6">
          <article class="bg-white p-6 rounded-lg shadow-lg mb-2">
            <div class="mb-5">
            @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3 mx-auto max-h-96">
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3 mx-auto max-h-96">
            @endif
        </div>
            <p class="text-lg"> {!! $post->body !!}</p>
          </article>
          <a href="/posts"><button type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Back To Posts</button></a>
        </main>
    </div>
    </div>

{{-- <article>
    <h2>{{ $post->title }}</h2>
    <h5>Author: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
    {!! $post->body !!}
</article>

<a href="/posts" class="d-block mt-3">Back To Posts</a> --}}
@endsection