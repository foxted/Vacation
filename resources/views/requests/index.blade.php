@extends('layout')

@section('body')
    <div class="jumbotron">
        <div class="container">
            <h1>Employee requests</h1>
            <p>All of them want to go to Hawaii!</p>
        </div>
    </div>

    @if($vacationRequests->count())
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($vacationRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->start->toFormattedDateString() }}</td>
                        <td>{{ $request->end->toFormattedDateString() }}</td>
                        <td>@include('requests.partials.status', ['status' => $request->status])</td>
                        <td>
                            <form method="POST" action="{{ route('requests.update', $request) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <select name="status">
                                    <option @if($request->status == "pending") selected @endif value="pending">Pending</option>
                                    <option @if($request->status == "approved") selected @endif value="approved">Approve</option>
                                    <option @if($request->status == "declined") selected @endif value="declined">Declined</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>No employee wants to go in vacation for the moment.</p>
    @endif
@stop

@section('scripts')
    <script>
        $('select[name=status]').change(function(){
            $(this).parent('form').submit();
        });
    </script>
@stop