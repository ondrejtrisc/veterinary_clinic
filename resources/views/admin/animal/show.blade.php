@extends('admin/layout', [
    'title' => 'Animal'
])

@section('content')
  <img src="/images/{{$animal->photo}}"><br>
  Name: {{$animal->name}}<br>
  Species: {{$animal->species}}<br>
  Breed: {{$animal->breed->name}}<br>
  Age: {{$animal->age}}<br>
  Weight: {{$animal->weight}}<br>
  <hr>
  Owner: <a href="{{action('ClientController@show', ['id' => $animal->client->id])}}">{{$animal->client->first_name}} {{$animal->client->surname}}</a><br>
  Address: {{$animal->client->address}}<br>
  E-mail: {{$animal->client->email}}<br>
  Telephone number: {{$animal->client->phone}}<br>
@endsection