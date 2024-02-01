<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Subservice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subservice>
 */
class SubserviceFactory extends Factory
{
    protected $model = Subservice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Строительство ангаров',
            'service_id' => Service::get()->random()->id,
            'description' => 'Описание',
            'image' => 'image.png',
            'price' => '100000',
            'sort_order' => 1,
        ];
    }
}
