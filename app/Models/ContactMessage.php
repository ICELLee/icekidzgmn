<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'contact_type',
        'priority',
        'message',
        'reply',
        'attachment',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($message) {
            do {
                $ticket = 'IKC' . str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
            } while (self::where('ticket_number', $ticket)->exists());

            $message->ticket_number = $ticket;
        });
    }

    protected $casts = [
        'attachment' => 'string',
    ];
}
