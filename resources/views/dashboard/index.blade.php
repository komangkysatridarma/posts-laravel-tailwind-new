@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-center">
        <h1 class="text-2xl font-bold">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    @if(auth()->user()->posts->count())
    <div class="mt-4 container mx-auto">
        <h2 class="text-xl font-bold mb-2">Your Posts</h2>

        <div class="flex flex-wrap justify-start">
            @foreach(auth()->user()->posts as $post)
                <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
                    <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden post-card">
                        @if ($post->image)
                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid max-h-64 object-cover mt-3">
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                        @endif
                        <div class="p-4 post-card-content">
                            <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700">{{ $post->excerpt}}</p>
                        </div>
                        <div class="flex items-center justify-between lg:p-4 sm:p-2">
                            <button class="px-2 py-1 mb-1 md:px-4 md:py-2 lg:px-4 lg:py-2 text-sm md:text-base lg:text-lg bg-blue-500 text-white rounded hover:bg-blue-700">
                                <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none">
                                    Read More
                                </a>
                            </button>
                            <span class="text-gray-600">Posted on {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    <p class="text-lg font-medium mt-3">You Haven't Posted Yet.</p>
    @endif
    </div>
@endsection
