<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    protected $model = Price::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'objecttype' => 'Здание',
            'orgname' => 'ДСМ',
            'town' => 'Владивосток',
            'email' => 'example@mail.ru',
            'fio' => 'Иванов Иван Иванович',
            'phonenumber' => '89999999999',
            'technicaltask' => 'task.docx'
        ];
    }
}
