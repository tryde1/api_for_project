<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\VideoResource;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Price;
use App\Models\Service;
use App\Models\Project;
use App\Models\Subservice;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(): JsonResponse
    {
        $services = Service::with('subservices')->where('show', '=', 'true')->ordered()->get();

        $articles = Article::with('services')->with('tags')->with('photos')->filterBy(request()->all())->ordered()->get();

        $projects = Project::with('services')->with('photos')->filterBy(request()->all())->ordered()->get();

        $video = Video::ordered()->get();

        //достаем данные из бд и отдаем их в виде коллекций ресурсов (https://laravel.com/docs/10.x/eloquent-resources)
        return new JsonResponse([
            'services' => ServiceResource::collection($services),
            'projects' => ProjectResource::collection($projects),
            'video_tours' => VideoResource::collection($video),
            'articles' => ArticleResource::collection($articles),
        ]);
    }
}
