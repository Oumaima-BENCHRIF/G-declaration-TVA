<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auth extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $id = 'id';
    protected $table = 'auths';
    protected $fillable = [
        'name',
        'email',
        'Prenom',
        'nomBD',
        'Telephone',
        'Fax',
        'password',
    ];

    protected $dates = ['deleted_at'];
}
