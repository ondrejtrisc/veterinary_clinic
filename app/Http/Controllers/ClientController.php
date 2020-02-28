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
        return $request->input('surname');

        $clients = Client::whereLike('surname', '%' . $request->input('surname') . '%')->orderBy('name', 'asc')->get();

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
