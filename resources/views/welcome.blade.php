<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FILTRO - Premium Coffee Experience</title>

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
        <div class="text-2xl font-bold tracking-tighter font-serif text-brand-primary">FILTRO</div>
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
                    <a href="{{ route('login') }}" class="text-sm font-semibold">Log in</a>
                    <a href="{{ route('register') }}"
                        class="btn-primary text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">Join Now</a>
                @endauth
            @endif
        </div>
    </nav>

    <section
        class="hero-gradient min-h-[80vh] flex flex-col lg:flex-row items-center justify-between px-8 lg:px-20 py-12">
        <div class="lg:w-1/2 space-y-6">
            <h1 class="text-5xl lg:text-7xl font-serif leading-tight">
                Would you like a Cup of <span class="text-brand-primary">Delicious Coffee?</span>
            </h1>
            <p class="text-lg text-brand-dark/80 max-w-md">
                Spend your quality time here with the best beans and professional baristas. Especially when it's
                raining.
            </p>
            <div class="pt-4">
                <a href="#"
                    class="btn-primary text-white px-10 py-4 rounded-full text-lg font-bold shadow-xl inline-block">
                    Book Now
                </a>
            </div>
        </div>

        <div class="lg:w-1/2 mt-12 lg:mt-0 relative">
            <div class="absolute -inset-4 bg-brand-beige/30 rounded-full blur-3xl"></div>
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=1000"
                alt="Coffee Cup"
                class="relative z-10 w-full max-w-md mx-auto rounded-full aspect-square object-cover border-[15px] border-white shadow-2xl">
        </div>
    </section>

    <section class="bg-white py-24 px-8 lg:px-20">
        <div class="text-center mb-16">
            <span class="text-brand-primary font-bold tracking-widest uppercase text-sm">Cafe Menu</span>
            <h2 class="text-4xl font-serif mt-2">Choose your favorite coffee</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="group cursor-pointer">
                <div class="overflow-hidden rounded-2xl mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1541167760496-162955ed8a9f?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Latte">
                </div>
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Cafe Americano</h3>
                    <span class="text-brand-primary font-bold">$4.50</span>
                </div>
                <div class="flex text-yellow-500 mt-1">★★★★★</div>
            </div>

            <div class="group cursor-pointer">
                <div class="overflow-hidden rounded-2xl mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1497933322477-911b33faeb03?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                        alt="Cappuccino">
                </div>
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Caramel Macchiato</h3>
                    <span class="text-brand-primary font-bold">$5.20</span>
                </div>
                <div class="flex text-yellow-500 mt-1">★★★★★</div>
            </div>

            <div class="group cursor-pointer">
                <div class="overflow-hidden rounded-2xl mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Espresso">
                </div>
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">Iced Hazelnut Latte</h3>
                    <span class="text-brand-primary font-bold">$4.80</span>
                </div>
                <div class="flex text-yellow-500 mt-1">★★★★★</div>
            </div>
        </div>
    </section>

    <footer class="bg-brand-dark text-brand-cream py-12 px-8 lg:px-20 border-t border-brand-beige/20">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-2xl font-serif font-bold text-brand-primary">FILTRO</div>
            <p class="text-sm opacity-60">&copy; 2024 Filtro Coffee Co. All rights reserved.</p>
            <div class="flex gap-6">
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">FB</div>
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">IG</div>
                <div class="w-8 h-8 rounded-full bg-brand-primary/20 flex items-center justify-center">TW</div>
            </div>
        </div>
    </footer>

</body>

</html>