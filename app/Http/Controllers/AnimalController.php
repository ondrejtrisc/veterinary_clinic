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
}
