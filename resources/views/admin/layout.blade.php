<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <title>{{$title}}</title>
</head>
<body>
  
  <nav>
    <a href="{{action('ClientController@search')}}">Search Client</a>
    <a href="{{action('AnimalController@search')}}">Search Animal</a>
    <a href="{{action('ClientController@index')}}">All Clients</a>
    <a href="{{action('AnimalController@index')}}">All Animals</a>
    <a href="{{action('ClientController@create')}}">New Client</a>
    {{-- <a href="{{action('AnimalController@create')}}">New Animal</a> --}}
  </nav>

  @yield('content')
</body>
</html>