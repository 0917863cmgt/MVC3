<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('recipes.create', [
            'categories' => Category::where('is_parent', '=', 0)->get(),
        ]);
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
            'slug' => ['required',Rule::unique('recipes', 'slug'),'string','min:1'],
            'title' => ['required',Rule::unique('recipes', 'slug'),'string','min:1'],
            'description' => 'required|string|min:100',
            'image' => 'required|image',
            'amount_people' => 'required|integer|min:1',
            'ingredients' => 'required',
            'steps' => 'required',
            'categories' => 'required',
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['image'] = request()->file('image')->store('recipe_images');

        $recipe = Recipe::create($attributes);

        foreach($attributes['categories'] as $category){
            $recipe->categories()->attach($category);
        }

        return redirect('/')->with('succes', 'Uw recept is succesvol geplaatst!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(Recipe $recipe)
    {
        if(Auth::check()){
            $id = Auth::id();
        } else {
            $id = 0;
        }
        return view('recipes.show', [
            'recipe' => $recipe,
            'comments' => Comment::where('recipe_id',$recipe->id)->get(),
            'likes' =>   Like::where('recipe_id', '=', $recipe->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
