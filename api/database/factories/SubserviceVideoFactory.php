<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceVideo;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceVideo>
 */
class ServiceVideoFactory extends Factory
{
    protected $model = ServiceVideo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'video_id' => Video::get()->random()->id,
            'service_id' => Service::get()->random()->id
        ];
    }
}
