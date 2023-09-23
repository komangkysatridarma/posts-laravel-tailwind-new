@extends('dashboard.layouts.main')

@section('container')
        <div class="flex justify-center">
                <h1 class="text-2xl font-bold">Welcome Back, {{ auth()->user()->name }}</h1>
        </div>
        <div class="flex items-center justify-center flex-wrap">
                    <div class="image-container">
                        <img class="w-full h-auto" src="/img/Premium Vector _ People suffering from problems.jpeg" alt="Image 2">
                    </div>
                  </div>
        </div>  

@endsection