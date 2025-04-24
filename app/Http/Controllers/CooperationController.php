<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CooperationConfirmation;
use App\Models\CooperationRequest;

class CooperationController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'images/temp.jpg',
                'title' => 'Kooperationen',
                'description' => 'Gemeinsam mehr erreichen – Werde Teil unseres Netzwerks und profitiere von unserer Community.',
                'link' => '#cooperation',
                'button' => 'Jetzt kooperieren'
            ]
        ];

        $countries = [
            'DE' => 'Deutschland',
            'AT' => 'Österreich',
            'CH' => 'Schweiz',
            'US' => 'USA',
            'UK' => 'Großbritannien',
            'FR' => 'Frankreich',
            'ES' => 'Spanien',
            'IT' => 'Italien',
            'PL' => 'Polen',
            'NL' => 'Niederlande',
            'BE' => 'Belgien',
            'SE' => 'Schweden',
            'OTHER' => 'Andere'
        ];

        return view('pages.cooperation.index', [
            'slides' => $slides,
            'countries' => $countries
        ]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'project_type' => 'required',
            'why_fit' => 'required',
            'expectations' => 'required',
            'main_country' => 'required',
            'contact_methods' => 'required|array|min:1',
        ]);

        $ticket = 'IKB' . strtoupper(Str::random(10));

        CooperationRequest::create([
            ...$validated,
            'ticket' => $ticket,
            'project_name' => $request->project_name,
            'social_media' => $request->social_media,
            'coop_suggestion' => $request->coop_suggestion,
            'team_members' => $request->team_members,
            'user_numbers' => $request->user_numbers,
            'discord_username' => $request->discord_username,
            'whatsapp_number' => $request->whatsapp_number,
            'instagram_username' => $request->instagram_username,
        ]);
        // Bestätigungsmail senden
        Mail::to($request->email)->send(new CooperationConfirmation(
            $request->first_name,
            $ticket
        ));

        return redirect()->back()->with('success', 'Vielen Dank für deine Kooperationsanfrage! Wir werden uns bald bei dir melden.');
    }
}
