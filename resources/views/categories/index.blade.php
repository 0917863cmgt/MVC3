@extends('components.layout')
@section('content')
    <body id="admin-categories">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="/" style="position:fixed;margin-bottom: 100px;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-12">
                <div class="row gx-2 justify-content-center">
                    <div class="col-8">
                        <h2 style="margin-top: 50px;margin-bottom: 20px; width: 200px;">All Categories</h2>
                        <a href="/categories/create" class="n-t-d blue" style="float: right">Create Category</a>
                        <x-categories-header></x-categories-header>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-8">
                            <x-category.list
                                :category="$category"
                            >
                            </x-category.list>
                        </div>
                    @endforeach
                    <x-pagination :variable="$categories"/>
                    @if($categories->count() <1)
                        <div class="col-6 offset-3 no-articles" style="height: calc(40vh - 150px);">
                            <p style="text-align: center;">No categories found!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
