
@extends('layouts.main')
@section('content')    
<div class="container mt-4">
    
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-title">Register User</h3>
        <form method="POST" action="/register">
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
                <label for="firstName">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="firstName" placeholder="Enter first name">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="lastName" placeholder="Enter last name">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="password">Gender</label>
                <div class="ml-3 form-check form-check-inline">
                    <input class="form-check-input" {{ old('gender') == 'male' ? 'checked' : '' }} type="radio" name="gender" id="genderMale" value="male">
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" {{ old('gender') == 'female' ? 'checked' : '' }} id="genderFemale" value="female">
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div><br>
                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" id="dob" placeholder="Date of Birth">
                @error('date_of_birth')
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


