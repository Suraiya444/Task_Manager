@extends('app.auth')

@section('content')
   <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @if(Session::has('error'))
    <p class="alert alert-info">{{ Session::get('error') }}</p>
    @endif
    <form action="{{url('login')}}" method="post">
        @csrf
      <div class="input-group mb-3">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      @if($errors->has('email'))
            <small class="d-block text-danger">
                {{$errors->first('email')}}
            </small>
        @endif
      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      @if($errors->has('password'))
            <small class="d-block text-danger">
                {{$errors->first('password')}}
            </small>
        @endif
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mb-1">
      <a href="forgot-password.html">I forgot my password</a>
    </p>
    <p class="mb-0">
      <a href="{{route('register')}}" class="text-center">Register a new membership</a>
    </p>
</div>
@endsection
