@extends('admin.layout', [
  'title' => 'Create a new pet'
])

@section('headline')

  Create a new pet

@endsection

@section('content')
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li style="color: red">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  @if(Session::has('success_message'))
    <div class="alert alert-success"  style="color: green">
        {{ Session::get('success_message') }}
    </div>
  @endif

  @if ($animal->id !== null)
    <form action="{{action('AnimalController@update', ['id' => $animal->id])}}" method="post">
      @method('put')
  @else
    <form action="{{action('AnimalController@store')}}" method="post">
  @endif

  {{-- <form action="{{ action('AnimalController@store') }}" method="post">                                 don't need it anymore --}}     
    @csrf
    <div class="form-group">
      @csrf
      <label for="">Name:</label>
      {{-- @if ($errors->has('name'))
        <ul>
          @foreach ($errors->get('name') as $error)
            <li style="color: red">{{$error}}</li>
          @endforeach
        </ul>
      @endif --}}
      <input type="text" name="name" value="{{ old('name', $animal->name) }}">
      <label for="">Client:</label>
      <input type="text" name="client_id" value="{{ old('client_id', $animal->client_id) }}">
      <label for="">Species:</label>
      <input type="text" name="species" value="{{ old('species', $animal->species) }}">
      <label for="">Breed:</label>
      <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}">
      <label for="">Age:</label>
      <input type="text" name="age" value="{{ old('age', $animal->age) }}">
      <label for="">Weight:</label>
      <input type="text" name="weight" value="{{ old('weight', $animal->weight) }}">
      {{-- <label for="">Photo:</label>
      <input type="text" name="photo" value="{{ old('photo', $animal->photo) }}"> --}}
    </div>
    <div class="form-group">
      <button type="submit">Save</button>
    </div>
  </form>

@endsection