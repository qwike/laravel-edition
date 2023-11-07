<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;

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
