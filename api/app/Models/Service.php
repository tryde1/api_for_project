<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Service extends Eloquent implements HasMedia, Sortable
{
    use HasFactory, InteractsWithMedia, SortableTrait, Searchable;

    #[SearchUsingFullText(['title'])]

    protected $fillable = [
        'title',
        'image',
        'description',
        'preview',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'nova_order_by' => 'DESC',
    ];

    public function subservices() {
        return $this->hasMany(Subservice::class);
    }

    public function videos() {
        return $this->belongsToMany(Video::class);
    }

    public function examples() {
        return $this->belongsToMany(Example::class);
    }

        public function articles() {
        return $this->belongsToMany(Article::class);
    }

    public function projects() {
        return $this->belongsToMany(Project::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
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
        $this->addMediaCollection('images');
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
