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
            <img src="{{ asset('storage/images/owner1.jpeg') }}" alt="Coffee Cup"
                class="hero-image w-full max-w-md mx-auto rounded-full aspect-square object-cover border-[15px] border-white">
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="bg-brand-cream py-20 lg:py-32 px-6 lg:px-20 overflow-hidden">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 fade-in">
            <div>
                <span class="text-brand-primary font-black tracking-[0.3em] uppercase text-xs">Cafe Menu</span>
                <h2 class="text-4xl lg:text-5xl font-serif mt-3 text-brand-dark">Choose your <br><span class="italic text-brand-primary">favorite coffee</span></h2>
            </div>

            <div class="hidden md:flex items-center gap-3 text-brand-dark/40 text-sm font-bold">
                <span>Geser untuk lihat lainnya</span>
                <div class="flex gap-2">
                    <div class="w-8 h-1 bg-brand-primary rounded-full"></div>
                    <div class="w-4 h-1 bg-brand-beige rounded-full"></div>
                </div>
            </div>
        </div>

        <div class="flex overflow-x-auto gap-8 pb-10 custom-scrollbar snap-x snap-mandatory">
            @foreach ($products as $p)
            <div class="min-w-[280px] md:min-w-[320px] lg:min-w-[380px] snap-start group cursor-pointer fade-in">
                <div class="relative overflow-hidden rounded-[2.5rem] aspect-[4/5] border border-brand-beige shadow-sm bg-white">
                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->product_name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-all duration-700">
                </div>

                <div class="mt-6 px-2">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-black text-brand-dark tracking-tight">{{ $p->product_name }}</h3>
                            <p class="text-xs text-brand-dark/50 font-bold uppercase tracking-widest mt-1">{{ $p->category->category_name }} SERIS</p>
                        </div>
                        <div class="text-right">
                            <span class="text-brand-primary font-black text-xl tracking-tighter">
                                <span class="text-xs mr-0.5">Rp</span>{{ number_format($p->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-12">
            <a href="{{ route('order.add') }}"
            class="inline-flex items-center gap-4 bg-brand-dark hover:bg-brand-primary text-brand-cream px-10 py-5 rounded-2xl font-bold transition-all duration-500 shadow-xl hover:shadow-brand-primary/20 group">
                <span class="italic font-serif text-lg">Pesan Sekarang</span>
                <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
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

        <div class="isolate bg-[#FAF7F0] px-6 py-24 sm:py-32 lg:px-8">
            <div aria-hidden="true"
                class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                    class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-gradient-to-tr from-[#D8D2C2] to-[#B17457] opacity-40 sm:left-[calc(50%-40rem)] sm:w-288.75">
                </div>
            </div>
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-4xl lg:text-5xl font-serif mt-3 tracking-tight text-balance text-[#4A4947] sm:text-5xl">
                    Contact Us</h2>
                <p class="mt-2 text-lg/8 text-[#4A4947]/70"> Hubungi kami untuk informasi lebih lanjut.
                </p>
            </div>
            <form action="https://api.web3forms.com/submit" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                <input type="hidden" name="access_key" value="99c45d23-f116-4687-8ea6-ae389ce3dc26">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-1">
                    <div>
                        <label for="first-name" class="block text-sm/6 font-semibold text-[#4A4947]">Full Name</label>
                        <div class="mt-2.5">
                            <input id="first-name" type="text" name="first-name" autocomplete="given-name"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-[#4A4947] outline-1 -outline-offset-1 outline-[#D8D2C2] placeholder:text-[#4A4947]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#B17457]"
                                required>
                        </div>
                        <div class="sm:col-span-2">

                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm/6 font-semibold text-[#4A4947]">Email</label>
                            <div class="mt-2.5">
                                <input id="email" type="email" name="email" autocomplete="email"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-[#4A4947] outline-1 -outline-offset-1 outline-[#D8D2C2] placeholder:text-[#4A4947]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#B17457]"
                                    required>
                            </div>
                        </div>
                        <div class="sm:col-span-2">

                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm/6 font-semibold text-[#4A4947]">Message</label>
                        <div class="mt-2.5">
                            <textarea id="message" name="message" rows="4"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-[#4A4947] outline-1 -outline-offset-1 outline-[#D8D2C2] placeholder:text-[#4A4947]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#B17457]"
                                required></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="block w-full rounded-md bg-[#B17457] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-[#4A4947] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#B17457]">Let's
                        talk</button>
                </div>
            </form>
        </div>

    </section>

@endsection
