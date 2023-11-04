<?php

namespace App\Http\Controllers;

use App\Services\TeamsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamsController extends Controller
{
    public function index(TeamsService $teamsService): View
    {
        $teamsService->store(['name' => 'ahoj']);
        return view('welcome', ['something' => 'Skauk']);
    }
}
