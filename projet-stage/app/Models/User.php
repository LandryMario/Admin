<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
      
protected $table ='users';

protected $fillable =[
    'name',
    'email',
    'Cour_appel',
    'TPI',
    'password',
];

protected $attributes = [
    'usertype' => 1,
];

protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($request = request()->input('TPI')) {
                $tpi = DB::table('tpi')->where('nom', $request)->first();
                if ($tpi) {
                    $user->tpi_id = $tpi->id;
                }
            }
        });
    }
}
