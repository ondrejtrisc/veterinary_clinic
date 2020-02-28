@extends('admin/layout', [
    'title' => '{{$client->first_name}} {{$client->surname}}}'
])

@section('content')

  Name: {{$client->first_name}} {{$client->surname}}<br>
  Address: {{$client->address}}<br>
  E-mail: {{$client->email}}<br>
  Telephone number: {{$client->phone}}<br>
  <hr>

  @foreach ($client->animals as $animal)
    <img src="/images/{{$animal->photo}}"><br>
    Name: <a href="{{action('AnimalController@show', ['id' => $animal->id])}}">{{$animal->name}}</a><br>
    <hr>
  @endforeach  
@endsection