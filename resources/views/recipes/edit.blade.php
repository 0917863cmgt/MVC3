@extends('components.layout')
@section('content')
    <body id="recipe-create">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="{{url()->previous()}}" style="position:fixed;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-6">
                <h2>Edit Recipe</h2>
                <div class="row">
                    <form class="register-form" method="POST" action="/recipes/update/{{$recipe->slug}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="published" style="margin-bottom: 0">Published:</label>
                        @if($recipe->published == 1)
                            <label class="switch">
                                <input name="published" type="checkbox" id="published" onclick="changeValue()" checked>
                                <span class="slider round"></span>
                            </label>
                        @else
                            <label class="switch">
                                <input name="published" type="checkbox" id="published" onclick="changeValue()">
                                <span class="slider round"></span>
                            </label>
                        @endif

                        <label for="slug" style="margin-bottom: 0">Slug:</label>
                        <input name="slug" type="text" id="slug" value="{{$recipe->slug}}">

                        <label for="title" style="margin-bottom: 0">Title:</label>
                        <input name="title" type="text" id="title" value="{{$recipe->title}}">

                        <label for="description" style="margin-bottom: 0">Description:</label>
                        <textarea name="description" id="description">{{$recipe->description}}</textarea>

                        <label for="image" style="margin-bottom: 0">Image:</label>
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="" style="width: 100px;height: 100px;border-radius: 12px;object-fit: contain">
                        <input name="image" type="file" id="image" value="{{$recipe->image}}">

                        <label for="amount_people" style="margin-bottom: 0">Amount people:</label>
                        <input name="amount_people" type="text" id="amount_people" value="{{$recipe->amount_people}}">

                        <label for="ingredients" style="margin-bottom: 0">Ingredients:</label>
                        <textarea name="ingredients" id="ingredients">{{$recipe->ingredients}}</textarea>

                        <label for="steps" style="margin-bottom: 0">Steps:</label>
                        <textarea name="steps" id="steps">{{$recipe->steps}}</textarea>

                        <label for="category" style="margin-bottom: 0">Categories:</label>
                        <select name="categories[]" id="categories" multiple="multiple">
                            @foreach($recipeCategories as $cat)
                                <option value="{{$cat->id}}" selected="selected">{{$cat->name}}</option>
                                @foreach($categories as $category)
                                    @if($category->id != $cat->id)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>

                        <input class="register-input-submit" type="submit" name="submit" id="submit" value="Submit">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        let slider = document.getElementById("published")
        changeValue()
        function changeValue(){
            if(slider.checked == true){
                slider.value = 1;
            } else {
                slider.value = 0;
            }
        }
    </script>
@endsection
