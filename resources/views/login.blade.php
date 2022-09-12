@extends('layouts.master2')


@section('content')
<body class="hold-transition login-page">
    <br><br><br>

<div class="col-md-4">
</div>
<div class="login-box col-md-4">
  <div class="login-logo">
    <a href="#"><b>Web </b>Application</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in </p>

      <form method="POST"  action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

              <div class="social-auth-links text-center mb-3">
                <input type="submit" value="Login" class="btn btn-primary">
              </div>

      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
