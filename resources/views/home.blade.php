<x-app-layout>
    @push('styles')
        <style>
            .slider-container {
                overflow: hidden;
                position: relative;
            }
            .slider {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }
            .slide {
                flex: 0 0 100%;
                width: 100%;
            }
            .slide-indicators {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 10px;
                z-index: 10;
            }
            .slide-indicator {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .slide-indicator.active {
                background-color: #FF3366;
            }
        </style>
    @endpush


    <section class="relative h-[600px] slider-container">
            <div class="slider h-full">
                <div class="slide relative">
                    <img src="{{ asset('images/img1.png') }}" alt="فرص وظيفية مميزة" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-5xl font-bold mb-4">ابدأ مسيرتك المهنية مع CareerHub</h1>
                            <p class="text-xl mb-8">اكتشف آلاف الفرص الوظيفية في مختلف المجالات</p>
                            <a href="#jobs" class="bg-brand-red text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-red-600 transition-colors">ابحث عن وظيفة الآن</a>
                        </div>
                    </div>
                </div>
                <div class="slide relative">
                    <img src="{{ asset('images/img2.png') }}" alt="تعرف على أفضل الشركات" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-5xl font-bold mb-4">تعرف على أفضل الشركات</h1>
                            <p class="text-xl mb-8">استكشف ثقافات الشركات وفرص النمو المهني</p>
                            <a href="#jobs" class="bg-brand-red text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-red-600 transition-colors">ابحث عن وظيفة الآن</a>
                        </div>
                    </div>
                </div>
                <div class="slide relative">
                    <img src="{{ asset('images/img3.png') }}" alt="طور مهاراتك المهنية" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h1 class="text-5xl font-bold mb-4">ابدأ رحلتك المهنية</h1>
                            <p class="text-xl mb-8">اكتشف فرص العمل المثالية لك</p>
                            <a href="#jobs" class="bg-brand-red text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-red-600 transition-colors">تصفح الوظائف الآن</a>
                        </div>
                    </div>
                </div>
            </div>
            <button id="prevBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 focus:outline-none z-10">
                <i data-feather="chevron-right" class="w-6 h-6"></i>
            </button>
            <button id="nextBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 focus:outline-none z-10">
                <i data-feather="chevron-left" class="w-6 h-6"></i>
            </button>
            <div class="slide-indicators"></div>
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

    <!-- Top Companies Section -->
    <section id="companies" class="py-16 bg-white">
            <div class="container mx-auto px-6">
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
                        {{ $jobPostsCount }}
                    </h4>
                    <p class="text-xl">إعلان وظيفي</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $companiesCount }}
                    </h4>
                    <p class="text-xl">شركة</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $jobApplicationsCount }}
                    </h4>
                    <p class="text-xl">مرشح</p>
                </div>
                <div>
                    <h4 class="text-4xl font-bold mb-2">
                        {{ $userCount }}
                    </h4>
                    <p class="text-xl">مستخدم</p>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            feather.replace();

            const mainSlider = document.querySelector('.slider');
            const mainSlides = document.querySelectorAll('.slide');
            const mainPrevBtn = document.getElementById('prevBtn');
            const mainNextBtn = document.getElementById('nextBtn');
            const mainSlideIndicatorsContainer = document.querySelector('.slide-indicators');
            let mainCurrentSlide = 0;

            // Create slide indicators
            if (mainSlideIndicatorsContainer) {
                mainSlides.forEach((_, index) => {
                    const indicator = document.createElement('div');
                    indicator.classList.add('slide-indicator');
                    indicator.addEventListener('click', () => showMainSlide(index));
                    mainSlideIndicatorsContainer.appendChild(indicator);
                });
            }

            const mainIndicators = document.querySelectorAll('.slide-indicator');

            function updateMainIndicators() {
                mainIndicators.forEach((indicator, index) => {
                    if (index === mainCurrentSlide) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }

            function showMainSlide(n) {
                mainCurrentSlide = (n + mainSlides.length) % mainSlides.length;
                mainSlider.style.transform = `translateX(${mainCurrentSlide * 100}%)`;
                updateMainIndicators();
            }

            function nextMainSlide() {
                showMainSlide(mainCurrentSlide - 1);  // Changed from + to - for RTL
            }

            function prevMainSlide() {
                showMainSlide(mainCurrentSlide + 1);  // Changed from - to + for RTL
            }

            if (mainNextBtn) mainNextBtn.addEventListener('click', nextMainSlide);
            if (mainPrevBtn) mainPrevBtn.addEventListener('click', prevMainSlide);

            // Auto-advance slides every 5 seconds
            let mainSlideInterval = setInterval(nextMainSlide, 5000);

            // Pause auto-advance when hovering over the slider
            if (mainSlider) {
                mainSlider.addEventListener('mouseenter', () => {
                    clearInterval(mainSlideInterval);
                });

                mainSlider.addEventListener('mouseleave', () => {
                    mainSlideInterval = setInterval(nextMainSlide, 5000);
                });
            }

            // Initialize the first slide
            showMainSlide(0);
        </script>
    @endpush
</x-app-layout>
