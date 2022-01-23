@extends('components.layout')
@section('content')
    <body id="recipe-create">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="{{url()->previous()}}" style="position:fixed;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-6">
                <h2>Create Recipe</h2>
                <div class="row">
                    <form class="register-form" method="POST" action="/recipes/create" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <label for="slug" style="margin-bottom: 0">Slug:</label>
                        <input name="slug" type="text" id="slug">

                        <label for="title" style="margin-bottom: 0">Title:</label>
                        <input name="title" type="text" id="title">

                        <label for="description" style="margin-bottom: 0">Description:</label>
                        <textarea name="description" id="description"></textarea>

                        <label for="image" style="margin-bottom: 0">Image:</label>
                        <input name="image" type="file" id="image">

                        <label for="amount_people" style="margin-bottom: 0">Amount people:</label>
                        <input name="amount_people" type="text" id="amount_people">

                        <label for="ingredients" style="margin-bottom: 0">Ingredients:</label>
                        <textarea name="ingredients" id="ingredients"></textarea>

                        <label for="steps" style="margin-bottom: 0">Steps:</label>
                        <textarea name="steps" id="steps"></textarea>

                        <label for="categories[]" style="margin-bottom: 0">Categories:</label>
                        <select name="categories[]" id="category" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
@endsection
