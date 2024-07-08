<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Chronological order.info') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            @foreach($stories as $story)
                <div class="card">
                    <div class="card-header">
                        {{ $story->orderNum }}. story (
                        @if ($story->episode_id) EPISODE @else MOVIE @endif )
                        <h2>@if ($story->episode_id) {{ $story->episode->name }} ( {{ $story->episode->season->tv->acronym }}  {{ $story->episode->season->name }} Episode {{ $story->episode->number }} )
                        @else ($story->movie->name) @endif</h2>
                    </div>
                    <div class="card-body">
                        {{ $story->description }}
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
