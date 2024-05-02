<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Icas extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'icas';

    protected $fillable = [
        'user_id',
        'action_owner',
        'observation',
        'status',
        'steps_taken',
        'date',
    ];


    protected $casts = [
        'steps_taken' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icas_images');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function actionOwner()
    {
        return $this->belongsTo(User::class, 'action_owner_id');
    }

    public function icasImages()
    {
        return $this->hasMany(Media::class, 'model_id');
    }

    public function getActionOwnerNameAttribute()
    {
        return $this->actionOwner->name;
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }



}