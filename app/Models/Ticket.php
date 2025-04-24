<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number', 'name', 'email', 'contact_type',
        'message', 'priority', 'status', 'response',
        'responded_by', 'responded_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_number = 'IKT-' . strtoupper(uniqid());
        });
    }

    public function responder()
    {
        return $this->belongsTo(TeamMember::class, 'responded_by');
    }
}
