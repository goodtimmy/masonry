@extends('layout')
@section('content')

    <div class="container" id="main">

        <div class="row">
            <div class="col-12 text-center">
                <h2 class="header-text">
                    login
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button id="sign_in"
                        @click="loginOrRegistration(1)"
                        class="button-select button-select-active"
                >sign in
                </button>
                <button id="sign_up"
                        @click="loginOrRegistration(0)"
                        class="button-select"
                >sign up
                </button>
            </div>
        </div>

        {{--@if--}}

        <form id="form" action="{{ route('login.post') }}" method="POST">

                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <label class="standart-label" for="email_address">E-Mail
                            Address</label>
                        <input class="form-control input-lg standart-input"
                               id="email_address"
                               name="email"
                               placeholder="your email"
                               required
                               autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                        <label class="standart-label" for="email_address">password</label>
                        <input class="form-control input-lg standart-input"
                               type="password"
                               placeholder="********"
                               id="password"
                               name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                        <div id="confirm_password">
                            <label class="standart-label" for="password-repeat">password repeat</label>
                            <input class="form-control input-lg standart-input"
                                   type="password"
                                   placeholder="********"
                                   id="password_repeat"
                                   name="password-repeat"
                                   >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <div class="checkbox">
                            <span class="anchor" id="hidden_element"></span>
                            <label id="isadmin" class="isadmin-checkbox">
                                <input type="checkbox" name="is-admin"> is admin
                            </label>
                        </div>

                        <button id="sign_up_or_in" class="button button-round button-green" type="submit">Sign in
                        </button>
                    </div>
                </div>
            </form>
    </div>

    <script>

        var app = new Vue({
            el: '#main',
            data: {
                login: true
            },
            components: {},
            methods: {
                loginOrRegistration: function (toggle) {

                    obj = document.getElementById('isadmin');
                    sign_in = document.getElementById('sign_in');
                    sign_up = document.getElementById('sign_up');
                    sign_up_or_in = document.getElementById('sign_up_or_in');
                    hidden_element = document.getElementById('hidden_element');
                    confirm_password = document.getElementById('confirm_password');

                    form = document.getElementById('form');



                    if (app.login && !toggle) {
                        app.login = false;
                        obj.style.display = 'block';
                        hidden_element.style.display = 'none';
                        confirm_password.style.display = 'block';
                        sign_in.classList.remove("button-select-active");
                        sign_up.classList.add("button-select-active");
                        sign_up_or_in.innerHTML = "sign up";

                        form.action = "{{ route('register.post') }}";

                    } else if (!app.login && toggle) {
                        app.login = true;
                        obj.style.display = 'none';
                        hidden_element.style.display = 'block';
                        confirm_password.style.display = 'none';
                        sign_in.classList.add("button-select-active");
                        sign_up.classList.remove("button-select-active");
                        sign_up_or_in.innerHTML = "sign in";

                        form.action = "{{ route('login.post') }}";
                    }


                }
            },
            mounted: function () {

            },
            watch: {}
        });

    </script>

@endsection