@extends('components.layout')
@section('content')
    <body id="categories-create">
    <div class="container-fluid px-5" style="margin-bottom: 100px;">
        <a href="{{url()->previous()}}" style="position:fixed;">
            <svg width="25px" height="25px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g data-name="Group 132" id="Group_132"><path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/></g></svg>
        </a>
        <div class="row gx-2 justify-content-center">
            <div class="col-4">
                <h2>Create Category</h2>
                <form class="register-form" id="register-create" method="POST" action="/categories/create">
                    @csrf
                    @method('POST')
                    <label class="register-label" for="is_parent">Is category parent:</label>
                    <label class="register-label" for="is_parent">0 = No / 1 = Yes</label>
                    <input class="register-input-text" type="text" name="is_parent" id="is_parent" required>

                    <label class="register-label" for="parent_id">Parent id:</label>
                    <input class="register-input-text" type="text" name="parent_id" id="parent_id">

                    <label class="register-label" for="name">Name</label>
                    <input class="register-input-text" type="text" name="name" id="name" required>

                    <label class="register-label" for="slug">Slug</label>
                    <input class="register-input-text" type="text" name="slug" id="slug" required>

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
    </body>
@endsection
