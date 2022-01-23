<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        if(Auth::check()){
            $id = Auth::id();
        } else {
            $id = 0;
        }
        return view('likes.index', [
            'likes' => Like::where('user_id', '=', $id)->whereNull('comment_id')->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Recipe $recipe)
    {
        $attributes = request()->validate([
            'recipe_id' => 'required|integer|min:1',
            'comment_id' => 'integer|min:1',
            'user_id' => 'required|integer|min:1'
        ]);

        $like = Like::create($attributes);

        return redirect()->back()->with('succes', 'Uw like is succesvol geplaatst!');
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
            'recipe_id' => 'required|integer|min:1',
            'comment_id' => 'integer|min:1'
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $like = Like::create($attributes);

        return redirect()->back()->with('succes', 'Uw like is succesvol geplaatst!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(Like $like)
    {
        return view('likes.show', [

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe, Like $like)
    {
        Like::destroy($like->id);
        return  redirect()->back()->with('succes', 'Uw like is succesvol verwijderd!');
    }
}
