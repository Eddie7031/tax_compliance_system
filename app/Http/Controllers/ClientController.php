<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'company_name' => 'required|max:255',
        'pin' => 'required|unique:clients,pin',
        'email' => 'nullable|email',
        'phone' => 'nullable|max:255',
        'contact_person' => 'nullable|max:255',
        'industry' => 'nullable|max:255',
        'address' => 'nullable',
    ]);

    $validated['is_active'] = $request->has('is_active');

    Client::create($validated);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client added successfully.');
}

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
{
    return view('clients.edit', compact('client'));
}

    public function update(Request $request, Client $client)
{
    $validated = $request->validate([
        'company_name'   => 'required|max:255',
        'pin'            => 'required|unique:clients,pin,' . $client->id,
        'email'          => 'nullable|email',
        'phone'          => 'nullable|max:255',
        'contact_person' => 'nullable|max:255',
        'industry'       => 'nullable|max:255',
        'address'        => 'nullable',
    ]);

    $validated['is_active'] = $request->has('is_active');

    $client->update($validated);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client updated successfully.');
}
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}