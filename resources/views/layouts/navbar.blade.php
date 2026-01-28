<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BorosKopi - A Modern Coffee Experience</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FAF7F0;
            color: #4A4947;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navigation */
        nav {
            backdrop-filter: blur(10px);
            background-color: rgba(250, 247, 240, 0.95);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Mobile Menu */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .mobile-menu.active {
            max-height: 400px;
        }

        .hamburger {
            cursor: pointer;
            width: 24px;
            height: 20px;
            position: relative;
            display: none;
        }

        .hamburger span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            background: #B17457;
            border-radius: 3px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: 0.25s ease-in-out;
        }

        .hamburger span:nth-child(1) {
            top: 0px;
        }

        .hamburger span:nth-child(2) {
            top: 8px;
        }

        .hamburger span:nth-child(3) {
            top: 16px;
        }

        .hamburger.active span:nth-child(1) {
            top: 8px;
            transform: rotate(135deg);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
            left: -60px;
        }

        .hamburger.active span:nth-child(3) {
            top: 8px;
            transform: rotate(-135deg);
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }
        }

        /* Hero Section */
        .hero-gradient {
            background: linear-gradient(135deg, #FAF7F0 0%, #D8D2C2 50%, #FAF7F0 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(177, 116, 87, 0.1) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px);
            }

            50% {
                transform: translateY(-20px) translateX(20px);
            }
        }

        .hero-image-container {
            position: relative;
            animation: fadeInRight 1s ease-out;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-image-glow {
            position: absolute;
            inset: -20px;
            background: radial-gradient(circle at center, rgba(177, 116, 87, 0.2), transparent 70%);
            filter: blur(40px);
            z-index: 0;
        }

        .hero-image {
            position: relative;
            z-index: 1;
            box-shadow: 0 20px 60px rgba(177, 116, 87, 0.3);
            transition: transform 0.3s ease;
        }

        .hero-image:hover {
            transform: scale(1.02);
        }

        /* Buttons */
        .btn-primary {
            background-color: #B17457;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: #4A4947;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(177, 116, 87, 0.4);
        }

        .btn-primary span {
            position: relative;
            z-index: 1;
        }

        /* Menu Section */
        .menu-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .menu-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(177, 116, 87, 0.15);
        }

        .menu-card-image {
            position: relative;
            overflow: hidden;
        }

        .menu-card-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(74, 73, 71, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .menu-card:hover .menu-card-image::after {
            opacity: 1;
        }

        /* About Section */
        .about-header {
            height: 70vh;
            min-height: 400px;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('storage/images/background.jpeg') }});
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .about-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .about-header-content {
            text-align: center;
            z-index: 1;
            padding: 40px 20px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .about-header-content h1 {
            font-size: 4rem;
            color: #FAF7F0;
            font-weight: 900;
            letter-spacing: 6px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            font-family: 'Playfair Display', serif;
        }

        /* About Description */
        .about-description {
            max-width: 1000px;
            margin: 0 auto;
            padding: 80px 30px;
        }

        .about-description h1 {
            color: #B17457;
            font-size: 2.8rem;
            margin-bottom: 30px;
            margin-top: 50px;
            border-bottom: 4px solid #D8D2C2;
            padding-bottom: 20px;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .about-description h1:first-child {
            margin-top: 0;
        }

        .about-description h4 {
            color: #B17457;
            font-size: 1.6rem;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .about-description p {
            color: #4A4947;
            font-size: 1.1rem;
            margin-bottom: 25px;
            text-align: justify;
            background-color: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #B17457;
            line-height: 1.8;
            transition: all 0.3s ease;
        }

        .about-description p:hover {
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .about-description img {
            display: block;
            margin: 40px auto;
            max-width: 350px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(177, 116, 87, 0.3);
            background-color: white;
            padding: 25px;
            transition: transform 0.3s ease;
        }

        .about-description img:hover {
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background: linear-gradient(to bottom, #FAF7F0, #D8D2C2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .about-header-content h1 {
                font-size: 3rem;
                letter-spacing: 4px;
            }
        }

        @media (max-width: 768px) {
            .about-header {
                height: 50vh;
                background-attachment: scroll;
            }

            .about-header-content h1 {
                font-size: 2.5rem;
                letter-spacing: 3px;
            }

            .about-description {
                padding: 50px 20px;
            }

            .about-description h1 {
                font-size: 2rem;
            }

            .about-description h4 {
                font-size: 1.3rem;
            }

            .about-description p {
                font-size: 1rem;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .about-header-content h1 {
                font-size: 2rem;
                letter-spacing: 2px;
            }

            .about-description h1 {
                font-size: 1.7rem;
            }

            .about-description img {
                max-width: 250px;
                padding: 15px;
            }
        }

        /* Scroll Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="antialiased">

    <!-- Navigation -->
    <nav id="navbar" class="flex items-center justify-between px-6 py-5 lg:px-20 shadow-sm sticky top-0 z-50">
        <a href="/" class="flex items-center">
            <img src="{{ asset('storage/images/logo.png') }}" alt="BorosKopi Logo" class="h-12 w-auto">
        </a>

        <div class="hidden md:flex gap-8 text-sm font-semibold">
            <a href="#home" class="hover:text-brand-primary transition-colors duration-300">Home</a>
            <a href="#menu" class="hover:text-brand-primary transition-colors duration-300">Our Menu</a>
            <a href="#about" class="hover:text-brand-primary transition-colors duration-300">About Us</a>
            <a href="#contact" class="hover:text-brand-primary transition-colors duration-300">Contact</a>
        </div>

        <div class="hidden md:flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-semibold hover:text-brand-primary transition-colors duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn-primary text-white px-8 py-3 rounded-full text-sm font-bold shadow-lg">
                        <span>Log in</span>
                    </a>
                @endauth
            @endif
        </div>

        <!-- Mobile Hamburger -->
        <div class="md:hidden hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
        <main class="">
        @yield('content')
    </main>
     <!-- Footer -->
    <footer id="contact" class="text-brand-dark py-16 px-6 lg:px-20 border-t-2 border-brand-beige">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
            <a href="/" class="flex items-center">
                <img src="{{ asset('storage/images/logo.png') }}" alt="BorosKopi Logo" class="h-12 w-auto">
            </a>

            <p class="text-sm opacity-70">&copy; 2026 BorosKopi. All rights reserved.</p>

            <div class="flex gap-4">
                <a href="#"
                    class="w-12 h-12 rounded-full bg-brand-primary/20 flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                    <span class="text-sm font-bold">FB</span>
                </a>
                <a href="#"
                    class="w-12 h-12 rounded-full bg-brand-primary/20 flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                    <span class="text-sm font-bold">IG</span>
                </a>
                <a href="#"
                    class="w-12 h-12 rounded-full bg-brand-primary/20 flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                    <span class="text-sm font-bold">TW</span>
                </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // Mobile Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        if (hamburger && mobileMenu) {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });

            // Close mobile menu when clicking a link
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    hamburger.classList.remove('active');
                    mobileMenu.classList.remove('active');
                });
            });
        }

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    </script>

</body>

</html>