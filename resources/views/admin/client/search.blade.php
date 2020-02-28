@extends('admin/layout', [
    'title' => 'Search'
])

@section('content')
  <form action="{{action('ClientController@index2')}}" method="post">
    @csrf
    <input type="text" name="surname">
    <input type="submit" name="search">
  </form>
@endsection