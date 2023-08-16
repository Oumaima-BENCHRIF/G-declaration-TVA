<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class succursale extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'succursales';
    protected $fillable = [
        'nom_succorsale',
        'ICE',
        'Email',
        'Activite',
        'ID_Fiscale',
        'Ville',
        'Tele',
        'Adresse',
        'Fax',
        'FK_Regime',
        'FK_fait_generateurs',
    ];

    protected $dates = ['deleted_at'];
}