<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml+png+jpg" href="/images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/1359e2cfd9.js" crossorigin="anonymous"></script>
    @livewireStyles
    <title>@yield('title','Ecommerce')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950">
    <div class="w-full">

        <!-- Top announcement text -->
        <x-home.announcement-bar />
        <!-- Header -->
        <x-header />
        <main>
            <x-action-message />
            @yield('content')
            {{ $slot ?? '' }}
        </main>
        <!-- footer -->
        <x-footer />

    </div>
    </div>
    @livewireScripts

</body>

</html>