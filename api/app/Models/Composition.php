<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;

    protected $fillable = [
        'composition',
        'subsesrvice_id'
    ];

    public function subservice() {
        return $this->belongsTo(Subservice::class);
    }
}
