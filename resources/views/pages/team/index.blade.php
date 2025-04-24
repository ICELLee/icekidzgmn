@extends('layouts.app')

@section('title', 'Team')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    @include('sections.team.teamgrid', ['teamMembers' => $teamMembers])

    @include('shared.contact-form')
@endsection
