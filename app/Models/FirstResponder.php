<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstResponder extends Model
{
    use HasFactory;

    protected $table = 'first_responders';

    protected $fillable = [
        'user_id',
        'name',
        'date',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
