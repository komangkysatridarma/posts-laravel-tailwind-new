<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|unique:categories',
                'deskripsi'=> 'required|max:500'
            ]);
    
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['deskripsi'] = strip_tags($request->deskripsi);
    
            Category::create($validatedData);
    
            return redirect('/dashboard/categories')->with('success', 'Postingan telah di tambahkan!');
        }
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return abort(404); // Handle category not found
        }

        $rules = [
            'name' => 'required|max:255',
            'deskripsi' => 'required|max:500'
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        $validatedData['deskripsi'] = strip_tags($request->deskripsi);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Postingan telah di edit!');

    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
{
    $category = Category::where('slug', $slug)->first();

    if (!$category) {
        return redirect('/dashboard/categories')->with('error', 'Kategori tidak ditemukan.');
    }

    $category->delete();

    return redirect('/dashboard/categories')->with('success', 'Kategori telah dihapus!');
}
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
