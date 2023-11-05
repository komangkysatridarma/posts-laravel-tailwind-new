<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search_users')) {
            $users = User::filter($request->only('search_users'))->get();
        } else {
            // Jika tidak ada parameter pencarian, ambil semua pengguna
            $users = User::all();
        }
    
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        // or $medicine = Medicine::where('id',$id)->first()

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $id = $request->input('id');
    $user = User::find($id);

    // Perbarui nilai isAdmin berdasarkan status checkbox
    $user->isAdmin = $request->has('isAdmin');

    // Simpan perubahan ke database
    $user->save();
    return redirect()->back()->with('success', 'Berhasil mengupdate user!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        Post::where('user_id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }

}
