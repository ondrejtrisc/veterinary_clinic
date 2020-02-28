<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    public function show($id)
    {
        $animal = Animal::findOrFail($id);

        return view('admin/animal/show', compact('animal'));
    }
}
