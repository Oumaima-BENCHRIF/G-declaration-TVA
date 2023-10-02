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
        'TVA_7',
        'TVA_10',
        'TVA_14',
        'TVA_20',
        'M_HT_7',
        'M_HT_10',
        'M_HT_14',
        'M_HT_20',
        'M_TTC',
        'Prorata',
        'TVA_d7',
        'FK_fournisseur',
        'FK_racines_7',
        'FK_racines_10',
        'FK_racines_14',
        'FK_racines_20',
        'FK_type_payment',
        'FK_regime',
        'FK_fait_generateur',
        'TVA_d10',
        'TVA_d14',
        'TVA_d20',
        'Taux7',
        'Taux10',
        'Taux14',
        'Taux20',
        'num_racine_7',
        'num_racine_10',
        'num_racine_14',
        'num_racine_20',
        'Exercice',
        'TTC_7',
        'TTC_10',
        'TTC_14',
        'TTC_20',

    ];

    protected $dates = ['deleted_at'];
}
