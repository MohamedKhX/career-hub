<x-app-layout>
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full mx-auto flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <h2 class="text-3xl font-bold mb-6 text-center">إنشاء حساب جديد كمسؤول توظيف</h2>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">الاسم</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل اسمك">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل بريدك الإلكتروني">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label for="company_website" class="block text-sm font-medium text-gray-700 mb-1">المواقع الإلكتروني</label>
                        <input type="text" id="company_website" company_website="company_website" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل موقع الإلكتروني">
                        <x-input-error :messages="$errors->get('company_website')" class="mt-2" />
                    </div>
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                        <input type="text" id="phone_number" phone_number="phone_number" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل رقم الهاتف">
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                        <input type="text" id="address" address="address" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل العنوان">
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">المدينة</label>
                        <input type="text" id="city" city="city" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل المدينة">
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أدخل كلمة المرور">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">تأكيد كلمة المرور</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-brand-red focus:border-brand-red transition duration-300 ease-in-out" placeholder="أعد إدخال كلمة المرور">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-brand-red text-white py-2 px-4 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                            إنشاء الحساب
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        لديك حساب بالفعل؟
                        <a href="{{ route('login') }}" class="text-brand-red hover:underline font-medium">تسجيل الدخول</a>
                    </p>
                </div>
            </div>
            <div class="hidden md:block w-1/2 bg-gradient-to-br from-brand-red to-pink-500 p-12 text-white">
                <div class="h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-6">انضم إلى مجتمع CareerHub اليوم</h3>
                        <p class="text-lg mb-8">اكتشف فرصًا لا حصر لها وطور مسيرتك المهنية مع شبكتنا الواسعة من المهنيين والشركات الرائدة.</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="search" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">ابحث عن وظائف تناسب مهاراتك</p>
                        </div>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="briefcase" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">تقدم لوظائف بنقرة واحدة</p>
                        </div>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="bg-white bg-opacity-20 rounded-full p-2">
                                <i data-feather="trending-up" class="h-6 w-6"></i>
                            </div>
                            <p class="text-lg">طور مهاراتك مع موارد التعلم</p>
                        </div>
                    </div>
                    <div class="mt-12">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="فريق عمل" class="rounded-xl shadow-lg float">
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
