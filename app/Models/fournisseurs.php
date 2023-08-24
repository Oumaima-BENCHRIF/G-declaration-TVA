<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class fournisseurs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'fournisseurs';
    protected $fillable = [
        'nomFournisseurs',
        'Designation',
        'Adresse',
        'telephone',
        'ville',
        'NICE',
        'Fax',
        'Num_compte_comptable',
        'ID_fiscale',
        
    ];

    protected $dates = ['deleted_at'];

}
