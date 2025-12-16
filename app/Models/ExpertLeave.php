<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpertLeave extends Model
{
    protected $fillable = [
        'expert_id',
        'leave_start',
        'leave_end',
        'reason',
    ];

    protected $casts = [
        'leave_start' => 'datetime',
        'leave_end' => 'datetime',
    ];

    public function expert(): BelongsTo
    {
        return $this->belongsTo(Expert::class);
    }
}
