<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Document</title>
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-style">
        <a class="navbar-brand app-title" href="/"><strong>Events</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto menu">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/analytics">Analytics </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-success my-2 my-sm-0" href="/register">Register</a>
                @guest
                <a class="btn btn-outline-success my-2 my-sm-0" href="/login">Login</a>
                @endguest
                @auth
                <a class="btn btn-outline-success my-2 my-sm-0" href="/events/create">New Event</a>
                <form style="display: inline-block" method="POST" action="{{ route('logout') }}">
                    @csrf
                <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
                </form>
                @endauth

            </li>
          </ul>
        </div>
      </nav>
</header>