@extends('components.layout')
@section('content')
    <body id="login">
    <section id="login-section" class="container-fluid">
        <div class="row login-header">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col-3 p-5 grey" style="border-radius:20px">
                <form class="login-form" id="login" method="POST" action="/login">
                    @csrf
                    <h3 style="text-align: center; right: 0; left: 0;margin-bottom: 1em;">Log in</h3>

                    <label class="login-label" for="email">E-mail</label>
                    <input class="login-input-email" type="email" name="email" id="email" required>

                    <label class="register-label" for="password">Password</label>
                    <input class="register-input-password" type="password" name="password" id="password" required>

                    <input class="login-input-submit" type="submit" name="submit" id="submit" value="Log in">
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
            <div class="col">
            </div>
        </div>
    </section>
    </body>
@endsection
