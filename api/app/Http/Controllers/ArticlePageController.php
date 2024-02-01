<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\VideoResource;
use App\Models\Article;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticlePageController extends Controller
{
    public function index(): JsonResponse {
        $articles = Article::with('services')->with('tags')->with('photos')->filterBy(request()->all())->ordered()->paginate(16);

        return new JsonResponse([
            'articles' => ArticleResource::collection($articles),
            'pages' => $articles->lastPage(),
        ]);
    }

    public function getOne($id): JsonResponse {
        $article = Article::with('services')->with('tags')->with('photos')->where('id', $id)->firstOrFail();

        $video = Video::ordered()->get();

        $articles = Article::with('services')->with('tags')->with('photos')->ordered()->get();
        return new JsonResponse([
            'article' => new ArticleResource($article),
            'articles' => ArticleResource::collection($articles),
            'video_tours' => VideoResource::collection($video),
        ]);
    }
}
