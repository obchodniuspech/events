<?php

namespace App\Services;

use App\Models\Teams;

final class TeamsService {

    public function store(array $userData): Teams
    {
        return Teams::create($userData);
    }
    
}
