<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(EventsService $eventsService): View
    {

        $eventsAll = $eventsService->getEvents(true);
        $eventsGrouped = $eventsService->getEvents(true, true);

        $eventCategories = $eventsService->getCategories();

        return view('dashboard', [
            'events' => $eventsAll,
            'eventsGrouped' => $eventsGrouped,
            'categories' => $eventCategories,
        ]);
    }
}
