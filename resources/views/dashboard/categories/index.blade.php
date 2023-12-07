@extends('dashboard.layouts.main')

@section('container')

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div> --}}

  @if(session()->has('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    });
</script>
  @endif

  
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  No
              </th>
              <th scope="col" class="px-6 py-3">
                  Category Name
              </th>
              <th scope="col" class="px-6 py-3">
                  Action
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
              </th>
              <td class="px-6 py-4">
                {{ $category->name }}
              </td>
              <td class="px-6 py-4 flex flex-row">
                <a href="{{ route('categories.edit', ['slug' => $category->slug]) }}" class="pr-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                </a>
                <form id="delete-form-{{ $category->id }}" action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="button" class="border-0 p-0 delete-category" data-category-id="{{ $category->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>                    
                  </button>
              </form>
              </td>
              @endforeach
          </tr>
      </tbody>
  </table>
          
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
   // Tambahkan event listener pada tombol hapus
   document.querySelectorAll('.delete-category').forEach(function (button) {
       button.addEventListener('click', function () {
           // Ambil id dari tombol hapus
           var categoryId = button.getAttribute('data-category-id');

           // Tampilkan SweetAlert konfirmasi
           Swal.fire({
               title: 'Apakah Anda yakin?',
               text: 'Anda tidak dapat mengembalikan ini!',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Ya, hapus!',
               cancelButtonText: 'Batal'
           }).then((result) => {
               if (result.isConfirmed) {
                   // Jika dikonfirmasi, kirim formulir hapus
                   document.getElementById('delete-form-' + categoryId).submit();
               }
           });
       });
   });
});

</script>