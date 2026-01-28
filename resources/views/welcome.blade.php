@extends('layouts.navbar')
@section('content')

    <!-- Mobile Menu -->
    <div class="mobile-menu md:hidden bg-brand-cream" id="mobileMenu">
        <div class="flex flex-col gap-4 p-6 text-center">
            <a href="#home" class="hover:text-brand-primary transition-colors duration-300 font-semibold">Home</a>
            <a href="#menu" class="hover:text-brand-primary transition-colors duration-300 font-semibold">Our Menu</a>
            <a href="#about" class="hover:text-brand-primary transition-colors duration-300 font-semibold">About Us</a>
            <a href="#contact" class="hover:text-brand-primary transition-colors duration-300 font-semibold">Contact</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-semibold hover:text-brand-primary transition-colors duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn-primary text-white px-8 py-3 rounded-full text-sm font-bold shadow-lg inline-block">
                        <span>Log in</span>
                    </a>
                @endauth
            @endif
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home"
        class="hero-gradient min-h-screen flex flex-col lg:flex-row items-center justify-between px-6 lg:px-20 py-12 lg:py-20 gap-12">
        <div class="lg:w-1/2 space-y-8 fade-in">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-serif leading-tight">
                Would you like a Cup of <span class="text-brand-primary">Delicious Coffee?</span>
            </h1>
            <p class="text-base md:text-lg text-brand-dark/80 max-w-md leading-relaxed">
                Spend your quality time here with the best beans and professional baristas. Especially when it's
                raining.
            </p>
            <div class="pt-4">
                <a href="#menu"
                    class="btn-primary text-white px-10 py-4 rounded-full text-lg font-bold shadow-xl inline-block">
                    <span>Explore Menu</span>
                </a>
            </div>
        </div>

        <div class="lg:w-1/2 mt-8 lg:mt-0 relative hero-image-container">
            <div class="hero-image-glow"></div>
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=1000"
                alt="Coffee Cup"
                class="hero-image w-full max-w-md mx-auto rounded-full aspect-square object-cover border-[15px] border-white">
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="bg-white py-20 lg:py-32 px-6 lg:px-20">
        <div class="text-center mb-16 fade-in">
            <span class="text-brand-primary font-bold tracking-widest uppercase text-sm">Cafe Menu</span>
            <h2 class="text-4xl lg:text-5xl font-serif mt-3">Choose your favorite coffee</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Menu Item 1 -->
            <div class="menu-card group cursor-pointer fade-in">
                <div class="menu-card-image aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1541167760496-162955ed8a9f?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                        alt="Cafe Americano">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-bold">Cafe Americano</h3>
                        <span class="text-brand-primary font-bold text-lg">$4.50</span>
                    </div>
                    <div class="flex text-yellow-500 text-sm">★★★★★</div>
                </div>
            </div>

            <!-- Menu Item 2 -->
            <div class="menu-card group cursor-pointer fade-in">
                <div class="menu-card-image aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1497933322477-911b33faeb03?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                        alt="Caramel Macchiato">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-bold">Caramel Macchiato</h3>
                        <span class="text-brand-primary font-bold text-lg">$5.20</span>
                    </div>
                    <div class="flex text-yellow-500 text-sm">★★★★★</div>
                </div>
            </div>

            <!-- Menu Item 3 -->
            <div class="menu-card group cursor-pointer fade-in">
                <div class="menu-card-image aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&q=80&w=600"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                        alt="Iced Hazelnut Latte">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-bold">Iced Hazelnut Latte</h3>
                        <span class="text-brand-primary font-bold text-lg">$4.80</span>
                    </div>
                    <div class="flex text-yellow-500 text-sm">★★★★★</div>
                </div>
            </div>
        </div>
    </section>

 
    <!-- About Section -->
    <section id="about">
        <div class="about-header">
            <div class="about-header-content">
                <h1>ABOUT US</h1>
            </div>
        </div>

        <div class="about-description">
            <h1 class="fade-in">Sekilas BorosKopi</h1>
            <p class="fade-in">Kedai kopi yang berdiri sejak awal di pelataran Masjid Ar Rahman CitraLand Cibubur, telah
                berkembang menjadi brand kopi yang konsisten dalam menyajikan kualitas tertinggi dalam menikmati kopi.
                Dengan pengalaman bertahun-tahun dan beberapa cabang di lokasi strategis seperti WoodLand Park &
                Culinery dan Dapur Akang Metland Transyogi, BorosKopi siap menjadi partner Anda dalam menyajikan kopi
                yang lezat dan berkualitas.</p>

            <p class="fade-in">BorosKopi adalah Kedai Kopi Modern yang menyajikan berbagai pilihan kopi speciality,
                minuman non kopi, serta pastry. Kami menggunakan biji kopi pilihan dari petani lokal Indonesia yang di
                proses secara profesional, di seduh oleh Barista berpengalaman.</p>

            <h1 class="fade-in">VISI & MISI</h1>

            <h4 class="fade-in">VISI</h4>
            <p class="fade-in">Menjadi pilihan utama coffee shop lokal yang mengedepankan kualitas kenyamanan, cita
                rasa, dan berkelanjutan.</p>

            <h4 class="fade-in">MISI</h4>
            <p class="fade-in">Menyediakan kopi yang berkualitas tinggi dengan pelayanan terbaik, serta membangun
                suasana yang nyaman untuk bersosialisasi, bekerja dan bersantai, juga mendukung petani kopi lokal dan
                praktik bisnis ramah lingkungan.</p>

            <h1 class="fade-in">LOGO</h1>
            <img src="{{ asset('storage/images/logo.png') }}" alt="Logo BorosKopi" class="fade-in">
        </div>
    </section>

    
 @endsection
