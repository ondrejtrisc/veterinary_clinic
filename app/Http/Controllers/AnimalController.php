<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::orderBy('name', 'asc')->get();

        return view('admin/animal/index', compact('animals'));
    }

    public function index2(Request $request)
    {
        $animals = Animal::where('name', 'like', '%' . $request->input('name') . '%')->orderBy('name', 'asc')->get();

        return view('admin/animal/index', compact('animals'));
    }

    public function search() {

        return view('admin/animal/search');
    }
    
    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view('admin/animal/show', compact('animal'));
    }

    
    public function create()
    {
        $animal = new Client;
        $animal->first_name = '';
        $animal->surname = '';
        $animal->address = '';
        $animal->email = '';
        $animal->phone = '';
        return view('admin.animal.edit', compact('animal'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $client = new Client;
        $client->name = $request->input('first_name');
        $client->client_id = $request->input('surname');
        $client->address = $request->input('address');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->save();
        session()->flash('success_message', 'Success!');

        return redirect('clients/'.$client->id.'/edit');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $client = Client::findOrFail($id);
        $client->first_name = $request->input('first_name');
        $client->surname = $request->input('surname');
        $client->address = $request->input('address');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->save();
        session()->flash('success_message', 'Success!');
        return redirect('clients/'.$client->id.'/edit');
    }
    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return view('admin.client.index');
    }

}
