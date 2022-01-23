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
                    <p style="margin-bottom: 0">Username:</p>
                    <p>{{auth()->user()->username}}</p>
                    <p style="margin-bottom: 0">E-mail:</p>
                    <p>{{auth()->user()->email}}</p>
                    <p>Member since: {{auth()->user()->created_at->format('d-m-Y')}}</p>
                    <a href="/user-details/edit">Edit</a>
                </div>
            </div>
        </section>
    </body>
@endsection
