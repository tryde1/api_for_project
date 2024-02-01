<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceProject>
 */
class ServiceProjectFactory extends Factory
{
    protected $model = ServiceProject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::get()->random()->id,
            'project_id' => Project::get()->random()->id
        ];
    }
}
