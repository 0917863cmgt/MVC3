@extends('components.layout')
@section('content')
    <body id="recipe-index">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="/" style="position:fixed;margin-bottom: 100px;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-12">
                <div class="row gx-2 justify-content-center">
                    <div class="col-8">
                        <h2 style="margin-top: 50px;margin-bottom: 20px; width: 200px;">All Recipes</h2>
                        <a href="/recipes/create" class="n-t-d blue" style="float: right">Create Recipe</a>
                    </div>
                    <div class="col-12">
                        <x-recipes-header></x-recipes-header>
                    </div>
                    @foreach($recipes as $recipe)
                        <div class="col-8">
                            <x-recipe.recipe-list
                                :recipe="$recipe"
                            >
                            </x-recipe.recipe-list>
                        </div>
                    @endforeach
                    <x-recipes-pagination :recipes="$recipes"/>
                    @if($recipes->count() <1)
                        <div class="col-6 offset-3 no-articles" style="height: calc(40vh - 150px);">
                            <p style="text-align: center;">No recipes found!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
