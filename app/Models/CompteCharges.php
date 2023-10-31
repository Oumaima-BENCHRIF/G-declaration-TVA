<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CompteCharges extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'compte_charges';
    protected $fillable = [
        'N_compte_charges_immob',
        'Intitule',
    ];

    protected $dates = ['deleted_at'];
}
