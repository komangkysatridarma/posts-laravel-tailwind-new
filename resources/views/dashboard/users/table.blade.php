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

<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                 Name
            </th>
            <th scope="col" class="px-6 py-3">
                 Username
            </th>
            <th scope="col" class="px-6 py-3">
                 Email
            </th>
            <th scope="col" class="px-6 py-3">
                 Admin
            </th>
            <th scope="col" class="px-6 py-3">
                 Simpan
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $loop->iteration }}
            </th>
            <td class="px-6 py-4">
              {{ $user->name }}
            </td>
            <td class="px-6 py-4">
              {{ $user->username }}
            </td>
            <td class="px-6 py-4">
              {{ $user->email }}
            </td>
            <form action="{{ route('dashboard.users.update', $user['id']) }}" method="POST">
              @method('put')
              @csrf
              <td class="px-6 py-4">
                <input type="hidden" name="id" value="{{ $user->id }}"> 
                <input type="checkbox" name="isAdmin[{{ $user->id }}]" value="{{ $user->id }}" {{ $user->isAdmin ? 'checked' : '' }}>
              </td>
              <td class="px-6 py-4">
                <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Simpan</button>
              </td>
            </form>
            <td class="px-6 py-4 flex flex-row">
              <form id="delete-form-{{ $user->id }}" action="{{ route('dashboard.users.delete', $user['id']) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="border-0 p-0 delete-user" data-user-id="{{ $user->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>                    
                </button>
              </form>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>

<script>
  document.addEventListener('DOMContentLoaded', function () {
   // Tambahkan event listener pada tombol hapus
   document.querySelectorAll('.delete-user').forEach(function (button) {
       button.addEventListener('click', function () {
           // Ambil id dari tombol hapus
           var postId = button.getAttribute('data-user-id');

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
                   document.getElementById('delete-form-' + postId).submit();
               }
           });
       });
   });
});

</script>