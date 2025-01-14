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
</head>
<body class="font-sans bg-gray-50 text-brand-dark">
<header class="bg-white shadow-md">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <svg class="w-10 h-10 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span class="text-2xl font-bold">CareerHub</span>
            </div>
            <div class="hidden md:flex space-x-6 space-x-reverse">
                <a href="#" class="text-lg hover:text-brand-red transition-colors">الرئيسية</a>
                <a href="#" class="text-lg hover:text-brand-red transition-colors">الوظائف</a>
                <a href="#" class="text-lg hover:text-brand-red transition-colors">الشركات</a>
                <a href="#" class="text-lg hover:text-brand-red transition-colors">الموارد</a>
                <a href="#" class="text-lg hover:text-brand-red transition-colors">تواصل معنا</a>
            </div>
            <div class="hidden md:block">
                <button class="bg-brand-red text-white px-6 py-2 rounded-full hover:bg-red-600 transition-colors text-lg font-medium">نشر وظيفة</button>
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
    <section class="bg-gradient-to-l from-brand-dark to-brand-red text-white py-20 lg:py-32">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-12 text-right">
                    <h1 class="text-4xl lg:text-6xl font-extrabold mb-6 leading-tight">اكتشف مستقبلك المهني مع CareerHub</h1>
                    <p class="text-xl lg:text-2xl mb-8 opacity-90">نحن نربط المواهب بالفرص. ابدأ رحلتك المهنية اليوم واستكشف آلاف الوظائف المميزة من أفضل الشركات في المنطقة.</p>
                    <div class="flex flex-col sm:flex-row justify-start space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <button class="bg-white text-brand-red px-8 py-3 rounded-full hover:bg-gray-100 transition-colors text-lg font-bold">ابحث عن وظيفة</button>
                        <button class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-brand-red transition-colors text-lg font-bold">للشركات</button>
                    </div>
                </div>
                <div class="lg:w-1/2 mt-12 lg:mt-0">
{{--
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="فريق عمل" class="rounded-lg shadow-2xl">
--}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-center">لماذا CareerHub؟</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-brand-red rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="briefcase" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">آلاف الفرص</h3>
                    <p class="text-gray-600">اكتشف وظائف من شركات رائدة في مختلف المجالات</p>
                </div>
                <div class="text-center">
                    <div class="bg-brand-red rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="trending-up" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">تطور مهني</h3>
                    <p class="text-gray-600">موارد وأدوات لمساعدتك في تحقيق أهدافك المهنية</p>
                </div>
                <div class="text-center">
                    <div class="bg-brand-red rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i data-feather="users" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">شبكة واسعة</h3>
                    <p class="text-gray-600">تواصل مع خبراء الصناعة وأصحاب العمل المحتملين</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-8">فرص العمل المميزة</h3>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <livewire:jobs-table/>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-brand-red text-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <h4 class="text-4xl font-bold mb-2">+10 آلاف</h4>
                    <p class="text-xl">إعلان وظيفي</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">+5 آلاف</h4>
                    <p class="text-xl">شركة</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">+15 مليون</h4>
                    <p class="text-xl">مرشح</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">+1 مليون</h4>
                    <p class="text-xl">توظيف</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Companies Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-8">أفضل الشركات التي توظف</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-md transition-shadow">
                    <img src="https://logo.clearbit.com/google.com" alt="جوجل" class="w-16 h-16 mx-auto mb-4">
                    <h4 class="font-semibold">جوجل</h4>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-md transition-shadow">
                    <img src="https://logo.clearbit.com/apple.com" alt="آبل" class="w-16 h-16 mx-auto mb-4">
                    <h4 class="font-semibold">آبل</h4>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-md transition-shadow">
                    <img src="https://logo.clearbit.com/amazon.com" alt="أمازون" class="w-16 h-16 mx-auto mb-4">
                    <h4 class="font-semibold">أمازون</h4>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-md transition-shadow">
                    <img src="https://logo.clearbit.com/microsoft.com" alt="مايكروسوفت" class="w-16 h-16 mx-auto mb-4">
                    <h4 class="font-semibold">مايكروسوفت</h4>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="bg-brand-dark text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <h5 class="text-xl font-semibold mb-4">حول CareerHub</h5>
                <p class="text-gray-400">نربط المهنيين الموهوبين بفرص عمل مذهلة في جميع أنحاء العالم.</p>
            </div>
            <div>
                <h5 class="text-xl font-semibold mb-4">روابط سريعة</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-brand-red transition-colors">البحث عن وظائف</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">نشر وظيفة</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">إنشاء السيرة الذاتية</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">نصائح مهنية</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xl font-semibold mb-4">الدعم</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-brand-red transition-colors">مركز المساعدة</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">الأسئلة الشائعة</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">اتصل بنا</a></li>
                    <li><a href="#" class="hover:text-brand-red transition-colors">سياسة الخصوصية</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xl font-semibold mb-4">تواصل معنا</h5>
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                        <i data-feather="facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                        <i data-feather="twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                        <i data-feather="linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-brand-red transition-colors">
                        <i data-feather="instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© 2023 CareerHub. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>
</body>
</html>
