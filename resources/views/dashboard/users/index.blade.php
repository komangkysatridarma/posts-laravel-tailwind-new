@extends('dashboard.layouts.main')

@section('container')

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div> --}}

  @if(session()->has('success'))
  <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    {{ session('success') }}
  </div>
  @endif

  <div class="mx-16">
    <form action="{{ route('dashboard.users.index') }}" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative mb-6 w-full flex justify-center items-center">
          <div class="relative">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="search" name="search_users" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 sm:mx-w-full" placeholder="Search Mockups, Logos..." value="{{request('search_users')}}" required>
          <button type="submit" class="text-white absolute right-2.5 top-1/2 transform -translate-y-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:text-sm sm:px-4">Search</button>
        </div>           
    </form>
  </div>


<div class="relative overflow-x-auto">
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
                <!-- Tombol untuk menyimpan perubahan di sini -->
              <td class="px-6 py-4 flex flex-row">
                <form action="{{ route('dashboard.users.delete', $user['id']) }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="border-0 p-0" onclick="return confirm('Are You Sure?')">
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
</div>
@endsection