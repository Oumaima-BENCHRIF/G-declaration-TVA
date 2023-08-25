<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class racine extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'racines';
    protected $fillable = [
        'Taux',
        'Entilation_deducations',
        'code_racines',
    ];
    protected $dates = ['deleted_at'];

}
