<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
/*********************************************************************************/
