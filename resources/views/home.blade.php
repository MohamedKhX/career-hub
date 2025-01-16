<x-app-layout>
    <section class="bg-gradient-to-l from-brand-dark to-brand-red text-white py-20 lg:py-32">
        <div class="container mx-auto px-6">
            <div class="flex flex-col content-between lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-12 text-right">
                    <h1 class="text-4xl lg:text-6xl font-extrabold mb-6 leading-tight">اكتشف مستقبلك المهني مع CareerHub</h1>
                    <p class="text-xl lg:text-2xl mb-8 opacity-90">نحن نربط المواهب بالفرص. ابدأ رحلتك المهنية اليوم واستكشف آلاف الوظائف المميزة من أفضل الشركات في المنطقة.</p>
                    <div class="flex flex-col sm:flex-row justify-start space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <button class="bg-white text-brand-red px-8 py-3 rounded-full hover:bg-gray-100 transition-colors text-lg font-bold">ابحث عن وظيفة</button>
                    </div>
                </div>
                <div class="flex justify-center lg:w-1/2 mt-12 lg:mt-0">
                    <img width="600" src="https://images.unsplash.com/photo-1506784926709-22f1ec395907?q=80&w=2668&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="فريق عمل" class="rounded-lg shadow-2xl">
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
    <section id="jobs" class="py-16 bg-gray-100">
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
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $jobPostsCount }} +
                    </h4>
                    <p class="text-xl">إعلان وظيفي</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $companiesCount }} +
                    </h4>
                    <p class="text-xl">شركة</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $jobApplicationsCount }} +
                    </h4>
                    <p class="text-xl">مرشح</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $userCount }} +
                    </h4>
                    <p class="text-xl">مستخدم</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Companies Section -->
    <section id="companies" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold mb-8">أفضل الشركات التي توظف</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($companies as $company)
                    <div class="bg-gray-100 p-6 rounded-lg text-center hover:shadow-md transition-shadow">
                        <img src="{{ $company->logo }}" alt="" class="w-16 h-16 mx-auto mb-4">
                        <h4 class="font-semibold">{{ $company->company_name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
