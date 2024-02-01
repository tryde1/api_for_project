<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    protected $model = Staff::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Иван',
            'surname' => 'Иванов',
            'middlename' => 'Иванович',
            'position_id' => Position::get()->random()->id,
            'photo' => 'image.png',
            'sort_order' => 1,
        ];
    }
}
