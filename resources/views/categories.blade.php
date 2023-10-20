
    @extends('layouts.main')
    @section('container')

    <div class="container mx-auto flex justify-center items-center">
      <div class="flex flex-wrap -mx-2 mb-2">
        <!-- Card Kategori 1 -->
        @foreach($categories as $category)
        <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
          <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
            <div class="p-4">
              <h3 class="text-xl font-semibold mb-2"><a href="/posts?category={{ $category->slug }}">{{ $category->name }}</h3>
              <p class="text-gray-700">{{ $category->deskripsi }}</p>
            </div>
            <div class="flex items-center justify-between p-4">
              <a href="/posts?category={{ $category->slug }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Lihat Kategori</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endsection
