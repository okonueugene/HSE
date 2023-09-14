<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Incident extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



    protected $table = 'incidents';

    protected $fillable =
    [
        'user_id',
        'incident_type',
        'incident_date',
        'investigation_status',
        'incident_description',
        'incident_status',

    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('incident_images');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class, 'incident_type_id');
    }
}
