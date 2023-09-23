
    @extends('layouts.main')
    @section('container')
    
   <div class="mx-16">
    <form action="/posts">
        @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if(request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative mb-6 w-full flex justify-center items-center">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." value="{{request('search')}}" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Search</button>
        </div>
    </form>
  </div>

    
  <div class="container mx-auto">
    @if($posts->count())
      <div class="mb-5">
          <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            @if ($posts[0]->image)
            <img class="mx-auto max-h-96" src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
              @endif
            <div class="p-4">
              <h3 class="text-2xl font-semibold mb-2"><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }} </a></h3>
              <p>
              <small>By: <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> In<a href="/posts?category={{ $posts[0]->category->slug }}"
                class="text-decoration-none"> {{ $posts[0]->category->name }}</a></small>
              </p>
                <p class="text-gray-700">{{ $posts[0]->excerpt }}</p>
            </div>
            <div class="flex items-center justify-between p-4">
              <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">Read More</a></button>
              <span class="text-gray-600">Posted on {{ $posts[0]->created_at->diffForHumans() }}</span>
            </div>
          </div>
      </div>
  

      <div class="flex flex-wrap mx-2">
      @foreach($posts->skip(1) as $post)
        <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
          <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
             @if ($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
             @endif
            <div class="p-4">
              <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
              <p>
                <small class="text-muted">
                    By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}
                        </a>
                </small>
            </p>
              <p class="text-gray-700">{{ $post->excerpt}}</p>
            </div>
            <div class="flex items-center justify-between p-4">
              <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-sm sm:text-xs">Read More</a></button>
              <span class="text-gray-600">Posted on {{ $post->created_at->diffForHumans() }}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>  
  </div>

    @else
    <p class="text-center fs-4">Posts No Found.</p>
    @endif
    <div class="w-full flex justify-center mt-2 mb-2">
      {{ $posts->links() }}
    </div>
    @endsection