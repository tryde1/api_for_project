<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Vacancy extends Model implements Sortable
{
    use HasFactory;
    use Searchable;

    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'nova_order_by' => 'DESC',
    ];

    #[SearchUsingFullText(['name'])]

    protected $fillable = [
        'name',
        'description',
        'salary'
    ];

    public function conditions() {
        return $this->belongsToMany(Condition::class, 'vacancy_condition', 'vacancy_id', 'condition_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
