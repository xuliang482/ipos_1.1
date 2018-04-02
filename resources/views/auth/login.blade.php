<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>希朗科技</b>iPOS</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ trans('auth.login_msg') }}</p>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}


            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <div class="form-group has-feedback"">
                <input type="email" class="form-control" placeholder="{{ trans('auth.user_name') }}" id="email" name="email" value="{{ old('email') }}" required autofocus>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback"">
                <input type="password" class="form-control" placeholder="{{ trans('auth.password') }}" id="password" name="password" value="{{ old('password') }}" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
		<a href="{{ route('register') }}">Register</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
