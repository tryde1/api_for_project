<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Summary extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'summary';

    protected $fillable = [
        'surname',
        'name',
        'middlename',
        'phonenumber',
        'file',
        'text'
    ];

    public function vacancy() {
        return $this->belongsTo(Vacancy::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('files');
    }
}
