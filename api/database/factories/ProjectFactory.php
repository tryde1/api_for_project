<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Дилерский центр Lexus',
            'description' => 'Описание проекта',
            'logo' => 'logo.png',
            'sort_order' => 1,
            'customer_id' => 1,
            'video_preview' => 'preview.png'
        ];
    }
}
