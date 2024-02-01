<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleSubservice;
use App\Models\ArticleTag;
use App\Models\Condition;
use App\Models\Consultation;
use App\Models\Customer;
use App\Models\Example;
use App\Models\FAQ;
use App\Models\Feedback;
use App\Models\Manager;
use App\Models\Partner;
use App\Models\PhotoArticle;
use App\Models\PhotoProject;
use App\Models\Position;
use App\Models\Price;
use App\Models\Project;
use App\Models\Question;
use App\Models\Staff;
use App\Models\Service;
use App\Models\ServiceExample;
use App\Models\ServiceProject;
use App\Models\ServiceVideo;
use App\Models\Subservice;
use App\Models\Summary;
use App\Models\Tag;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\VacancyCondition;
use App\Models\Video;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exact;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(1)->create();
        Service::factory(10)->create();
        Subservice::factory(10)->create();
        Tag::factory(10)->create();
        Condition::factory(10)->create();
        Manager::factory(10)->create();
        Vacancy::factory(10)->create();
        Article::factory(10)->create();
        PhotoArticle::factory(10)->create();
        Consultation::factory(10)->create();
        Example::factory(10)->create();
        FAQ::factory(10)->create();
        Feedback::factory(10)->create();
        Partner::factory(10)->create();
        Project::factory(10)->create();
        PhotoProject::factory(10)->create();
        Position::factory(10)->create();
        Price::factory(10)->create();
        Question::factory(10)->create();
        Staff::factory(10)->create();
        Video::factory(10)->create();
        Summary::factory(10)->create();
    }
}
