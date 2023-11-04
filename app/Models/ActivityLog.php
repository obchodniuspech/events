<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    public $table = 'activity_log';

    public static function getLog(): mixed
    {
        return self::where('log_name', 'default')
            ->join('users', 'activity_log.causer_id', '=', 'users.id')
            ->select('activity_log.*', 'users.email as user_email', 'users.name as user_name')
            ->orderBy('activity_log.id', 'desc')
            ->paginate(100);
    }
}
