
@extends('layouts.main')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-3 text-right">
           <h5><strong>Average Events Count : {{ $eventsCountAverage }}</strong></h5> 
        </div>
        <div class="col-md-6 offset-md-3">
            <h3 class="main-title">User wise events average count</h3>
            <table class="table table-bordered" id="eventUsers">
                <thead>
                    <th>Name</th>
                    <th>Total Events</th>
                    <th>Average Events Count</th>
                </thead>
                <tbody>
                    @foreach ($eventsCountByUser as $userCount)
                        <tr>
                            <td>{{ $userCount->full_name }}</td>
                            <td>{{ $userCount->count }}</td>
                            <td>
                            {{ number_format(((100 * array_sum(array_column($eventsCountByUser->toArray(), 'count'))) + $userCount->count) / (array_sum(array_column($eventsCountByUser->toArray(), 'count')) + 1), 2, '.', '') }}</td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>
</div>



@endsection