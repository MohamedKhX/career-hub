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
</head>
<body class="font-sans bg-gray-50 text-brand-dark">
<header class="bg-white shadow-md relative">
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
</body>
</html>
