@extends('layout')

@section('body')
    <div class="jumbotron">
        <div class="container">
            <h1>Vacation App</h1>
            <p class="lead">You need a break, <a href="{{ route('requests.create') }}" class="btn btn-primary"> ask for vacation time now!</a></p>
        </div>
    </div>

    @if($vacationRequests->count())
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Beginning</td>
                    <td>End</td>
                    <td>Status</td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                @foreach($vacationRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->start->toFormattedDateString() }}</td>
                        <td>{{ $request->end->toFormattedDateString() }}</td>
                        <td>@include('requests.partials.status', ['status' => $request->status])</td>
                        <td>
                            <form method="POST" action="{{ route('requests.destroy', $request) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i>&nbsp;Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@stop