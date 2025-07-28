<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHRONEX - Smart Appointment Booking</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/welcome.css'])
      @vite('resources/css/app.css')

</head>
<body class="overflow-x-hidden font-sans">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 z-50 w-full py-5 transition-all duration-300 nav-glass">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <a href="#" class="text-2xl font-bold gradient-text">CHRONEX</a>
            
            <!-- Desktop Menu -->
            <ul class="items-center hidden space-x-8 lg:flex">
                <li><a href="#" class="flex items-center gap-2 text-white transition-colors duration-300 hover:text-accent active"><i class="bi bi-house"></i> Home</a></li>
                <li><a href="#services" class="flex items-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-info-circle"></i> Services</a></li>
                <li><a href="#booking" class="flex items-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-gear"></i> Booking</a></li>
                <li><a href="#about" class="flex items-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-person"></i> About</a></li>
                <li><a href="#contact" class="flex items-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-envelope"></i> Contact</a></li>
                <li><a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-2 text-white transition-all duration-300 rounded-lg bg-accent hover:bg-primary hover:-translate-y-1"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                <li><a href="{{ route('register') }}" class="flex items-center gap-2 px-4 py-2 transition-all duration-300 bg-transparent border rounded-lg border-accent text-accent hover:bg-accent hover:text-white hover:-translate-y-1"><i class="bi bi-person-plus"></i> Register</a></li>
            </ul>
            
            <!-- Mobile Menu Button -->
            <button class="text-2xl text-white lg:hidden" onclick="toggleMenu()">
                <i class="bi bi-list"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <ul id="navLinks" class="fixed left-0 flex-col w-full py-6 space-y-4 text-center mobile-menu lg:hidden top-20 nav-glass">
            <li><a href="#" class="flex items-center justify-center gap-2 text-white transition-colors duration-300 hover:text-accent active"><i class="bi bi-house"></i> Home</a></li>
            <li><a href="#services" class="flex items-center justify-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-info-circle"></i> Services</a></li>
            <li><a href="#booking" class="flex items-center justify-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-gear"></i> Booking</a></li>
            <li><a href="#about" class="flex items-center justify-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-person"></i> About</a></li>
            <li><a href="#contact" class="flex items-center justify-center gap-2 text-white transition-colors duration-300 hover:text-accent"><i class="bi bi-envelope"></i> Contact</a></li>
            <li><a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 text-white transition-all duration-300 rounded-lg bg-accent hover:bg-primary"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
            <li><a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2 transition-all duration-300 bg-transparent border rounded-lg border-accent text-accent hover:bg-accent hover:text-white"><i class="bi bi-person-plus"></i> Register</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="flex items-center min-h-screen py-32 text-white hero-bg">
        <div class="container max-w-4xl px-4 mx-auto text-center">
            <h1 class="mb-6 text-5xl font-bold leading-tight lg:text-6xl animate-fade-in-up">
                Smart Appointment Booking with 
                <span class="gradient-text">CHRONEX</span>
            </h1>
            <p class="mb-8 text-xl opacity-90 animate-fade-in-up animation-delay-200">
                Experience the future of scheduling with our intelligent booking system. Streamline your appointments, reduce no-shows, and delight your customers with seamless time management.
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row animate-fade-in-up animation-delay-400">
                <a href="#booking" class="flex items-center justify-center gap-2 px-8 py-4 font-semibold text-white transition-all duration-300 rounded-full bg-accent hover:bg-primary hover:-translate-y-1 hover:shadow-lg animate-pulse-glow">
                    <i class="bi bi-calendar-plus"></i> Book Appointment
                </a>
                <a href="#services" class="flex items-center justify-center gap-2 px-8 py-4 font-semibold text-white transition-all duration-300 rounded-full glass-effect hover:bg-white hover:bg-opacity-20 hover:-translate-y-1">
                    <i class="bi bi-play-circle"></i> Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white" id="services">
        <div class="container px-4 mx-auto">
            <h2 class="mb-4 text-4xl font-bold text-center lg:text-5xl text-dark fade-in">Why Choose CHRONEX?</h2>
            <div class="w-20 h-1 mx-auto mb-16 rounded-full bg-gradient-to-r from-accent to-primary fade-in"></div>
            
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">Lightning Fast</h3>
                    <p class="leading-relaxed text-gray-600">Book appointments in seconds with our intuitive interface. No more back-and-forth emails or phone calls.</p>
                </div>
                
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float animation-delay-200">
                        <i class="bi bi-robot"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">AI-Powered</h3>
                    <p class="leading-relaxed text-gray-600">Smart scheduling that learns your preferences and optimizes your calendar automatically with machine learning.</p>
                </div>
                
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float animation-delay-400">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">Mobile Ready</h3>
                    <p class="leading-relaxed text-gray-600">Access your bookings anywhere, anytime. Our responsive design works perfectly on all devices and platforms.</p>
                </div>
                
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float">
                        <i class="bi bi-bell"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">Smart Reminders</h3>
                    <p class="leading-relaxed text-gray-600">Automated notifications and reminders help reduce no-shows and keep everyone on track with their schedules.</p>
                </div>
                
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float animation-delay-200">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">Secure & Private</h3>
                    <p class="leading-relaxed text-gray-600">Your data is protected with enterprise-grade security and privacy controls. GDPR compliant and encrypted.</p>
                </div>
                
                <div class="p-8 text-center transition-all duration-300 bg-white border border-gray-100 shadow-lg feature-hover rounded-xl fade-in">
                    <div class="mb-6 text-5xl text-primary animate-float animation-delay-400">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-dark">Analytics Dashboard</h3>
                    <p class="leading-relaxed text-gray-600">Gain valuable insights into your booking patterns and optimize your business operations with detailed reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 text-white bg-gradient-to-br from-primary to-secondary">
        <div class="container px-4 mx-auto">
            <div class="grid max-w-5xl grid-cols-1 gap-8 mx-auto text-center md:grid-cols-2 lg:grid-cols-4">
                <div class="fade-in">
                    <h3 class="mb-2 text-5xl font-bold counter" data-target="15000">0</h3>
                    <p class="text-xl opacity-90">Happy Customers</p>
                </div>
                <div class="fade-in">
                    <h3 class="mb-2 text-5xl font-bold counter" data-target="750000">0</h3>
                    <p class="text-xl opacity-90">Bookings Processed</p>
                </div>
                <div class="fade-in">
                    <h3 class="mb-2 text-5xl font-bold counter" data-target="99.9">0</h3>
                    <p class="text-xl opacity-90">% Uptime Guarantee</p>
                </div>
                <div class="fade-in">
                    <h3 class="mb-2 text-5xl font-bold">24/7</h3>
                    <p class="text-xl opacity-90">Support Available</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-gray-50" id="about">
        <div class="container px-4 mx-auto">
            <h2 class="mb-4 text-4xl font-bold text-center lg:text-5xl text-dark fade-in">About CHRONEX</h2>
            <div class="w-20 h-1 mx-auto mb-16 rounded-full bg-gradient-to-r from-accent to-primary fade-in"></div>
            
            <div class="max-w-4xl mx-auto text-center">
                <p class="mb-8 text-xl leading-relaxed lg:text-2xl text-dark fade-in">
                    CHRONEX revolutionizes appointment scheduling with cutting-edge technology and user-centric design. Our platform combines artificial intelligence with intuitive interfaces to create the most efficient booking experience possible.
                </p>
                <p class="text-lg leading-relaxed text-gray-600 fade-in">
                    Founded by industry experts with decades of experience in software development and business optimization, CHRONEX is trusted by thousands of businesses worldwide to manage their scheduling needs.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 text-white bg-gradient-to-br from-secondary to-primary" id="contact">
        <div class="container px-4 mx-auto">
            <h2 class="mb-4 text-4xl font-bold text-center lg:text-5xl fade-in">Get In Touch</h2>
            <div class="w-20 h-1 mx-auto mb-16 bg-white rounded-full bg-opacity-30 fade-in"></div>
            
            <div class="max-w-3xl mx-auto text-center">
                <p class="mb-8 text-xl lg:text-2xl opacity-90 fade-in">
                    Ready to transform your scheduling process? Contact our team today.
                </p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row fade-in">
                    <a href="mailto:info@chronex.com" class="flex items-center justify-center gap-2 px-8 py-4 font-semibold text-white transition-all duration-300 rounded-full glass-effect hover:bg-white hover:bg-opacity-20 hover:-translate-y-1">
                        <i class="bi bi-envelope"></i> Email Us
                    </a>
                    <a href="tel:+1234567890" class="flex items-center justify-center gap-2 px-8 py-4 font-semibold text-white transition-all duration-300 rounded-full glass-effect hover:bg-white hover:bg-opacity-20 hover:-translate-y-1">
                        <i class="bi bi-telephone"></i> Call Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 text-white bg-dark">
        <div class="container px-4 mx-auto text-center">
            <div class="flex flex-wrap justify-center gap-6 mb-6">
                <a href="#" class="flex items-center gap-2 text-gray-300 transition-colors duration-300 hover:text-white">
                    <i class="bi bi-shield-check"></i> Privacy Policy
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-300 transition-colors duration-300 hover:text-white">
                    <i class="bi bi-file-text"></i> Terms of Service
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-300 transition-colors duration-300 hover:text-white">
                    <i class="bi bi-headset"></i> Support
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-300 transition-colors duration-300 hover:text-white">
                    <i class="bi bi-code-slash"></i> API
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-300 transition-colors duration-300 hover:text-white">
                    <i class="bi bi-book"></i> Documentation
                </a>
            </div>
            <p class="text-gray-300">&copy; 2025 CHRONEX. All rights reserved. Built with ❤️ for better scheduling.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                navbar.classList.remove('py-5');
                navbar.classList.add('py-3');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.remove('py-3');
                navbar.classList.add('py-5');
            }
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

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Close mobile menu if open
                    document.getElementById('navLinks').classList.remove('active');
                    
                    // Update active nav link
                    document.querySelectorAll('nav a').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const speed = target > 1000 ? 50 : 100;
                const increment = target / speed;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    
                    if (target >= 1000) {
                        counter.textContent = Math.floor(current / 1000) + 'K+';
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 20);
            });
        }

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.py-20');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const navLinks = document.getElementById('navLinks');
            const toggler = document.querySelector('button[onclick="toggleMenu()"]');
            
            if (!navLinks.contains(e.target) && !toggler.contains(e.target)) {
                navLinks.classList.remove('active');
            }
        });

        // Add staggered animation delays
        document.querySelectorAll('.fade-in').forEach((el, index) => {
            el.style.animationDelay = `${index * 100}ms`;
        });
    </script>
</body>
</html>

