<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetFeedbackRequest;
use App\Http\Requests\GetQuestionRequest;
use App\Http\Requests\GetSummaryRequest;
use App\Http\Requests\GiveConsultationRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\SubmitPriceRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\FAQResource;
use App\Http\Resources\FeedbackResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SubserviceResource;
use App\Http\Resources\VacancyResource;
use App\Http\Resources\VideoResource;
use App\Mail\ConsultationForm;
use App\Mail\FeedbackForm;
use App\Mail\PriceForm;
use App\Mail\QuestionForm;
use App\Mail\VacancyForm;
use App\Models\Article;
use App\Models\Consultation;
use App\Models\FAQ;
use App\Models\Feedback;
use App\Models\Manager;
use App\Models\Price;
use App\Models\Project;
use App\Models\Question;
use App\Models\Subservice;
use App\Models\Summary;
use App\Models\Vacancy;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Query\Search;
use League\Flysystem\StorageAttributes;

class FormController extends Controller
{
    public function submitPrice(SubmitPriceRequest $request): JsonResponse
    {
        $data = $request->validated();

        $filename = $request->technicaltask;
        $price = Price::create([
            'objecttype' => $data['objecttype'],
            'orgname' => $data['orgname'],
            'town' => $data['town'],
            'email' => $data['email'],
            'fio' => $data['fio'],
            'phonenumber' => $data['phonenumber'],
            'technicaltask' => $request->technicaltask->getClientOriginalName(),
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        $price
            ->addMedia($request->technicaltask)
            ->preservingOriginal()
            ->toMediaCollection();

        $priceForm = new PriceForm($data, $filename);

        $managers = Manager::all();
        foreach($managers as $manager) {
            Mail::to($manager->email)->send($priceForm);
        }
        return new JsonResponse([
            'price' => $price,
        ]);
    }

    public function giveConsultation(GiveConsultationRequest $request) {
        $data = $request->validated();
        $consultation = Consultation::create([
            'name' => $data['name'],
            'phonenumber' => $data['phonenumber']
        ]);

        $managers = Manager::all();

        foreach($managers as $manager) {
            Mail::to($manager->email)->send(new ConsultationForm($request->all()));
        }

        return new JsonResponse([
            'consultation' => $consultation,
        ]);
    }

    public function getQuestion(GetQuestionRequest $request) {
        if (array_key_exists('phonenumber', $request->all())) {
            $data = $request->validated();

            $question = Question::create([
                'name' => $data['name'],
                'phonenumber' => $data['phonenumber'],
                'text' => $data['text']
            ]);
        } else if (array_key_exists('email', $request->all())) {
            $data = $request->validated();

            $question = Question::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'text' => $data['text']
            ]);
        }
        $managers = Manager::all();

        foreach($managers as $manager) {
            Mail::to($manager->email)->send(new QuestionForm($question));
        }

        return new JsonResponse([
            'question' => $question,
        ]);
    }

    public function getFeedback(GetFeedbackRequest $request) {
        $data = $request->validate([
            'authorname' => 'required|string',
            'text' => 'required|string'
        ]);
        $managers = Manager::all();

        $feedback = Feedback::create([
            'authorname' => $data['authorname'],
            'text' => $data['text']
        ]);

        foreach($managers as $manager) {
            Mail::to($manager->email)->send(new FeedbackForm($request->all()));
        }

        return new JsonResponse([
            'feedback' => $feedback,
        ]);
    }

    public function getSummary(GetSummaryRequest $request) {
        $filename = $request->file;
        if (!array_key_exists('id', $request->all())) {
            $data = $request->validated();

            $summary = Summary::create([
                'name' => $data['name'],
                'phonenumber' => $data['phonenumber'],
                'text' => $data['text'],
                'file' => $filename->getClientOriginalName(),
            ]);

                $summary
                    ->addMedia($request->file)
                    ->preservingOriginal()
                    ->toMediaCollection();
        } else {
            $data = $request->validated();

            $summary = Summary::create([
                'file' => $filename->getClientOriginalName(),
                'vacancy_id' => $data['id'],
            ]);

            $summary
            ->addMedia($request->file)
            ->preservingOriginal()
            ->toMediaCollection();

            $summary['vacancy_name'] = $summary->vacancy()->get();
        }
        $managers = Manager::all();

        $vacancyForm = new VacancyForm($summary, $filename);

        foreach($managers as $manager) {
            Mail::to($manager->email)->send($vacancyForm);
        }

        return new JsonResponse([
            'summary' => $summary,
        ]);
    }
}
