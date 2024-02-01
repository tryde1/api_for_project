<?php

namespace App\Http\Controllers;

use App\Http\Resources\FAQResource;
use App\Models\FAQ;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FAQPageController extends Controller
{
    public function index(): JsonResponse {
        $faq = FAQ::ordered()->get();

        return new JsonResponse([
            'faq' => FAQResource::collection($faq)
        ]);
    }
}
