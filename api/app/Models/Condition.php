<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition'
    ];

    public function vacancies() {
        return $this->belongsToMany(Vacancy::class, 'vacancy_condition', 'condition_id', 'vacancy_id');
    }
}
