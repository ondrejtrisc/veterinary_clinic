<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('surname', 'asc')->get();

        return view('admin/client/index', compact('clients'));
    }

    public function index2(Request $request)
    {
        $clients = Client::where('surname', 'like', '%' . $request->input('surname') . '%')->orderBy('first_name', 'asc')->get();

        return view('admin/client/index', compact('clients'));
    }

    public function search() {

        return view('admin/client/search');
    }

    public function show($id) {

        $client = Client::findOrFail($id);

        return view('admin/client/show', compact('client'));
    }
}
