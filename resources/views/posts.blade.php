
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
          <div class="relative">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="search" name="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." value="{{request('search')}}" required>
          <button type="submit" class="text-white absolute right-2.5 top-1/2 transform -translate-y-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:text-sm sm:px-4">Search</button>
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
              <button class="px-4 py-2 mb-1 md:px-4 md:py-2 lg:px-4 lg:py-2 text-sm md:text-base lg:text-lg bg-blue-500 text-white rounded hover:bg-blue-700"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">Read More</a></button>
              <span class="text-gray-600">Posted on {{ $posts[0]->created_at->diffForHumans() }}</span>
            </div>
          </div>
      </div>
  

      <div class="flex flex-wrap mx-2">
        @foreach($posts->skip(1) as $post)
          <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
            <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden post-card">
              @if ($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid max-h-64 object-cover mt-3">
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
              @endif
              <div class="p-4 post-card-content">
                <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                <p>
                  <small>By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> In<a href="/posts?category={{ $post->category->slug }}"
                      class="text-decoration-none"> {{ $post->category->name }}</a></small>
                </p>
                <p class="text-gray-700">{{ $post->excerpt }}</p>
              </div>
              <div class="flex items-center justify-between p-4 post-card-actions">
                <button class="px-2 py-1 mb-1 md:px-4 md:py-2 lg:px-4 lg:py-2 text-sm md:text-base lg:text-lg bg-blue-500 text-white rounded hover:bg-blue-700"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More</a></button>
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
    
    <div class="w-full flex justify-center mt-2 mb-10 pagination">
      @if($posts->count())
        {{ $posts->links() }}
      @endif
  </div>

  <footer
  class="flex flex-col items-center bg-neutral-200 text-center text-white dark:bg-neutral-600">
  <div class="container pt-9">
    <div class="mb-9 flex justify-center">
      <a href="https://www.instagram.com/omangkeyzaa_/?hl=id" class="mr-9 text-neutral-800 dark:text-neutral-200">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-4 w-4"
          fill="currentColor"
          viewBox="0 0 24 24">
          <path
            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
        </svg>
      </a>
      <a href="https://github.com/komangkysatridarma" class="text-neutral-800 dark:text-neutral-200">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-4 w-4"
          fill="currentColor"
          viewBox="0 0 24 24">
          <path
            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
        </svg>
      </a>
    </div>
  </div>

  <div
    class="w-full bg-neutral-300 p-4 text-center text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200">
    © 2023 Copyright:
    <a
      class="text-neutral-800 dark:text-neutral-400"
      href="https://tw-elements.com/"
      >Komang Kysa</a
    >
  </div>
</footer>
  
  @endsection
