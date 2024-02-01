<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;

class FeedbackPageController extends Controller
{
    public function index(): JsonResponse {
        $feedback = Feedback::where('show', true)->ordered()->get();

        return new JsonResponse([
            'feedback' => FeedbackResource::collection($feedback)
        ]);
    }
}
