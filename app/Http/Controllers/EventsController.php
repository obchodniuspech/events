<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(EventsService $eventsService): View
    {

        $eventCategories = $eventsService->getCategories();

        return view('dashboard', [
           'categories' => $eventCategories,
        ]);
    }
}
