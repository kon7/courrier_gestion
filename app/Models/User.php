<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'prenom',
        'date_naissance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


            //     public function role()
            // {
            //     return $this->belongsTo(Role::class);
            // }

            public function courriersEnvoyes()
            {
                return $this->hasMany(Courrier::class, 'sender_id');
            }

            public function courriersRecus()
            {
                return $this->hasMany(Courrier::class, 'receiver_id');
            }

            public function documents()
            {
                return $this->hasMany(Document::class);
            }
            public function sharedDocuments()
                {
                    return $this->belongsToMany(Document::class, 'document_user');
                }
     

            public function role()
                {
                    return $this->belongsTo(Role::class);
                }

public function hasRole($role)
{
    return $this->roles()->where('name', $role)->exists();
}

public function hasPermission($permission)
{
    foreach ($this->roles as $role) {
        if ($role->permissions()->where('name', $permission)->exists()) {
            return true;
        }
    }
    return false;
}



}
