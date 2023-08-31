<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class regime extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'regimes';
    protected $fillable = [
        'libelle',
        'periode',
        'date_DU',
        'date_AU',
    ];

    protected $dates = ['deleted_at'];
}
