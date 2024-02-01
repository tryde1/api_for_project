<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleService extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'service_id'
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
