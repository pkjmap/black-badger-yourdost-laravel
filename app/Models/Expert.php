<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expert extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'role',
        'rating',
        'total_conversations',
        'profile_image',
        'is_online',
        'next_available_date',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'rating' => 'float',
        'total_conversations' => 'integer',
        'is_online' => 'boolean',
        'next_available_date' => 'datetime',
        'chat_schedule' => 'datetime'
    ];

    /* ==============================
     | Relationships
     ============================== */

    public function schedules(): HasMany
    {
        return $this->hasMany(ExpertSchedule::class);
    }

    public function leaves(): HasMany
    {
        return $this->hasMany(ExpertLeave::class);
    }

    /* ==============================
     | Accessors (UI helpers)
     ============================== */

    /**
     * Get formatted rating for UI
     */
    public function getFormattedRatingAttribute(): string
    {
        return number_format($this->rating, 1);
    }

    /**
     * Online status dot color
     */
    public function getStatusColorAttribute(): string
    {
        return $this->is_online ? 'green' : 'gray';
    }

    /* ==============================
     | Query Scopes
     ============================== */

    /**
     * Only online experts
     */
    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    /**
     * Order by rating
     */
    public function scopeTopRated($query)
    {
        return $query->orderByDesc('rating');
    }
}
