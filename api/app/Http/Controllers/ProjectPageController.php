<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\VideoResource;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index(): JsonResponse {
        $projectsOnPage = 9;

        $projects = Project::with('services')->with('subservices')->with('photos')->with('data')->filterBy(request()->all())->ordered()->paginate($projectsOnPage);

        return new JsonResponse([
            'projects' => ProjectResource::collection($projects),
            'pages' => $projects->lastPage(),
        ]);
    }

    public function getOne($id): JsonResponse {
        $project = Project::with('services')->with('photos')->with('data')->with('customer')->where('id', $id)->firstOrFail();

        $projects = Project::with('services')->with('photos')->ordered()->get();

        $customer = $project->customer;

        $video = Video::ordered()->get();

        return new JsonResponse([
            'project' => new ProjectResource($project),
            'projects' => ProjectResource::collection($projects),
            'video' => VideoResource::collection($video),
            'customer' => new CustomerResource($customer),
        ]);
    }
}
