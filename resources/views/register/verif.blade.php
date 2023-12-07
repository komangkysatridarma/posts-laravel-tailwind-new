@extends('layouts.main')

@section('container')

    <form action="/login" method="post">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 @error('email') is-invalid @enderror" for="email">Email</label>
        <input class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback text-red-900">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
        <input class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Enter your password">
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Login
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-orange-500 hover:text-orange-800" href="/register">
          Register
        </a>
      </div>
    </form>
  </div>
</div>
</div>
  @endsection

  
   
  </div>

