<?php

namespace Database\Factories;

use App\Models\Example;
use App\Models\Service;
use App\Models\ServiceExample;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceExample>
 */
class ServiceExampleFactory extends Factory
{
    protected $model = ServiceExample::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'example_id' => Example::get()->random()->id,
            'service_id' => Service::get()->random()->id
        ];
    }
}
