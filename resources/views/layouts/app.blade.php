<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub - بوابتك لمستقبل مهني مشرق</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Tajawal', 'sans-serif'],
                    },
                    colors: {
                        'brand-red': '#FF3366',
                        'brand-dark': '#1A1A2E',
                    }
                }
            },
            darkMode: 'class'

        }
    </script>
    <style>
        * {
            font-family: 'Tajawal', serif !important;
        }
    </style>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .float { animation: float 3s ease-in-out infinite; }
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @stack('styles')
    @vite(['resources/css/app.css', 'resources/css/filament/admin/theme.css'])
    @filamentStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

</head>
<body class="font-sans bg-gray-50 text-brand-dark">
<header class="bg-white shadow-md relative mb-20">
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50 px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('home') }}" style="display: flex; justify-content: center; align-content: center;">
                    <svg class="w-10 h-10 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="text-2xl font-bold" style=" margin-top: 4px; margin-right: 5px">CareerHub</span>
                </a>
            </div>
            <div class="hidden md:flex space-x-6 space-x-reverse mr-22">
                <a href="{{ route('home') }}" class="text-lg hover:text-brand-red transition-colors">الرئيسية</a>
                <a href="{{ route('home') }}#jobs" class="text-lg hover:text-brand-red transition-colors">الوظائف</a>
                <a href="{{ route('home') }}#companies" class="text-lg hover:text-brand-red transition-colors">الشركات</a>
            </div>
            <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                @auth
                    <a href="{{ route('notifications') }}" class="relative text-gray-600 hover:text-brand-red transition-colors mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-3 right-0 inline-flex items-center justify-center px-1 py-0.5 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{ auth()->user()->notifications->count() }}
                        </span>
                    </a>
                    <div class="flex">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-brand-red text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors text-lg font-medium">تسجيل خروج</button>
                        </form>

                        @if(auth()->user()->type == \App\Enums\UserTypeEnum::Admin)
                            <a href="/admin" class="cursor-pointer px-6 py-2 rounded-full transition-colors text-lg font-medium">ذهاب للوحة التحكم</a>
                        @endif

                        @if(auth()->user()->type == \App\Enums\UserTypeEnum::Recruiter)
                            <a href="/recruiter" class="cursor-pointer px-6 py-2 rounded-full transition-colors text-lg font-medium">ذهاب للوحة التحكم</a>
                        @endif
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-brand-red cursor-pointer text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors text-lg font-medium">تسجيل دخول</a>
                    <a href="{{ route('register') }}" class="cursor-pointer px-6 py-2 rounded-full transition-colors text-lg font-medium">إنشاء حساب</a>
                @endauth
            </div>
            <div class="md:hidden">
                <button class="text-brand-dark hover:text-brand-red transition-colors">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>
</header>
<main>
    {{ $slot }}
</main>
@stack('scripts')
@filamentScripts
<footer class="bg-brand-dark text-white py-12 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            <div class="space-y-4">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <svg class="w-10 h-10 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="text-2xl font-bold">CareerHub</span>
                </div>
                <p class="text-gray-400">نربط المواهب بالفرص في العالم العربي</p>
                <div class="flex flex-col space-y-2">
                    <a href="mailto:info@careerhub.com" class="text-gray-400 hover:text-brand-red transition-colors duration-300 flex items-center space-x-2 space-x-reverse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>info@careerhub.com</span>
                    </a>
                    <a href="tel:+966123456789" class="text-right text-gray-400 hover:text-brand-red transition-colors duration-300 flex items-center space-x-2 space-x-reverse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>0000 000 091</span>
                    </a>
                   {{-- <div class="text-gray-400 flex items-start space-x-2 space-x-reverse">
                        <svg class="w-5 h-5 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>شارع الملك فهد، برج المملكة، الرياض، المملكة العربية السعودية</span>
                    </div>--}}
                </div>
            </div>
            <div class="space-y-4">
                <h3 class="text-xl font-semibold mb-4">روابط سريعة</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="text-gray-400 hover:text-brand-red transition-colors duration-300 flex items-center space-x-2 space-x-reverse group">
                            <span class="w-0 group-hover:w-4 transition-all duration-300 h-px bg-brand-red"></span>
                            <span>الصفحة الرئيسية</span>
                        </a>
                    </li>
                    <li>
                        <a href="#jobs" class="text-gray-400 hover:text-brand-red transition-colors duration-300 flex items-center space-x-2 space-x-reverse group">
                            <span class="w-0 group-hover:w-4 transition-all duration-300 h-px bg-brand-red"></span>
                            <span>الوظائف</span>
                        </a>
                    </li>
                    <li>
                        <a href="#companies" class="text-gray-400 hover:text-brand-red transition-colors duration-300 flex items-center space-x-2 space-x-reverse group">
                            <span class="w-0 group-hover:w-4 transition-all duration-300 h-px bg-brand-red"></span>
                            <span>الشركات</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="text-xl font-semibold mb-4">حساب المستخدم</h3>
                <div class="flex flex-col space-y-2">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-brand-red text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors duration-300 text-center">تسجيل خروج</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-brand-red text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors duration-300 text-center">تسجيل الدخول</a>
                        <a href="{{ route('register') }}" class="bg-transparent text-brand-red border border-brand-red px-6 py-2 rounded-full hover:bg-brand-red hover:text-white transition-colors duration-300 text-center">إنشاء حساب</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-800 text-center">
            <p class="text-white">&copy; 2023 CareerHub. جميع الحقوق محفوظة.</p>
        </div>
    </div>

    <!-- Decorative elements -->
 {{--   <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-red via-yellow-500 to-blue-500"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-gradient-to-tl from-brand-red to-transparent opacity-10 rounded-full transform translate-x-1/2 translate-y-1/2"></div>
    <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-gradient-to-br from-yellow-500 to-transparent opacity-10 rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>--}}
</footer>

<script>
    // Add hover effect to links
    const links = document.querySelectorAll('footer a');
    links.forEach(link => {
        link.addEventListener('mouseenter', () => {
            link.classList.add('scale-105', 'transform', 'transition-transform', 'duration-300');
        });
        link.addEventListener('mouseleave', () => {
            link.classList.remove('scale-105', 'transform', 'transition-transform', 'duration-300');
        });
    });

    // Animate decorative elements
    const decorativeElements = document.querySelectorAll('footer > div > div:not(:first-child)');
    decorativeElements.forEach(element => {
        element.classList.add('animate-pulse-slow');
    });
</script>

<style>
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.1; }
        50% { opacity: 0.2; }
    }
    .animate-pulse-slow {
        animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

</body>
</html>
