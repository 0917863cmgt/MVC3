@extends('components.layout')
@section('content')
    <body id="recipe-overview">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="/" style="position:fixed;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-6">
                <h1>Recipe overview</h1>
                <div class="row">
                    <x-recipe.recipe-overview
                        :recipe="$recipe"
                        :likes="$likes"
                    >
                    </x-recipe.recipe-overview>
                </div>
                <div class="row">
                    <x-recipe.recipe-comment-form
                        :recipe="$recipe"
                    >
                    </x-recipe.recipe-comment-form>
                    <x-recipe.recipe-comments
                        :recipe="$recipe"
                        :comments="$comments"
                        :likes="$likes"
                    >
                    </x-recipe.recipe-comments>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
