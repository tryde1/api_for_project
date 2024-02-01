<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartnerResource;
use App\Http\Resources\StaffResource;
use App\Models\Partner;
use App\Models\Staff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(): JsonResponse {
        $staff = Staff::with('position')->ordered()->get();

        $partners = Partner::where('show', true)->ordered()->get();

        return new JsonResponse([
            'staff' => StaffResource::collection($staff),
            'partners' => PartnerResource::collection($partners)
        ]);
    }
}
