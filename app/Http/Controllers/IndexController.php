<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\EntertainmentRepository;
use App\Repositories\ExcursionRepository;
use App\Repositories\HouseRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected EntertainmentRepository $entertainmentRepository,
        protected HouseRepository $houseRepository,
        protected ProjectRepository $projectRepository,
        protected ExcursionRepository $excursionRepository)
    {
    }

    public function index()
    {
        $excursions = $this->excursionRepository->getMainExcursions();
        $entertainments = $this->entertainmentRepository->getMainEntertainments();
        $events = $this->eventRepository->getMainEvents();
        $houses = $this->houseRepository->getMainHouses();
        $projects = $this->projectRepository->getMainProjects();

        return view('index', [
            'excursions' => $excursions,
            'entertainments' => $entertainments,
            'events' => $events,
            'houses' => $houses,
            'projects' => $projects,
        ]);
    }
}
