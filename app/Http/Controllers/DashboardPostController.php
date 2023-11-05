<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image'=> 'image|file|max:1024',
            'body' => 'required'
        ]);

        $forbiddenWords = ['kontol', 'memek', 'kntl', 'mmk', 'asu', 'pantek', 'bangsat', 'bgst', 'kanjut', 'bitch', 
        'bego', 'cuki', 'cukimai', 'puqi', 'puki', 'pukima', 'hencet', 'henceut', 'ass', 'asshole',
        'fuck', 'fucking', 'k0nt0l', 'dick', 'vagina', 'penis', 'mm3m3k', 'gigolo', 'lonte',
        'nigga', 'pntk', 'hnct', 'k$ntl', 'm*m*k', 'd1ck', 'p3nis', 'p3n1s', 'tolol', 'tll', 'dongo',
        'asw', 't0l0l', 'tol0l', 't0lol', 'titit', 't1t1t', 't1tit', 'tit1t', 'anj', 'd0ngo', 'dong0',
        'd0ng0', 'ngentot', 'ngent', 'ebol', 'eb0l'];

$input = strtolower($request->input('title') . ' ' . $request->input('body') . ' ' . $request->input('slug'));
$input = preg_replace('/\s+/', ' ', $input); // Menghapus spasi berlebihan

foreach ($forbiddenWords as $word) {
    $pattern = '/\b' . preg_quote($word, '/') . '/i'; // Hilangkan '\b' pada kedua sisi
    if (preg_match($pattern, $input)) {
        return redirect()->back()->with('error', 'Input mengandung kata atau frasa terlarang.');
    }
}

        if($request->file('image')){
            $validatedData['image']= $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Postingan telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
{
    $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
    ];

    if ($request->slug != $post->slug) {
        $rules['slug'] = 'required|unique:posts';
    }

    // Masukkan daftar kata-kata terlarang di sini
    $forbiddenWords = ['kontol', 'memek', 'kntl', 'mmk', 'asu', 'pantek', 'bangsat', 'bgst', 'kanjut', 'bitch', 
        'bego', 'cuki', 'cukimai', 'puqi', 'puki', 'pukima', 'hencet', 'henceut', 'ass', 'asshole',
        'fuck', 'fucking', 'k0nt0l', 'dick', 'vagina', 'penis', 'mm3m3k', 'gigolo', 'lonte',
        'nigga', 'pntk', 'hnct', 'k$ntl', 'm*m*k', 'd1ck', 'p3nis', 'p3n1s', 'tolol', 'tll', 'dongo',
        'asw', 't0l0l', 'tol0l', 't0lol', 'titit', 't1t1t', 't1tit', 'tit1t', 'anj', 'd0ngo', 'dong0',
        'd0ng0', 'ngentot', 'ngent', 'ebol', 'eb0l'];

    $input = strtolower($request->input('title') . ' ' . $request->input('body') . ' ' . $request->input('slug'));
    $input = preg_replace('/\s+/', ' ', $input); // Menghapus spasi berlebihan

    foreach ($forbiddenWords as $word) {
        $pattern = '/\b' . preg_quote($word, '/') . '\b/';
        if (preg_match($pattern, $input)) {
            return redirect()->back()->with('error', 'Input mengandung kata atau frasa terlarang.');
        }
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
        $imagePath = $request->file('image')->store('post-images');
        $validatedData['image'] = $imagePath;
    }

    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    Post::where('id', $post->id)->update($validatedData);

    return redirect('/dashboard/posts')->with('success', 'Postingan telah di edit!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Postingan telah dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
