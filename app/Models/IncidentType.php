<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{
    use HasFactory;

    protected $table = 'incident_type';

    protected $fillable =
    [
        'incident_type',
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class, 'incident_type_id');
    }

    public function getIncidentType()
    {
        return $this->name;
    }
}
