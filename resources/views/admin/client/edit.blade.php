@extends('admin.layout', [
  'title' => 'Create a new client'
])

@section('headline')

  Create a new client

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

  @if ($client->id !== null)
    <form action="{{action('ClientController@update', ['id' => $client->id])}}" method="post">
      @method('put')
  @else
    <form action="{{action('ClientController@store')}}" method="post">
  @endif

  {{-- <form action="{{ action('ClientController@store') }}" method="post">                                 don't need it anymore --}}     
    @csrf
    <div class="form-group">
      @csrf
      <label for="">First name:</label>
      {{-- @if ($errors->has('name'))
        <ul>
          @foreach ($errors->get('name') as $error)
            <li style="color: red">{{$error}}</li>
          @endforeach
        </ul>
      @endif --}}
      <input type="text" name="first_name" value="{{ old('first_name', $client->first_name) }}">
      <label for="">Surname:</label>
      <input type="text" name="surname" value="{{ old('surname', $client->surname) }}">
      <label for="">Address:</label>
      <input type="text" name="address" value="{{ old('address', $client->address) }}">
      <label for="">Email:</label>
      <input type="text" name="email" value="{{ old('email', $client->email) }}">
      <label for="">Phone:</label>
      <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
    </div>
    <div class="form-group">
      <button type="submit">Save</button>
    </div>
  </form>

@endsection