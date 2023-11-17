<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriversModel extends Model
{
    use HasFactory;

    protected $table = 'table_drivers';

    protected $fillable = [
        'name',
        'type_driver_id',
        'price',
        'description',
        'number',
        'img',
    ];

    public function imageIsSmaller()
    {
        $image_path = storage_path('app\\public\\' . $this->img);
        $image_size = getimagesize($image_path);

        return $image_size[0] < 400 || $image_size[1] < 400;
    }
}
