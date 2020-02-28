@extends('admin/layout', [
    'title' => '{{$animal->name}} | {{$animal->client->surname}}}'
])

@section('content')
  <img src="/images/{{$animal->photo}}">
  Name: {{$animal->name}}<br>
  Species: {{$animal->species}}<br>
  Breed: {{$animal->breed}}<br>
  Age: {{$animal->age}}<br>
  Weight: {{$animal->weight}}<br>
  <hr>
  Owner: {{$animal->client->surname}} {{$animal->client->first_name}}<br>
  Address: {{$animal->client->address}}<br>
  E-mail: {{$animal->client->email}}<br>
  Telephone number: {{$animal->client->phone}}<br>
@endsection