@extends('root.layouts.user_main')

@section('content')
    <!-- Register Section Begin -->
    <div class="register-login-section spad">
    <div class="container">
        <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @if (Session::has("session_success"))
                <div class="alert alert-success" role="alert">
                    <li>{{ Session::get("session_success") }}</li>
                </div>
                <br><br>
            @endif
            @if (Session::has("session_errors"))
                <div class="alert alert-danger" role="alert">
                    <li>{{ Session::get("session_errors") }}</li>
                </div>
                <br><br>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                <br><br>
            @endif
            <div class="login-form">
            <h2>SIGN IN</h2>
            <form action="{{ route("signin.check") }}" method="POST">
                @csrf
                @method("post")
                <div class="group-input">
                    <label for="email">Email address *</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"/>
                </div>
                <div class="group-input">
                    <label for="pass">Password *</label>
                    <input type="text" id="pass" name="pass"/>
                </div>
                <div class="group-input gi-check">
                    <div class="gi-more">
                        <label for="save-pass">
                            Save Password
                            <input type="checkbox" id="save-pass" name="remember" />
                            <span class="checkmark"></span>
                        </label>
                        <a href="#" class="forget-pass">Forget your Password</a>
                    </div>
                </div>
                <button type="submit" class="site-btn login-btn">
                Sign In
                </button>
            </form>
            <div class="switch-login">
                <a href="{{ route("signup") }}" class="or-login"
                >Or Create An Account</a
                >
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Register Form Section End -->
@endsection

@push('footer')
    @include('root.includes.partner')
    @include('root.includes.footer')
@endpush