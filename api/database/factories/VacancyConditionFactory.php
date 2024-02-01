<?php

namespace Database\Factories;

use App\Models\Condition;
use App\Models\Vacancy;
use App\Models\VacancyCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VacancyCondition>
 */
class VacancyConditionFactory extends Factory
{
    protected $model = VacancyCondition::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vacancy_id' => Vacancy::get()->random()->id,
            'condition_id' => Condition::get()->random()->id
        ];
    }
}
