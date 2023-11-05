<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Events extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'description_short',
        'category',
        'image',
        'files',
        'link_facebook',
        'link_website',
        'link_other',
        'link_tickets',
        'price',
        'share_enable',
        'comments_enable',
        'rvsp_needed',
        'tickets_needed',
        'date',
        'priority',
        'status',
        'type',
        'where',
        'starts',
        'ends',
        'google_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'description',
                'description_short',
                'category',
                'image',
                'files',
                'link_facebook',
                'link_website',
                'link_other',
                'link_tickets',
                'price',
                'share_enable',
                'comments_enable',
                'rvsp_needed',
                'tickets_needed',
                'date',
                'priority',
                'status',
                'type',
                'where',
                'starts',
                'ends',
                'google_id',
            ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoryInfo(): BelongsTo
    {
        return $this->belongsTo(EventsCategories::class, 'id');
    }

}
