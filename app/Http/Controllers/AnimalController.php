<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Client;

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
        $clients = Client::all();
        $animal = new Animal;

        return view('admin.animal.edit', compact('animal', 'clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->client_id = $request->input('client_id');
        $animal->species_id = $request->input('species_id');
        $animal->breed_id = $request->input('breed_id');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');
        $animal->photo = $request->input('photo');
        $animal->save();
        session()->flash('success_message', 'Success!');

        return redirect('animals/'.$animal->id.'/edit');
    }

    public function edit($id)
    {
        $animal = Client::findOrFail($id);
        return view('admin.animal.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $animal->name = $request->input('name');
        $animal->client_id = $request->input('client_id');
        $animal->species_id = $request->input('species_id');
        $animal->breed_id = $request->input('breed_id');
        $animal->age = $request->input('age');
        $animal->weight = $request->input('weight');
        $animal->photo = $request->input('photo');
        $animal->save();
        session()->flash('success_message', 'Success!');
        return redirect('animals/'.$animal->id.'/edit');
    }

    public function delete($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return view('admin.animal.index');
    }

}
