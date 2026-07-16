<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientDocumentController extends Controller
{
    /**
     * Store uploaded document.
     */
    public function store(Request $request, Client $client)
    {
        $request->validate([
            'document_type' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:5120',
        ]);

        $file = $request->file('document');

        $path = $file->store('client_documents', 'public');

        ClientDocument::create([
            'client_id'      => $client->id,
            'document_name'  => $file->getClientOriginalName(),
            'document_type'  => $request->document_type,
            'file_path'      => $path,
        ]);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Document uploaded successfully.');
    }

    /**
     * Download document.
     */
    public function download(ClientDocument $document)
    {
        return Storage::disk('public')->download(
            $document->file_path,
            $document->document_name
        );
    }

    /**
     * Delete document.
     */
    public function destroy(ClientDocument $document)
    {
        Storage::disk('public')->delete($document->file_path);

        $client = $document->client;

        $document->delete();

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Document deleted successfully.');
    }
}