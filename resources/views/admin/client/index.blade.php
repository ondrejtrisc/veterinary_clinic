@extends('admin/layout', [
    'title' => 'Clients'
])

@section('content')
    
    <table>
        <thead>
            <th>Surname</th>
            <th>First Name</th>
            <th>Pet<th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($clients as $client)
              @foreach ($client->animals as $animal)
                <tr>
                  <td>{{ $client->surname }}</td>
                  <td>{{ $client->first_name }}</td>
                  <td><a href="{{action('AnimalController@show', ['id' => $animal->id])}}">{{ $animal->name }}</a></td>
                  <td><a href="{{action('ClientController@edit', ['id' => $client->id])}}">Edit</a></td>
                </tr>
              @endforeach
            @endforeach
        </tbody>
    </table>
@endsection