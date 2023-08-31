    @extends('layouts.main')

    @section('container')
    <h1>{{ $name }}</h1>
    <p>{{ $rombel }}</p>
    <p>Hobby :{{ $hobby }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" class="img-thumbnail rounded-circle">
    @endsection