<?php

namespace App\Services;

use App\Models\Events;
use App\Models\EventsCategories;
use Illuminate\Support\Collection;

final class EventsService {

    public function store(array $userData): Events
    {
        return Events::create($userData);
    }

    public function getEvents($onlyActive = true, $grouped = false): Collection
    {
        $events = Events::get()
            ->when($onlyActive, function ($q) {
                return $q->where('status', 1);
            })
            ->when($grouped, function ($q) {
                return $q->groupBy('category');
            });

        return $events;
    }

    public function getCategories(): Collection
    {
        return EventsCategories::all();
    }

}
