<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'contact_requests';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'inquiry_type',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'organization',
        'role',
        'help_message',
        'heard_from',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'heard_from' => 'array',
    ];
}
