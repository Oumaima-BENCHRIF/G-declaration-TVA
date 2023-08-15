<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fait_generateur extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'fait_generateurs';
    protected $fillable = [
        'libelle',
    ];

    protected $dates = ['deleted_at'];
}
