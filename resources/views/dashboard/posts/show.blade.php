@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success">
                    <svg class="bi"><use xlink:href="#left"/></svg>
                    Back to all my post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-white">
                    <svg class="bi"><use xlink:href="#pencil"/></svg>
                    Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span><svg class="bi"><use xlink:href="#trash"/></svg>Delete</span></button>
                    </form>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                
        </div>
    </div>
</div>

@endsection