<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courrier;


class CourrierController extends Controller
{
    
    public function index()
    {
        // Liste des courriers pour l'utilisateur connecté
        $userId = auth()->id();
        $courriers = Courrier::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->get();
            
            foreach ($courriers as $courrier) {
                $courrier->is_receiver = $courrier->receiver_id === $userId;
                $courrier->is_sender = $courrier->sender_id === $userId;
            }
        return response()->json($courriers);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'motif' => 'required|string|max:255',
            'contenu' => 'required|string',
            'receiver_id' => 'required|exists:users,id',
            'fichier_joint' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // Upload du document si présent
        if ($request->hasFile('fichier_joint')) {
            $cheminFichier = $request->file('fichier_joint')->store('courriers', 'public');
            $data['fichier_joint'] = \Storage::url($cheminFichier);
            // $data['document'] = $request->file('document')->store('documents');
        }

        $data['sender_id'] = auth()->id();

        $courrier = Courrier::create($data);

        return response()->json($courrier, 201);
    }

    public function show(Courrier $courrier)
    {
        // Vérifier l'accès
        $this->authorizeAccess($courrier);

        return response()->json($courrier->load(['sender', 'receiver']));
    }

    public function update(Request $request, Courrier $courrier)
    {
        $this->authorizeAccess($courrier);

        $data = $request->validate([
            'motif' => 'sometimes|string|max:255',
            'contenu' => 'sometimes|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('documents');
        }

        $courrier->update($data);

        return response()->json($courrier);
    }

    public function destroy(Courrier $courrier)
    {
        $this->authorizeAccess($courrier);

        $courrier->delete();

        return response()->json(['message' => 'Courrier deleted']);
    }

    private function authorizeAccess(Courrier $courrier)
    {
        $userId = auth()->id();
        if ($courrier->sender_id !== $userId && $courrier->receiver_id !== $userId) {
            abort(403, 'Unauthorized');
        }
    }
}
