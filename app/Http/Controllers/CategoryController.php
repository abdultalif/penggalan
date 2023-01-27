<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $paginate = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')
            ->when($request->has('q') && $request->q != "", function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->q . '%');
            })
            ->paginate($request->rows ?? $this->paginate)
            ->appends($request->only('rows', 'q'));
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'kategori' => 'required|unique:categories,name'
            ],
            [
                'required' => 'Kategori belum di isi',
                'unique' => 'Kategori sudah ada'
            ]
        );

        $data = [
            'name' => $request->kategori,
            'slug' => Str::slug($request->kategori)
        ];
        Category::create($data);

        return redirect()->route('category.index')
            ->with([
                'massage' => 'Kategori berhasil di tambah',
                'success' => true,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate(
            $request,
            [
                'kategori' => 'required|unique:categories,name,' . $category->id
            ],
            [
                'required' => 'Kategori belum di isi',
                'unique' => 'Kategori sudah ada'
            ]
        );

        $data = [
            'name' => $request->kategori,
            'slug' => Str::slug($request->kategori)
        ];
        $category->update($data);

        return redirect()->route('category.index')
            ->with([
                'massage' => 'Kategori berhasil di perbarui',
                'success' => true,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with([
                'massage' => 'Kategori berhasil di hapus',
                'success' => true,
            ]);
    }
}
