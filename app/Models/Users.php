<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Users extends Model
{
    use HasFactory;
    use LogsActivity;

    public $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'email',
                'password',
                'status',
            ]);
    }

    public static function getUserInfo($uid): object
    {
        return self::find($uid);
    }
}
