@extends('admin/layout', [
    'title' => 'Animals'
])

@section('content')
    
    <table>
        <thead>
            <th>Name</th>
            <th>Owner</th>
            <th><th>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
              <tr>
                <td>{{ $animal->name }}</td>
                <td><a href="{{action('ClientController@show', ['id' => $animal->client->id])}}">{{$animal->client->first_name}} {{$animal->client->surname}}</a></td>
                <td><img src="/images/{{$animal->photo}}"><br></td>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection