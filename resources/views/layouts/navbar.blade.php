<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital-Life-by-BorosKopi-A-Modern-Coffee-Interaction</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-cream': '#FAF7F0',
                        'brand-beige': '#D8D2C2',
                        'brand-primary': '#B17457',
                        'brand-dark': '#4A4947',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #FAF7F0;
            color: #4A4947;
        }

        .hero-gradient {
            background: radial-gradient(circle at 80% 50%, #D8D2C2 0%, #FAF7F0 70%);
        }

        .btn-primary {
            background-color: #B17457;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4A4947;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="antialiased font-sans">

    <nav class="flex items-center justify-between px-8 py-6 lg:px-20">
        <a href="/" class="flex items-center">
            <img src="{{ asset('storage/images/boroskopi.png') }}" alt="Boros Kopi Logo" class="h-10 w-auto">
        </a>

        <div class="hidden md:flex gap-8 text-sm font-medium">
            <a href="#" class="hover:text-brand-primary transition">Home</a>
            <a href="#" class="hover:text-brand-primary transition">Our Menu</a>
            <a href="#" class="hover:text-brand-primary transition">About Us</a>
            <a href="#" class="hover:text-brand-primary transition">Contact</a>
        </div>
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn-primary text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">Log in</a>
                @endauth
            @endif
        </div>
    </nav>
        <main class="">
        @yield('content')
    </main>
     <footer class="bg-[#FAF7F0] text-[#4A4947] py-12 px-8 lg:px-20 border-t border-[#D8D2C2]">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <a href="/" class="flex items-center">
                <img src="{{ asset('storage/images/boroskopi.png    ') }}" alt="FILTRO Logo" class="h-10 w-auto">
            </a>

            <p class="text-sm opacity-60">&copy; 2026 Boros Kopi. All rights reserved.</p>
            <div class="flex gap-6">
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">FB</div>
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">IG</div>
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">TW</div>
            </div>
        </div>
    </footer>

</body>

</html>