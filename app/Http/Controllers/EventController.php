<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events()
    {
        $events = Event::query()->get();

        return view('events', [
            'events' => $events,
        ]);
    }
}
