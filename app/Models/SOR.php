<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SOR extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 's_o_r_s';

    protected $fillable = [
        'assignor_id',
        'action_owner',
        'observation',
        'status',
        'steps_taken',
        'date',
        'type_id',
    ];

    protected $casts = [
        'steps_taken' => 'array', // Cast the 'steps_taken' attribute to an array
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('sor_images'); // Specify the media collection name
    }

    public function assignor()
    {
        return $this->belongsTo(User::class, 'assignor_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function type()
    {
        return $this->belongsTo(SorTypes::class, 'type_id');
    }


}
