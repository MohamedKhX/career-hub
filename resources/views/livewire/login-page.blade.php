<div>
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full mx-auto flex">
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <h2 class="text-3xl font-bold mb-6 text-center">مرحبًا بعودتك</h2>
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل بريدك الإلكتروني">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل كلمة المرور">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me" name="remember-me" class="h-4 w-4 text-brand-red focus:ring-brand-red border-gray-300 rounded">
                            <label for="remember-me" class="mr-2 block text-sm text-gray-700">تذكرني</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-brand-red text-white py-2 px-4 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                            تسجيل الدخول
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        ليس لديك حساب؟
                        <a href="{{ route('register') }}" class="text-brand-red hover:underline font-medium">إنشاء حساب جديد</a>
                    </p>
                </div>
            </div>
            <div class="hidden md:block w-1/2 bg-gradient-to-br from-brand-red to-pink-500 p-12 text-white">
                <div class="h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-6">ابدأ رحلتك المهنية مع CareerHub</h3>
                        <p class="text-lg mb-8">اكتشف فرص العمل المثالية وتواصل مع أفضل الشركات في المنطقة.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="check" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">آلاف الوظائف المتاحة</p>
                        </div>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="users" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">شبكة واسعة من المهنيين</p>
                        </div>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="trending-up" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">فرص للنمو والتطور المهني</p>
                        </div>
                    </div>
                    <div class="mt-12">
                        <img src="https://plus.unsplash.com/premium_photo-1661598213264-9b708f59d793?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8am9ifGVufDB8fDB8fHww" alt="العمل في مكتب" class="rounded-xl shadow-lg float">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
