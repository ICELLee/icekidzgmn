@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    @include('sections.home.about')

    @include('sections.home.stats')

    @include('sections.home.team', ['teamMembers' => $teamMembers])

    @include('shared.contact-form')
@endsection
