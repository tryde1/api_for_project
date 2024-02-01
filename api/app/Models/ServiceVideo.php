<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'service_id'
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function video() {
        return $this->belongsTo(Video::class);
    }
}
