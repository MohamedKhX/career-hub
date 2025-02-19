<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد البريد الإلكتروني - CareerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
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
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 min-h-screen flex items-center justify-center p-4">
<div class="max-w-md w-full">
    <!-- Logo -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center">
            <svg class="w-12 h-12 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="text-2xl font-bold mr-2">CareerHub</span>
        </div>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Email Icon -->
        <div class="bg-gradient-to-r from-brand-red to-red-400 p-6 text-center">
            <div class="float-animation">
                <svg class="w-16 h-16 mx-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-white text-2xl font-bold mt-4">تحقق من بريدك الإلكتروني</h2>
            <p class="text-white/90 mt-2">لقد أرسلنا رابط التحقق إلى بريدك الإلكتروني</p>
        </div>

        <div class="p-8">

            <!-- Instructions -->
            <div class="space-y-4">
                <p class="text-gray-600">
                    انقر على الرابط المرسل في البريد الإلكتروني لتأكيد حسابك. إذا لم تجد البريد الإلكتروني، يرجى التحقق من مجلد البريد غير المرغوب فيه.
                </p>

                <!-- Resend Button -->
                <div class="flex flex-col space-y-4">
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button class="w-full bg-brand-red text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-opacity-50">
                            إعادة إرسال رابط التحقق
                        </button>
                    </form>

                </div>
                <div class="flex justify-center">
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-brand-red text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors duration-300 text-center">تسجيل خروج</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div class="hidden mt-4 bg-green-50 border border-green-200 rounded-lg p-4">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <p class="text-green-700">تم تأكيد بريدك الإلكتروني بنجاح!</p>
        </div>
    </div>

    <!-- Error Message (Hidden by default) -->
    <div class="hidden mt-4 bg-red-50 border border-red-200 rounded-lg p-4">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-500 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <p class="text-red-700">حدث خطأ. يرجى المحاولة مرة أخرى.</p>
        </div>
    </div>
</div>

<script>
    // Simple countdown timer for demo purposes
    let seconds = 59;
    const timerSpan = document.querySelector('span.font-semibold.text-brand-dark');

    setInterval(() => {
        if (seconds > 0) {
            seconds--;
            timerSpan.textContent = seconds;
        }
    }, 1000);
</script>
</body>
</html>

