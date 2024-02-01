<?php

namespace App\Http\Controllers;

use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VacancyPageController extends Controller
{
    public function index(): JsonResponse {
        $vacancy = Vacancy::with('conditions')->ordered()->get();

        return new JsonResponse([
            'vacancy' => VacancyResource::collection($vacancy)
        ]);
    }
}
