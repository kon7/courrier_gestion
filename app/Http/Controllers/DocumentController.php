<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        // Liste des documents de l'utilisateur connecté
        $documents = Document::where('user_id', auth()->id())->get();

        return response()->json($documents);
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'fichier' => 'required|file|mimes:pdf,doc,docx,jpg,png',
    //     ]);

    //     // Upload du fichier
    //     if ($request->hasFile('fichier')) {
    //         $data['fichier'] = $request->file('fichier')->store('documents');
    //     }

    //     $data['user_id'] = auth()->id();

    //     $document = Document::create($data);

    //     return response()->json($document, 201);
    // }

    public function store(Request $request)
    {
        try {
            // Initialisation du tableau des données
            $data = $request->all();
    
            // Gestion du fichier
            if ($request->hasFile('fichier')) {
                // Stockage du fichier et génération de l'URL publique
                $cheminFichier = $request->file('fichier')->store('documents', 'public');
                $data['url_fichier'] = \Storage::url($cheminFichier);
            } else {
                \Log::error('Aucun fichier reçu dans la requête.');
                return response()->json(['error' => 'Aucun fichier reçu.'], 400);
            }
    
            // Ajouter l'ID de l'utilisateur
            $data['user_id'] = auth()->id();
    
            // Création du document
            $document = Document::create($data);
    
            return response()->json([
                'message' => 'Document enregistré avec succès.',
                'document' => $document,
            ], 201);
        } catch (\Exception $e) {
            // Gestion des erreurs
            \Log::error('Erreur lors de l\'enregistrement du document : ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de l\'enregistrement du document.'], 500);
        }
    }
    
    
    


    public function show(Document $document)
{
    // Vérifie si l'utilisateur est propriétaire ou si le document est partagé avec lui
    if ($document->user_id !== auth()->id() && !$document->sharedWith()->where('user_id', auth()->id())->exists()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    return response()->json($document);
}

    public function update(Request $request, Document $document)
    {
        $this->authorizeAccess($document);

        $data = $request->validate([
            'titre' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        // Upload du nouveau fichier si fourni
        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('documents');
        }

        $document->update($data);

        return response()->json($document);
    }

    public function destroy(Document $document)
{
    // Seul le propriétaire peut supprimer un document
    if ($document->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $document->delete();

    return response()->json(['message' => 'Document deleted']);
}

    private function authorizeAccess(Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }

    public function share(Request $request, Document $document)
{
    // Vérifie que l'utilisateur connecté est le propriétaire
    if ($document->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Valider la liste des utilisateurs
    $data = $request->validate([
        'user_ids' => 'required|array',
        'user_ids.*' => 'exists:users,id', // Chaque ID doit exister dans la table `users`
    ]);

    // Ajouter les utilisateurs au document
    $document->sharedWith()->syncWithoutDetaching($data['user_ids']);

    return response()->json(['message' => 'Document shared successfully']);
}
public function sharedUsers(Document $document)
{
    if ($document->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    return response()->json($document->sharedWith);
}

public function accessibleDocuments()
{
    $userId = auth()->id();

    // Documents personnels (créés par l'utilisateur)
    $personalDocuments = Document::where('user_id', $userId)
        ->get()
        ->map(function ($doc) {
            $doc->is_shared = false; // Marquer comme personnel
            return $doc;
        });

    // Documents partagés (partagés avec l'utilisateur)
    $sharedDocuments = Document::whereHas('sharedWith', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })
    ->get()
    ->map(function ($doc) {
        $doc->is_shared = true; // Marquer comme partagé
        return $doc;
    });

    // Fusionner les deux collections
    $allDocuments = $personalDocuments->merge($sharedDocuments);

    return response()->json($allDocuments);
}



}
