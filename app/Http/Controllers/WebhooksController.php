<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebhooksController extends Controller
{
    public function saveToFile(Request $request): void
    {
        Storage::disk('local')->put('example.txt', json_encode($request->all()));
    }

    public function save(Request $request, EventsService $eventsService): void
    {
        $eventsService->saveFromIftttWebook($request->all());
    }
}
