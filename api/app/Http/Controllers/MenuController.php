<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $services = Service::with('subservices')->where('show', '=', 'true')->ordered()->get();

        return new JsonResponse([
            'services' => ServiceResource::collection($services),
        ]);
    }
}
