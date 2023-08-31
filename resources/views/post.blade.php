@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>
                    <h5>Author: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-#279EFF">{{ $post->category->name }}</a></h5>

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                    

                    <a href="/posts" class="d-block mt-3 text-decoration-none p-2 text-#C70039 border-1px-solid-black border-radius-1rem">Back To Posts</a>
            </div>
        </div>
    </div>

{{-- <article>
    <h2>{{ $post->title }}</h2>
    <h5>Author: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
    {!! $post->body !!}
</article>

<a href="/posts" class="d-block mt-3">Back To Posts</a> --}}
@endsection