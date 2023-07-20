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

                <div class="register-form">
                    <h2>My Account</h2>
                    <form action="{{ route("update.profile") }}" method="POST" id="profileForm">
                        @csrf
                        <input type="text" name="user_id" id="user_id" value="{{ $user->id }}" hidden>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" hidden>
                        <div class="group-input">
                            <label for="email">Email address *</label>
                            <input type="email" disabled value="{{ $user->email }}"/>
                        </div>
                        <div class="group-input">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"/>
                        </div>
                        <button type="submit" class="site-btn register-btn">
                            UPDATE PROFILE
                        </button>
                    </form>
                    <div class="switch-login">
                        <a onclick="changePass('{{ route('forget.pass') }}')" class="or-login" style="cursor: pointer">change password</a>
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