<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimelineEvent;

class TimelineController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'images/temp.jpg',
                'title' => 'Unsere Geschichte',
                'description' => 'Entdecke unsere Reise von den Anfängen bis heute - eine Timeline unserer Erfolge und Meilensteine.',
                'link' => '#timeline',
                'button' => 'Zeitreise starten'
            ]
        ];

        $timelineEvents = \App\Models\TimelineEvent::orderBy('date', 'asc')->get();


        return view('pages.timeline.index', [
            'slides' => $slides,
            'timelineEvents' => $timelineEvents
        ]);
    }
}
