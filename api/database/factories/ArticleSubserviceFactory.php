<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleService;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleService>
 */
class ArticleServiceFactory extends Factory
{
    protected $model = ArticleService::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => Article::get()->random()->id,
            'service_id' => Service::get()->random()->id
        ];
    }
}
