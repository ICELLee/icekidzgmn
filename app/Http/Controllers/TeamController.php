<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'images/temp.jpg',
                'title' => 'Unser Team',
                'description' => 'Lerne das talentierte Team hinter ICEKIDZ kennen, das unsere Projekte zum Leben erweckt.',
                'link' => '#team',
                'button' => 'Team entdecken'
            ]
        ];

        $teamMembers = TeamMember::where('is_active', true)
            ->where('show_on_team', true)
            ->get()
            ->map(function ($member) {
                return [
                    'real_name'   => $member->full_name,
                    'ingame_name' => $member->ingame_name,
                    'role'        => $member->role_name,
                    'role_short'  => $member->role,
                    'role_color'  => $member->role_color ?? 'bg-gray-500 text-white',
                    'image'       => 'storage/' . $member->profile_image,
                    'social'      => [
                        'discord' => $member->discord_name,
                        'email'   => $member->private_email,
                    ]
                ];
            });


        return view('pages.team.index', [
            'slides' => $slides,
            'teamMembers' => $teamMembers,
        ]);
    }
}
