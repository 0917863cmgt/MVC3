<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->filter(request(['search', 'parent']))->paginate(8)->withQueryString(),
            'parentCategories' => Category::where('is_parent', true),
            'cuisine' => Category::where('parent_id', 3),
            'course' => Category::where('parent_id', 4),
            'protein' => Category::where('parent_id', 1),
            'vegetables' => Category::where('parent_id', 2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'is_parent' => 'required|integer|min:0|max:1',
            'parent_id' => 'integer|min:1',
            'name' => [Rule::unique('categories', 'name'), 'string', 'min:4' ],
            'slug' => [Rule::unique('categories', 'slug'), 'string', 'min:4' ]
        ]);

        Category::create($attributes);

        return redirect('/categories')->with('succes', 'Uw categorie is succesvol aangemaakt');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
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
        $attributes = request()->validate([
            'is_parent' => 'required|integer|min:0|max:1',
            'parent_id' => 'integer|min:1',
            'name' => [Rule::unique('categories', 'name')->ignore($category->id), 'string', 'min:4' ],
            'slug' => [Rule::unique('categories', 'slug')->ignore($category->id), 'string', 'min:4' ]
        ]);

        if($attributes['parent_id'] == null && $attributes['is_parent'] == 1){
            $attributes['parent_id'] = null;
        }

        if($attributes['is_parent'] == null){
            $attributes['is_parent'] = 0;
        }

        $category->update($attributes);

        return redirect('/categories')->with('succes', 'Uw categorie is succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->recipes()->detach();

        $category->delete();

        return redirect('/categories')->with('succes', 'Uw categorie is succesvol verwijderd!');
    }
}
