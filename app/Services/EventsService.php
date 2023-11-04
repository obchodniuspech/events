<?php

namespace App\Services;

use App\Models\Events;
use App\Models\EventsCategories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

    public function saveFromIftttWebook(array $data) {

        $webhookData = [
            'name' => $data['title'],
            'type' => 'google_import',
            'google_id' => Str::replace('https://www.google.com/calendar/event?eid=', '', $data['url']),
            'description' => $data['description'],
            'where' => $data['where'],
            'starts' => Carbon::parse($data['starts'])->format("Y-m-d H:i:s"),
            'ends' => Carbon::parse($data['ends'])->format("Y-m-d H:i:s"),
            'link_other' => $data['url'],
            'created_at' => $data['created_at'],
        ];

        Events::create($webhookData);
    }

    public function getCategories(): Collection
    {
        return EventsCategories::all();
    }

}
