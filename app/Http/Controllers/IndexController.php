<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\ExcursionRepository;
use App\Repositories\HouseRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected HouseRepository $houseRepository,
        protected ProjectRepository $projectRepository,
        protected ExcursionRepository $excursionRepository)
    {
    }

    public function index()
    {
        $excursions = $this->excursionRepository->getMainExcursions();
        $events = $this->eventRepository->getMainEvents();
        $houses = $this->houseRepository->getMainHouses();
        $projects = $this->projectRepository->getMainProjects();

        return view('index', [
            'excursions' => $excursions,
            'events' => $events,
            'houses' => $houses,
            'projects' => $projects,
        ]);
    }
}
