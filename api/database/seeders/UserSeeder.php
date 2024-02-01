<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleSubservice;
use App\Models\ArticleTag;
use App\Models\Condition;
use App\Models\Consultation;
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

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = config('app.env') === 'local' ? 'password' : 'qwerty';

        User::create([
            'name' => 'Администратор',
            'email' => 'admin@vl.ru',
            'password' => Hash::make($password),
        ]);
    }
}
