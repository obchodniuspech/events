<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsCategoriesRequest;
use App\Http\Requests\UpdateEventsCategoriesRequest;
use App\Models\EventsCategories;
use App\Services\EventsService;
use Illuminate\View\View;

class EventsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventsService $eventsService): View
    {
        $categories = $eventsService->getCategories();
        return view('events.index-categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsCategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsCategories $eventsCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventsCategories $eventsCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsCategoriesRequest $request, EventsCategories $eventsCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsCategories $eventsCategories)
    {
        //
    }
}
