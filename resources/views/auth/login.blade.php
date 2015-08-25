@extends('base')

@section('body')
<section id="login" class="col-md-6 col-md-push-3 portal">
    <fieldset>
        <legend>Login</legend>
        <form action="{{ route('auth.login.store') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="email" class="label-control">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="label-control">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>&nbsp;
                <a href="{{ route('auth.register') }}" class="btn btn-default">Register</a>
            </div>
        </form>
    </fieldset>
</section>
@stop