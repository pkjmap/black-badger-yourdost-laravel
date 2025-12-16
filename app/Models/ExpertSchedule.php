<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpertSchedule extends Model
{
    protected $fillable = [
        'expert_id',
        'day',
        'start_time',
        'end_time',
    ];

    public function expert(): BelongsTo
    {
        return $this->belongsTo(Expert::class);
    }
}
