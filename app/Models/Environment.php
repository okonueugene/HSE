<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    protected $table = 'environments';

    protected $fillable = [
        'user_id',
        'checklist',
        'type',
        'comments',
        'corrective_actions',
        'project_manager',
        'auditor',
        'status'
    ];
        

    protected $casts = [
        'corrective_actions' => 'array',
        'checklist' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
