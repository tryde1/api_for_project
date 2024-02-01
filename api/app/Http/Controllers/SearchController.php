<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\FAQResource;
use App\Http\Resources\FeedbackResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SubserviceResource;
use App\Http\Resources\VacancyResource;
use App\Http\Resources\VideoResource;
use App\Models\Article;
use App\Models\FAQ;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\Service;
use App\Models\Subservice;
use App\Models\Vacancy;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request): JsonResponse {
        $search = $request->search;

        $service = Service::search($search)->get();
        //$subservices = Subservice::search($search)->ordered()->get();
        $subservices = Subservice::search($search)->get();
        //$articles = Article::search($search)->with('services')->with('tags')->with('photos')->ordered()->get();
        $articles = Article::search($search)->get();
        //$faq = FAQ::search($search)->ordered()->get();
        $faq = FAQ::search($search)->get();
        //$feedback = Feedback::search($search)->where('show', true)->ordered()->get();
        $feedback = Feedback::search($search)->get();
        //$projects = Project::search($search)->with('services')->with('photos')->ordered()->get();
        $projects = Project::search($search)->get();
        //$vacancy = Vacancy::search($search)->with('conditions')->ordered()->get();
        $vacancy = Vacancy::search($search)->get();
        //$video = Video::search($search)->ordered()->get();
        $video = Video::search($search)->get();
        return new JsonResponse([
            'service' => ServiceResource::collection($service),
            'subservices' => SubserviceResource::collection($subservices),
            'articles' => ArticleResource::collection($articles),
            'faq' => FAQResource::collection($faq),
            'feedback' => FeedbackResource::collection($feedback),
            'projects' => ProjectResource::collection($projects),
            'vacancy' => VacancyResource::collection($vacancy),
            'video' => VideoResource::collection($video),
        ]);
    }
}
