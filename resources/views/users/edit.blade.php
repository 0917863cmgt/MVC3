@extends('components.layout')
@section('content')
    <body id="user-details">
    <section id="user-section" class="container-fluid">
        {{--        <div class="row user-background">--}}
        {{--            <div class="col-12 p-0">--}}
        {{--                <div class="col"><img class="background-image" src="{{auth()->user()->profile_image}}"></div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row bio">
            <div class="col-4 offset-3">
                <img class="profile-image" alt="avatar" src="{{ asset('storage/' . auth()->user()->profile_image) }}">
            </div>
            <div class="col-4 p-3 grey">
                <form class="edit-user-form" id="edit-user" method="POST" action="/user-details/update/{{auth()->user()->id}}" enctype="multipart/form-data" style="display: flex;
    flex-direction: column;">
                    @csrf
                    @method('PATCH')
                    <label for="username" style="margin-bottom: 0">Username:</label>
                    <input name="username" type="text" id="username" value="{{auth()->user()->username}}">

                    <label for="email" style="margin-bottom: 0">E-mail:</label>
                    <input name="email" type="email" id="email" value="{{auth()->user()->email}}">

                    <label for="password">Wachtwoord</label>
                    <input class="register-input-password" type="password" name="password" id="password">

                    <label for="confirm_password">Bevestig wachtwoord</label>
                    <input class="register-input-password" type="password" name="password_confirmation" id="password_confirmation">

                    <label for="profile_image" style="margin-bottom: 0">Profile image:</label>
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="" style="width: 100px;height: 100px;border-radius: 12px;object-fit: contain">
                    <input name="profile_image" type="file" id="profile_image">

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
    </section>
    </body>
@endsection
