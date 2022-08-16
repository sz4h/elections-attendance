@extends('layouts.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">
                <a href="{{ route('admin.home') }}">
                    {{ trans('panel.site_title') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    {{ trans('global.login') }}
                </p>

                @if(session()->has('message'))
                    <p class="alert alert-info">
                        {{ session()->get('message') }}
                    </p>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input id="phone" type="phone"
                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required
                               autocomplete="phone" autofocus placeholder="{{ trans('global.login_phone') }}"
                               name="phone" value="{{ old('phone', null) }}">

                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">{{ trans('global.remember_me') }}</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                @if(Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">
                            {{ trans('global.forgot_password') }}
                        </a>
                    </p>
                @endif
                <p class="mb-1">

                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection