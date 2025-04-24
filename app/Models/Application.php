<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_number', 'first_name', 'last_name', 'email',
        'contact_methods', 'message', 'availability',
        'references', 'status', 'notes', 'position_id'
    ];

    protected $casts = [
        'contact_methods' => 'array',
        'availability' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($application) {
            $application->application_number = 'IKBW-' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        });
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
