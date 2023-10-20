<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WkBlog | {{ $title }}</title>
    <link rel="stylesheet" href="/css/stylee.css">
    <link rel="icon" href="/img/logo.wk.png?color=indigo&shade=700">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
  <body>

    {{-- ini akan di isi/dihubungkan ke folder partials, file navbar, isinya navbar --}}
    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="/js/navbar.js"></script>
  </body>
</html>