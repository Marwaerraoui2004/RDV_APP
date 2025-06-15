<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document; // suppose que tu as un modèle Document
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // Affiche la liste des documents (ex : page dashboard)
    public function index()
    {
        // Récupérer les derniers documents, par exemple 5 derniers
        $documents = Document::orderBy('created_at', 'desc')->take(5)->get();

        return view('patients.documents', compact('documents'));
    }

    // Téléchargement d'un document
    public function download($id)
    {
        $document = Document::findOrFail($id);

        // Supposons que le chemin du fichier est stocké dans $document->filepath
        return Storage::download($document->filepath, $document->filename);
    }
}

