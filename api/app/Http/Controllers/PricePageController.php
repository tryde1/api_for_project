<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VideoResource;
use App\Models\Service;
use App\Models\Video;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PricePageController extends Controller
{
    public function index(): JsonResponse {
        $services = Service::with('subservices')->ordered()->get();

        $video = Video::ordered()->get();

        $articles = Article::with('services')->with('tags')->with('photos')->ordered()->get();

        return new JsonResponse([
            'services' => ServiceResource::collection($services),
            'video' => VideoResource::collection($video),
            'articles' => ArticleResource::collection($articles)
        ]);
    }
}
