<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Excursion;
use App\Models\House;
use App\Models\Project;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $excursions = Excursion::query()->limit(5)->get();
        $events = Event::query()->orderBy('created_at', 'DESC')->limit(2)->get();
        $houses = House::query()->limit(3)->get();
        $projects = Project::query()->get();

        return view('index', [
            'excursions' => $excursions,
            'events' => $events,
            'houses' => $houses,
            'projects' => $projects,
        ]);
    }
}
