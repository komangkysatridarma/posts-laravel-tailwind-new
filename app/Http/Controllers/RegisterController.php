<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
       $validatedData= $request->validate([
        'name'=> 'required|max:255',
        'username' => ['required','min:3','max:225','unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255'
       ]);

        //enkripsi password
        // $validatedData['password'] = bcrypt($validatedData['password']); //atau
        $validatedData['password'] = Hash::make($validatedData['password']); //tambahin juga class di paling atas

       User::create($validatedData);

    //    $request->session()->flash('success','Register Successfully, Please Login!'); //syalan si flash nya merah mending pake yang bawah

       return redirect('/login')->with('success','Register Successfully, Please Login!');
    }
}
