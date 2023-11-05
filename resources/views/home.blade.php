@extends('layouts.main')

@section('container')
<div class="container mx-auto bg-gray-800 flex flex-col lg:flex-row items-center mt-4">
    <div class="lg:w-1/2 lg:pr-4 flex justify-center">
        <div class="max-w-sm h-auto">
            <img class="w-full h-auto" src="/img/Free_Vector___People_reading_books_for_study_vector_illustration-removebg-preview.png" alt="">
        </div>
    </div>
    <div class="lg:w-1/2 flex items-center lg:mr-24 md:w-1/2">
        <div>
            <h1 class="text-white text-3xl mb-2 text-center lg:text-left ml-2">Reading Is Fun!</h1>
            <p class="text-white text-lg lg:text-xl sm:text-xs lg:text-left md:text-xl ml-2">
                Manfaat blogging yang pertama adalah menyalurkan kreativitas yang dimiliki,
                sekaligus menciptakan online presence di dunia yang serba digital ini. Blog bisa jadi sarana untukmu
                menuangkan isi pikiran dan mencoba menulis tentang berbagai macam topik.
            </p>
        </div>
    </div>
</div>

<div class="mt-4">
<h1 class="text-black text-3xl mb-2 text-center">About us</h1>
<div class="container mx-auto flex flex-col lg:flex-row items-center">
    <div class="lg:w-1/2 flex items-center lg:ml-20 sm:ml-0 md:w-1/2">
        <div class="sm:items-start">
            <p class="text-black text-lg lg:text-xl sm:text-xs lg:text-left ml-2 md:text-xl">
                Manfaat blogging yang pertama adalah menyalurkan kreativitas yang dimiliki,
                sekaligus menciptakan online presence di dunia yang serba digital ini. Blog bisa jadi sarana untukmu
                menuangkan isi pikiran dan mencoba menulis tentang berbagai macam topik.
            </p>
        </div>
    </div>
    <div class="flex justify-center ml-0 lg:ml-20">
        <div class="max-w-sm h-auto">
            <img class="w-full h-auto" src="/img/teamwork.jpeg" alt="">
        </div>
    </div>
</div>
</div>
@endsection
