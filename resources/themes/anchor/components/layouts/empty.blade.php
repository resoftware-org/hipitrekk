<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('theme::partials.head', ['seo' => $seo ?? null])
    <!-- Used to add dark mode right away, adding here prevents any flicker -->
    <script>
        if (typeof(Storage) !== "undefined") {
            if (localStorage.getItem('theme') && localStorage.getItem('theme') == 'dark') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        .jakarta {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .poppins-medium {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .poppins-bold {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</head>

<body class="flex min-h-screen flex-col bg-white px-10 dark:bg-zinc-950 lg:px-0">
    {{ $slot }}
</body>

</html>
