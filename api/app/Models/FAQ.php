<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class FAQ extends Model implements Sortable
{
    use HasFactory;
    use Searchable;

    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'nova_order_by' => 'DESC',
    ];

    protected $table = 'faq';

    #[SearchUsingFullText(['question'])]

    protected $fillable = [
        'question',
        'answer'
    ];

    public function toSearchableArray(): array
    {
        return [
            'question' => $this->question,
        ];
    }
}
