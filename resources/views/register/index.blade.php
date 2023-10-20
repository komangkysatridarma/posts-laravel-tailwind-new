
@extends('layouts.main')

@section('container')

{{--  
<div class="row justify-content-center">
    <div class="col-md-4">

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    <form action="/login" method="post">
      @csrf 
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
        <label for="email">Email address</label>

        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
  
      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    </form>
    <small class="d-block text-center mt-3">Not Register yet? <a href="/register">Register Now!</a></small>
  </main>
    </div>
</div> --}}
<div class="flex items-center justify-center h-screen flex-wrap">
  <div class="flex lg:mb-60 max-w h-2/5 lg:mr-20 md:mb-40">
    <div class="max-w-[100%]"> <!-- Atur lebar sesuai kebutuhan -->
      <!-- Gambar di sebelah kiri -->
      <img class="w-max h-max object-fill" src="/img/Free Startup Illustration pack from Business Illustrations.jpeg" alt="Left Image">
    </div>
  </div>
  <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg mb-52 lg:mb-40 md:mb-20 sm:mb-12">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Register</h2>
    <form action="/register" method="post">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 @error('name') is-invalid @enderror" for="name">Name</label>
        <input class="shadow appearance-none border border border-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" id="name" type="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback text-red-900">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 @error('username') is-invalid @enderror" for="username">Username</label>
        <input class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border @error('username') is-invalid @enderror" id="username" type="username" name="username" placeholder="Enter your username" value="{{ old('username') }}">
        @error('username')
        <div class="invalid-feedback text-red-900">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 @error('email') is-invalid @enderror" for="email">Email</label>
        <input class="shadow appearance-none border border-orange-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback text-red-800">
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
          Register
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-orange-500 hover:text-orange-800" href="/login">
          Login
        </a>
      </div>
    </form>
  </div>
</div>
</div>
  @endsection

  
   
  </div>

