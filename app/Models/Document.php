<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'url_fichier',
        'user_id',
    ];

    // Relation avec l'utilisateur propriétaire
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les utilisateurs avec qui le document est partagé
    public function sharedWith()
{
    return $this->belongsToMany(User::class, 'document_user', 'document_id', 'user_id');
}

}
