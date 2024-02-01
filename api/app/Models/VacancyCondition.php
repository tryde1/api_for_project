<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_id',
        'condition_id'
    ];

    public function vacancy() {
        return $this->belongsTo(Vacancy::class);
    }

    public function condition() {
        return $this->belongsTo(Condition::class);
    }
}
