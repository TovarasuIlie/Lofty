<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MadeToMeasure extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'made_to_measure';

    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'height',
        'bust_circumference',
        'circumference_under_the_bust',
        'waist_circumference',
        'hips_circumference',
        'arm_length',
        'inside_length_leg',
        'shoulder_width',
        'status',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 320, 450);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('made-to-measure')->useDisk('made-to-measure');
    }
}
