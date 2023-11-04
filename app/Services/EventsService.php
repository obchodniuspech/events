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

    public function getCategories(): Collection
    {
        return EventsCategories::all();
    }

}
