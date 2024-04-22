<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Image extends Model
{
    protected $fillable = [
        'voiture_id',
        'url'
    ];

    protected $primaryKey = 'id_img';

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
