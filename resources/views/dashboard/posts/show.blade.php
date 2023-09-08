@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success">
                    <svg class="bi"><use xlink:href="#left"/></svg>
                    Back to all my post</a>
                <a href="" class="btn btn-warning">
                    <svg class="bi"><use xlink:href="#pencil"/></svg>
                    Edit</a>
                <a href="" class="btn btn-danger">
                    <svg class="bi"><use xlink:href="#trash"/></svg>
                    Delete</a>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                
        </div>
    </div>
</div>

@endsection