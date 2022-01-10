@extends('layouts.main')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form method="POST" action="/login">
            @csrf
           
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
</div>

@endsection


