@extends('admin/layout', [
    'title' => 'Search'
])

@section('content')
  <form action="{{action('AnimalController@index2')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="submit" name="search">
  </form>
@endsection