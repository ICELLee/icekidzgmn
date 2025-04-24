<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'images/temp.jpg',
                'title' => 'Unser Konzept',
                'description' => 'Entdecke die Vision und Philosophie hinter ICEKIDZ - mehr als nur ein Gaming-Netzwerk.',
                'link' => '#concept',
                'button' => 'Mehr erfahren'
            ]
        ];

        return view('pages.concept.index', [
            'slides' => $slides
        ]);
    }
}
