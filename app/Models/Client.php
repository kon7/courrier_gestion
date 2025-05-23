<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'domaine_id',
        'prenom',
        'date_naissance',
        'profession',
        'date_debut',
        'date_fin',
    ];

    public function domaine()
                {
                    return $this->belongsTo(Domaine::class);
                }
   

}