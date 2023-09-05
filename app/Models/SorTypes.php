<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorTypes extends Model
{
    use HasFactory;

    protected $table = 'sor_types';

    protected $fillable = [
        'name',
        'description',
    ];

    public function sor()
    {
        return $this->hasMany(SOR::class);
    }


}
