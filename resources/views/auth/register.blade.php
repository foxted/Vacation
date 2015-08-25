@extends('base')

@section('body')
<section class="col-md-6 col-md-push-3 portal">
    <fieldset>
        <legend>Register</legend>
        <form method="POST" action="{{ route('auth.register.store') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>&nbsp;
                <a href="{{ route('auth.login') }}" class="btn btn-default">Login</a>
            </div>
        </form>
    </fieldset>
</section>
@stop