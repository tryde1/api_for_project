<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Project extends Eloquent implements HasMedia, Sortable
{
    use HasFactory, InteractsWithMedia;
    use Searchable, SortableTrait;

    #[SearchUsingFullText(['title'])]

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'nova_order_by' => 'DESC',
    ];

    protected $fillable = [
        'title',
        'description',
        'logo',
        'url',
        'video',
        'customer_id',
        'video_preview'
    ];

    public function services() {
        return $this->belongsToMany(Service::class, 'project_service', 'project_id', 'service_id');
    }

    public function subservices() {
        return $this->belongsToMany(Subservice::class, 'project_subservice', 'project_id', 'subservice_id');
    }

    public function photos() {
        return $this->hasMany(PhotoProject::class);
    }

    public function data() {
        return $this->hasMany(ProjectData::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
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

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\ProjectFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }
}
