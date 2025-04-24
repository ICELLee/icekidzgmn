<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerStatusController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'images/temp.jpg',
                'title' => 'Server Status',
                'description' => 'Aktuelle Übersicht über alle unsere Server und Dienste - immer auf dem neuesten Stand.',
                'link' => '#server-status',
                'button' => 'Status prüfen'
            ]
        ];

        $servers = \App\Models\Server::all(); // wichtig: kein $servers = [...]


        return view('pages.serverstatus.index', [
            'slides' => $slides,
            'servers' => $servers
        ]);
    }
}
