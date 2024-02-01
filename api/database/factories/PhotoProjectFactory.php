<?php

namespace Database\Factories;

use App\Models\PhotoProject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotoProject>
 */
class PhotoProjectFactory extends Factory
{
    protected $model = PhotoProject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::get()->random()->id,
            'photo' => 'image.png'
        ];
    }
}
