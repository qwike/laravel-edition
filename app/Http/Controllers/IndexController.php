<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Excursion;
use App\Models\House;
use App\Models\Project;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(protected EventRepository $eventRepository)
    {

    }

    public function index()
    {
        $excursions = Excursion::query()->limit(5)->get();
        $events = $this->eventRepository->getMainEvents();
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
