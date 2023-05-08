@extends('root.layouts.user_main')

@section('content')

    {{-- alert();
    @error()
      @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
      @endforeach
    @enderror --}}
  
      <!-- Register Section Begin -->
      <div class="register-login-section spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </div>
                <br><br>
              @endif
              <div class="register-form">
                <h2>SIGN UP</h2>
                <form action="{{ route("signup.create") }}" method="POST">
                  @csrf
                  @method("post")
                  <div class="group-input">
                    <label for="email">Email address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"/>
                  </div>
                  <div class="group-input">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"/>
                  </div>
                  <div class="group-input">
                    <label for="pass">Password *</label>
                    <input type="text" id="pass" name="pass" />
                  </div>
                  <div class="group-input">
                    <label for="con_pass">Confirm Password *</label>
                    <input type="text" id="con_pass" name="con_pass" />
                  </div>
                  <button type="submit" class="site-btn register-btn">
                    SIGN UP
                  </button>
                </form>
                <div class="switch-login">
                  <a href="{{ route("signin") }}" class="or-login">Or Sign In</a>
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