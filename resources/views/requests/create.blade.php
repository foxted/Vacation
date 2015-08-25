@extends('layout')

@section('body')
    <div class="container content">
        <fieldset>
            <legend>Request form</legend>

            <div class="row">
                <form method="POST" action="{{ route('requests.store') }}" class="col-md-6">

                    {{ csrf_field() }}

                    @if($errors->count())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="start">Starting date:</label>
                        <input type="date" name="start" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="end">Ending date:</label>
                        <input type="date" name="end" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </fieldset>
    </div>
@stop