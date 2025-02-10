<x-app-layout>
    <main class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-8">الإشعارات</h1>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @forelse($notifications as $notification)
                @if($notification->type == \App\Notifications\AcceptedApplicationNotification::class)
                    <div class="divide-y divide-gray-200">
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-green-500 rounded-full p-2">
                                    <i data-feather="briefcase" class="w-6 h-6 text-white"></i>
                                </div>
                                <div class="mr-4 flex-grow">
                                    <p class="font-semibold">تم قبول طلب التوظيف الخاص بك</p>
                                    <p class="text-gray-600">
                                        تم قبول طلبك من شركة
                                        {{ $notification->data['recruiter']['company_name'] }}
                                        لوظيفة
                                        {{ $notification->data['jobPost']['title'] }}
                                    </p>
                                    <p>
                                        تاريخ المقابلة: {{ $notification->data['date'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i data-feather="more-vertical" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="divide-y divide-gray-200">
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-red-500 rounded-full p-2">
                                    <i data-feather="briefcase" class="w-6 h-6 text-white"></i>
                                </div>
                                <div class="mr-4 flex-grow">
                                    <p class="font-semibold">تم رفض طلب التوظيف الخاص بك</p>
                                    <p class="text-gray-600">
                                        تم رفض طلبك من شركة
                                        {{ $notification->data['recruiter']['company_name'] }}
                                        لوظيفة
                                        {{ $notification->data['jobPost']['title'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i data-feather="more-vertical" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

            @empty
                <div class="p-6 text-center text-gray-500">
                    لا توجد إشعارات في الوقت الحالي.
                </div>
            @endforelse
        </div>
    </main>
</x-app-layout>
