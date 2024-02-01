<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExampleResource;
use App\Http\Resources\FAQResource;
use App\Http\Resources\OfferPhoto;
use App\Http\Resources\OfferResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SubserviceResource;
use App\Http\Resources\VideoResource;
use App\Models\Certificate;
use App\Models\Example;
use App\Models\FAQ;
use App\Models\Offer;
use App\Models\PhotoOffer;
use App\Models\Service;
use App\Models\Subservice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index($id): JsonResponse {

        $service = Service::with('examples')->with('videos')->with('offer')->where('id', $id)->ordered()->firstOrFail();

        $otherServices = Service::with('subservices')->where('show', '=', 'true')->ordered()->get();

        $subservices = Subservice::where('service_id', $id)->with('compositions')->ordered()->get();

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
            'subservices' => SubserviceResource::collection($subservices),
            'examples' => ExampleResource::collection($examples),
            'videos' =>  VideoResource::collection($videos),
            'faq' => FAQResource::collection($faq),
            'OtherServices' => ServiceResource::collection($otherServices),
        ]);
    }
}
