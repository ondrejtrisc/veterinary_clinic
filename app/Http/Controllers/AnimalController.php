<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view('admin/animal/show', compact('animal'));
    }
}
