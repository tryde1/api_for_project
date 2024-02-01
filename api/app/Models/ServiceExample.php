<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ServiceExample extends Model
{
    use HasFactory, SortableTrait;

    protected $fillable = [
        'example_id',
        'service_id'
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function example() {
        return $this->belongsTo(Example::class);
    }
}
