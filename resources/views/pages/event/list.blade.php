@extends('layouts.main')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <h3 class="main-title">Events List</h3>
        </div>
        <div class="col-md-8">
            <form action="/events">
                <div class="form-group">
                    <div class="input-group ">
                            <input type="text" name="q" value="{{ old('q') }}" placeholder="Search" class="form-control mr-1">
                            <input type="date" name="from_date" value="{{ old('from_date') }}" class="form-control mr-1">
                            <input type="date" name="to_date" value="{{ old('to_date') }}" class="form-control mr-1">
                            <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            
        </div>
        @foreach ($events as $event)
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                  <h5>{{ $event->name }}</h5>
                </div>
                <div class="card-body">
                  <p class="card-text"><strong>Start Date: </strong>{{ Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}</p>
                  <p class="card-text"><strong>End Date: </strong>{{ Carbon\Carbon::parse($event->end_date)->format('F d, Y') }}</p>
                </div>
              </div>
        </div>
        @endforeach
        @if($events->total() == 0)
            <div class="col-md-12 mt-4 text-center">
                <h5>No events found</h5>
            </div>
        @endif
        <div class="col-12 mt-3">
            {{ $events->links() }}
        </div>
    </div>
</div>

@endsection

