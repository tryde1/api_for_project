<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExampleResource;
use App\Http\Resources\FAQResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SubserviceResource;
use App\Http\Resources\VideoResource;
use App\Models\FAQ;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Subservice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubservicePageController extends Controller
{
    public function getOne($id): JsonResponse {
        $subservice = Subservice::where('id', $id)->with('compositions')->with('service')->firstOrFail();

        $service = Service::where('id', $subservice->service_id)->with('examples')->with('videos')->with('offer')->firstOrFail();

        $subservices = $service->subservices;

        if ($service->offer != null) {
            $offer = Offer::where('id', $service->offer()->get()[0]->id)->with('photos')->get();

            $service->offer = $offer;

            foreach ($service->offer[0]->photos as $el) {
                $el->photo = $el->getFirstMediaUrl('main');
            }
        }

        $examples = $service->examples;

        $videos = $service->videos;
        $faq = FAQ::ordered()->get();

        return new JsonResponse([
            'service' => new ServiceResource($service),
            'subservice' => new SubserviceResource($subservice),
            'examples' => ExampleResource::collection($examples),
            'videos' =>  VideoResource::collection($videos),
            'faq' => FAQResource::collection($faq),
        ]);
    }
}
