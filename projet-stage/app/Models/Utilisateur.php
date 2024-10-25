<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Utilisateur extends Model
{
    use HasFactory;

    
protected $table ='users';

protected $attributes = [
    'usertype' => 2,
];

protected $fillable =[
    'immatricule',
    'name',
    'email',
    'Cour_appel',
    'TPI',
    'password',
    'usertype',
    'status',

];

protected $casts = [
    'status' => 'boolean',
];

protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $admin = Auth::user();
        if ($admin) {
            $user->Cour_appel = $admin->Cour_appel;
            $user->TPI = $admin->TPI;
        }
    });
}
}
/*********************************************************************************/
