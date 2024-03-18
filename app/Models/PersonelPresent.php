<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonelPresent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('number', 'like', '%' . $search . '%');
        });
    }
}
