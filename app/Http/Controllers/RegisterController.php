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

       $forbiddenWords = ['kontol', 'memek', 'kntl', 'mmk', 'asu', 'pantek', 'bangsat', 'bgst', 'kanjut', 'bitch', 
        'bego', 'cuki', 'cukimai', 'puqi', 'puki', 'pukima', 'hencet', 'henceut', 'ass', 'asshole',
        'fuck', 'fucking', 'k0nt0l', 'dick', 'vagina', 'penis', 'mm3m3k', 'gigolo', 'lonte',
        'nigga', 'pntk', 'hnct', 'k$ntl', 'm*m*k', 'd1ck', 'p3nis', 'p3n1s', 'tolol', 'tll', 'dongo',
        'asw', 't0l0l', 'tol0l', 't0lol', 'titit', 't1t1t', 't1tit', 'tit1t', 'anj', 'd0ngo', 'dong0',
        'd0ng0', 'ngentot', 'ngent', 'ebol', 'eb0l', 'coli', 'colmek'];

$input = strtolower($request->input('name') . ' ' . $request->input('username'));
$input = preg_replace('/\s+/', ' ', $input); // Menghapus spasi berlebihan

foreach ($forbiddenWords as $word) {
    $pattern = '/\b' . preg_quote($word, '/') . '/i'; // Hilangkan '\b' pada kedua sisi
    if (preg_match($pattern, $input)) {
        return redirect()->back()->with('error', 'Input mengandung kata atau frasa terlarang.');
    }
}

        //enkripsi password
        // $validatedData['password'] = bcrypt($validatedData['password']); //atau
        $validatedData['password'] = Hash::make($validatedData['password']); //tambahin juga class di paling atas

        $user = User::create($validatedData);

       $user->sendEmailVerificationNotification();

    //    $request->session()->flash('success','Register Successfully, Please Login!'); //syalan si flash nya merah mending pake yang bawah

       return redirect('/email/verify')->with('success','Register Successfully, Please Check Your Gmail!');
    }
}
