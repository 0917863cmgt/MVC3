@extends('components.layout')
@section('content')
    <body id="homepage">
        <div class="container-fluid px-5">
            <div class="row gx-2">
               <div class="col-12">
                   <h1>Recipes</h1>
                   <x-recipes-header></x-recipes-header>
                   <div class="row">
                       @foreach($recipes as $recipe)
                           <x-recipe.recipe-card :recipe="$recipe"></x-recipe.recipe-card>
                       @endforeach
                       <x-recipes-pagination :recipes="$recipes"/>
                       @if($recipes->count() <1)
                            <div class="col-6 offset-3 no-articles" style="height: calc(40vh - 150px);">
                                <p style="text-align: center;">No recipes found!</p>
                                <p style="text-align: center;">Please try another category</p>
                            </div>
                       @endif
                   </div>
               </div>
            </div>
        </div>
    </body>
@endsection
