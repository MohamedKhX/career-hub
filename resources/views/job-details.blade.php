<x-app-layout>
    <main class="container mx-auto px-6 py-8 mt-20">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
            <div class="md:flex">
                <div class="md:w-1/3 bg-gradient-to-br from-brand-red to-pink-500 p-8 text-white">
                    <img src="{{ $jobPost->recruiter->logo }}" alt="شعار الشركة" class="w-32 h-32 rounded-2xl mx-auto mb-6 shadow-lg float">
                    <h2 class="text-2xl font-bold mb-4 text-center">{{ $jobPost->recruiter->company_name }}</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i data-feather="map-pin" class="w-5 h-5 mr-2"></i>
                            <span>
                                {{ $jobPost->recruiter->address }}, {{ $jobPost->recruiter->city }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <i data-feather="globe" class="w-5 h-5 mr-2"></i>
                            <a href="{{ $jobPost->recruiter->company_website }}" class="hover:underline">{{ $jobPost->recruiter->company_website }}</a>
                        </div>
                        <div class="flex items-center">
                            <i data-feather="users" class="w-5 h-5 mr-2"></i>
                            <span>{{ $jobPost->recruiter->phone_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-2/3 p-8">
                    <h1 class="text-4xl font-bold mb-4">{{ $jobPost->title }}</h1>
                    <div class="flex flex-wrap gap-4 mb-6">
                        <span class="bg-brand-red text-white px-4 py-1 rounded-full text-sm font-semibold">
                            {{ $jobPost->job_type->translate() }}
                        </span>
                        <span class="bg-blue-100 text-blue-800 px-4 py-1 rounded-full text-sm font-semibold">
                             مدينة  {{ $jobPost->city->name }}
                        </span>
                        <span class="bg-green-100 text-green-800 px-4 py-1 rounded-full text-sm font-semibold">
                            {{ $jobPost->industry->name }}
                        </span>
                    </div>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-6">
                            {{ $jobPost->short_description }}
                        </p>
                        <div>
                            {!! $jobPost->description !!}
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <livewire:job-details :record="$jobPost" />
                    </div>
                </div>
            </div>
        </div>
        <livewire:rating :recruiter="$jobPost->recruiter"/>
    </main>
</x-app-layout>
