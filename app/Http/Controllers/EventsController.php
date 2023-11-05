<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
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

    public function edit(EventsService $eventsService, int $id = null): View
    {
        $eventCategories = $eventsService->getCategories();
        $event = $eventsService->getEvent($id);

        return view('events.edit', [
            'datetimeFrom' => $event->starts ?? Carbon::now()->format('Y-m-d\TH:i:00'),
            'datetimeTo' => $event->ends ?? Carbon::now()->addHour(3)->format('Y-m-d\TH:i:00'),
            'categories' => $eventCategories,
        ]);
    }

    public function detail(int $id, EventsService $eventsService): View
    {
        $event = $eventsService->getEvent($id);

        return view('events.detail', [
            'event' => $event,
        ]);
    }

    public function save(Request $request, EventsService $eventsService): RedirectResponse
    {
        $eventsService->save($request->all());

        return redirect(route('dashboard'));
    }

}
