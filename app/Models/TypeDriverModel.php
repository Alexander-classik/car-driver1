<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDriverModel extends Model
{
    use HasFactory;

    protected $table = 'table_type_driver';

    protected $fillable = [
        'name',
    ];
}
