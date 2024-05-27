{{-- ! url of favicon: public/favicon.png --}}
{{-- public/css/footer-style --}}
{{-- <link rel="stylesheet" href="{{ asset('css/scroll-bar-style.css') }}"> --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $slot }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/scroll-bar-style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @vite('resources/css/app.css')
</head>