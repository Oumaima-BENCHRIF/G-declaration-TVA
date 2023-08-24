<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class achat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'achats';
    protected $fillable = [
        'N_facture',
        'Date_facture',
        'Date_payment',
        'Designation',
        'TVA_1',
        'TVA_2',
        'TVA_3',
        'M_HT_1',
        'M_HT_2',
        'M_HT_3',
        'M_TTC',
        'Prorata',
        'TVA_deductible',
        'FK_fournisseur',
        'FK_racines_1',
        'FK_racines_2',
        'FK_racines_3',
        'FK_type_payment',
        'FK_succursale',
        'FK_regime',
        'FK_fait_generateur',
        'TVA_deductible2',
        'TVA_deductible3',
    ];

    protected $dates = ['deleted_at'];
}
