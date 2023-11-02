<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(protected EventRepository $eventRepository)
    {
    }
    public function events()
    {
        $events = $this->eventRepository->getEvents();

        return view('events', [
            'events' => $events,
        ]);
    }
}
