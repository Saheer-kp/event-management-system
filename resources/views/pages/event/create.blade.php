@extends('layouts.main')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-title">New Event</h3>
        <form method="POST" action="/events">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="form-group">
                <label for="firstName">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="firstName" placeholder="Enter event name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
           
            <div class="form-group">
                <label for="dob">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date') ? old('start_date') : now()->format('Y-m-d') }}" class="form-control" id="dob" placeholder="Date of Birth">
                @error('start_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="dob">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" id="dob" placeholder="Date of Birth">
                @error('end_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/" class="btn btn-danger">Cancel</a>
        </form>
        </div>
    </div>
</div>

@endsection

