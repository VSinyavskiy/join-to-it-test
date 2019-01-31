@extends('auth.layout')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#">{{ __('admin_layout.global.project_name') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ __('admin_layout.login.title_text') }}</p>

    {{ Form::open() }}
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => __('admin_layout.login.fields.email')]) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="help-block">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('admin_layout.login.fields.password')]) }}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="help-block">{{ $errors->first('password') }}</span>
      </div>

      <div class="row">    
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('admin_layout.login.signin_label') }}</button>
        </div>
      </div>
    {{ Form::close() }}
    
  </div>
</div>
@endsection
