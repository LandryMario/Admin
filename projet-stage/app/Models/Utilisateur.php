<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Utilisateur extends Model
{
    use HasFactory;

    
protected $table ='users';

protected $attributes = [
    'usertype' => 2,
    'status' => false,
];

protected $fillable =[
    'immatricule',
    'name',
    'email',
    'tpi_id',
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
            $user->tpi_id = $admin->tpi_id;
        }
    });
}

public static function modifier($id ,$name, $email, $immatricule)
    {
        try{
            $user = self::find($id);
            if (!$user) {
                throw new Exception("Utilisateur introuvable.");
            }
    
            $user->immatricule = $immatricule;
            $user->name = $name;
            $user->email = $email;
            $user->save();
    
            return $user;
            
        }catch (Exception $e ){
            throw new Exception($e->getMessage());
        }
    }
}

