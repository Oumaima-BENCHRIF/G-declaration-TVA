<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class type_payment extends Model
{
 
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_portal';
    protected $id = 'id';
    protected $table = 'type_payments';
    protected $fillable = [
        'Num_payment',
        'Nom_payment',
    ];
    protected $dates = ['deleted_at'];
}
