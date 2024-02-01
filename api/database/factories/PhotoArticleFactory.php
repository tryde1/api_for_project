<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\PhotoArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotoArticle>
 */
class PhotoArticleFactory extends Factory
{
    protected $model = PhotoArticle::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => Article::get()->random()->id,
            'photo' => 'image.png'
        ];
    }
}
