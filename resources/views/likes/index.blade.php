@extends('components.layout')
@section('content')
    <body id="favourites">
    <div class="container-fluid px-5">
        <div class="row gx-2">
            <div class="col-12">
                <h1>Favourites</h1>
                <div class="row">
                    @foreach($likes as $like)
                        <x-recipe.recipe-card
                            :recipe="$like->recipe"
                        >
                        </x-recipe.recipe-card>
                    @endforeach
                    <x-recipes-pagination :recipes="$likes"/>
                    @if($likes->count() <1)
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
