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

    public function create()
    {
        $client = new Client;
        $client->first_name = '';
        $client->surname = '';
        $client->address = '';
        $client->email = '';
        $client->phone = '';
        return view('admin.client.edit', compact('client'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'surname' => 'required'
        ]);
        $client = new Client;
        $client->first_name = $request->input('first_name');
        $client->surname = $request->input('surname');
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
            'first_name' => 'required',
            'surname' => 'required'
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
}
