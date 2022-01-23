@extends('components.layout')
@section('content')
    <body id="register">
    <section id="register-section" class="container-fluid">
        <div class="row register-header">
            <div class="col">
            </div>
            <div class="col">
                <h1 style="text-align: center">Create user</h1>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col p-5 grey" style="border-radius:20px">
                <form class="register-form" id="register-create" method="POST" action="/admin/users/create" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <label class="register-label" for="role">Role</label>
                    <input type="text" name="role" id="role" required>

                    <label class="register-label" for="username">Username</label>
                    <input class="register-input-text" type="text" name="username" id="username" required>

                    <label class="register-label" for="email">E-mail</label>
                    <input class="register-input-email" type="email" name="email" id="email" required>

                    <label class="register-label" for="confirm_email">Bevestig E-mail</label>
                    <input class="register-input-email" type="email" name="email_confirmation" id="email_confirmation" required>

                    <label class="register-label" for="password">Wachtwoord</label>
                    <input class="register-input-password" type="password" name="password" id="password" required>

                    <label class="register-label" for="confirm_password">Bevestig wachtwoord</label>
                    <input class="register-input-password" type="password" name="password_confirmation" id="password_confirmation" required>

                    <label class="register-label" for="profile_image" style="margin-bottom: 0">Image:</label>
                    <input name="profile_image" type="file" id="profile_image">

                    <input class="register-input-submit" type="submit" name="submit" id="submit" value="Register">
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
