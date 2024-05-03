<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    protected $table = 'permits';

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'authorized_person',
        'area_owner',
        'competent_person',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
