<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Shirtly - Configuratore 3D' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <x-social-meta title="{{ $title ?? 'Shirtly - Configuratore 3D' }}"
        description="Scopri Shirtly il configuratore 3D intuitivo che rispetta la tua arte, elimina gli errori e ti fa risparmiare ore preziose."
        image="{{ asset('/sito/images/02.webp') }}" />

        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="536b42c6-7dd1-4eab-9a36-165727885078" data-blockingmode="auto" type="text/javascript"></script>

        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuZ3qUTBIYNRMaC8QDOS-AYD0InDfgpN4&callback=console.debug&libraries=maps,marker&v=beta">
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#fff9ea] text-gray-900 font-sans overflow-x-hidden">

    {{ $slot }}

</body>

</html>