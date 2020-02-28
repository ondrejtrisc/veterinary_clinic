<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('surname', 'asc')->get();

        return view('admin/clients/index', compact('clients'));
    }
}
