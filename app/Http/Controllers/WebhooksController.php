<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebhooksController extends Controller
{
    public function saveToFile(Request $request): void
    {
        Storage::disk('local')->put('example.txt', json_encode($request->all()));
    }
}
