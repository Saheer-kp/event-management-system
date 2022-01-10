@extends('layouts.main')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div>
                <h3 class="main-title">Event Details</h3>
                <div class="mt-4">
                    <p><strong>Name : </strong>{{ $event->name }}</p>
                    <p><strong>Start Date : </strong>{{  Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}</p>
                    <p><strong>End Date : </strong>{{ Carbon\Carbon::parse($event->end_date)->format('F d, Y')  }}</p>
                    <p><strong>Created By : </strong>{{ $event->createdBy->full_name }}</p>
                </div>
                <div>
                    <h4>Event Users</h4>
                    <table class="table table-bordered" id="eventUsers">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($event->eventUsers as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ Str::ucfirst($user->gender) }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') }}</td>
                                    <td>
                                        <input type="hidden" id="csrf-input" value="{{ csrf_token() }}">
                                        <button class="btn btn-sm btn-danger remove-user" data-eventid="{{ $event->id }}" data-userid="{{ $user->id }}">Remove</button></td>
                                </tr>
                            @endforeach
                           @if (count($event->eventUsers) == 0)
                               <tr>
                                   <td colspan="5" style="text-align:center"><strong>No Records</strong></td>
                               </tr>
                           @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

