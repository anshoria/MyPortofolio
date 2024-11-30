@php
    $settings = \App\Models\GeneralSettings::first();
@endphp

@extends('layouts.app')

@section('title', 'About')
@section('content')
    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div data-aos="fade-right" class="overflow-hidden rounded-xl aspect-square relative">
                <!-- Preload Skeleton -->
                <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700" id="skeleton-about"></div>

                <img class="rounded-xl shadow-lg hover:shadow-xl hover:scale-110 transition duration-500 ease-in-out w-full h-full object-cover object-center opacity-0"
                    src="{{ asset('storage/' . $about->image) }}" alt="Profile Image" loading="lazy"
                    onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-about').style.display = 'none';">
            </div>

            <div class="mt-5 sm:mt-10 lg:mt-0" data-aos="fade-left">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-3 md:space-y-4">
                        <h2 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                            About Me
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $about->description }}
                        </p>
                    </div>

                    <!-- Social Media Icons -->
                    <div class="py-6">
                        <div class="grid grid-cols-6 gap-4 sm:gap-6">
                            @if ($settings->github)
                                <!-- GitHub -->
                                <a href="{{ $settings->github }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-600 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($settings->linkedin)
                                <!-- LinkedIn -->
                                <a href="{{ $settings->linkedin }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-blue-600 before:via-transparent before:to-blue-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                </path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($settings->instagram)
                                <!-- Instagram -->
                                <a href="{{ $settings->instagram }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-pink-600 before:via-transparent before:to-violet-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-pink-600 dark:text-pink-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="2" y="2" width="20" height="20" rx="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($settings->x)
                                <!-- X (Twitter) -->
                                <a href="{{ $settings->x }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-600 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M4 4l11.733 16h4.267l-11.733-16zM4 20l6.768-6.768M20 4l-6.768 6.768">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($settings->tiktok)
                                <!-- TikTok -->
                                <a href="{{ $settings->tiktok }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-600 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif

                            @if ($settings->youtube)
                                <!-- YouTube -->
                                <a href="{{ $settings->youtube }}" target="_blank" class="group">
                                    <div class="flex justify-center">
                                        <div
                                            class="relative flex justify-center items-center w-12 h-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-red-600 before:via-transparent before:to-red-600 before:rounded-xl dark:bg-slate-900 transition-all duration-300 hover:scale-110">
                                            <svg class="w-6 h-6 text-red-600 dark:text-red-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                                                </path>
                                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- End Icon Blocks -->

                    <!-- Download CV Button -->
                    <div class="flex justify-center sm:justify-start">
                        <a class="group inline-flex items-center gap-2 px-6 py-3 text-sm font-medium text-white transition-all duration-300 bg-gradient-to-r from-blue-600 to-violet-600 rounded-full hover:from-blue-700 hover:to-violet-700 hover:shadow-lg"
                            href="{{ asset('storage/' . $settings->cv) }}" target="_blank">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Download CV
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up">
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-blue-600 dark:text-blue-500">
                    {{ $about->experience }}+</h2>
                <p class="mt-1 text-gray-600 dark:text-gray-400">Years Experience</p>
            </div>
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-blue-600 dark:text-blue-500">
                    {{ $about->projects }}+</h2>
                <p class="mt-1 text-gray-600 dark:text-gray-400">Projects Completed</p>
            </div>
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-blue-600 dark:text-blue-500">
                    {{ $about->satisfaction }}%</h2>
                <p class="mt-1 text-gray-600 dark:text-gray-400">Satisfaction Rate</p>
            </div>
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-blue-600 dark:text-blue-500">
                    {{ $about->support }}</h2>
                <p class="mt-1 text-gray-600 dark:text-gray-400">Support</p>
            </div>
        </div>
    </div>

    <!-- Skills Section -->
    <div
        class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto rounded-3xl dark:bg-gradient-to-tr from-gray-800 to-gray-900">
        <!-- Section Header -->
        <div class="max-w-2xl mx-auto text-center mb-10">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight text-gray-800 dark:text-white">
                Technical Skills
            </h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">
                Technologies and tools I work with
            </p>
        </div>

        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-auto" data-aos="fade-up">
            <!-- Frontend Skills -->
            <div
                class="bg-white dark:bg-transparent border border-gray-200 dark:border-neutral-700 hover:bg-gray-100 dark:hover:bg-white/10 dark:focus:bg-white/10 rounded-2xl p-8 transition-transform">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-code mr-2 text-blue-600"></i>
                    Frontend Development
                </h3>
                <div class="space-y-4">
                    @foreach ($frontendSkills as $skill)
                        <div>
                            <div class="flex justify-between mb-1">
                                <span
                                    class="text-base font-medium text-gray-700 dark:text-gray-200">{{ $skill->title }}</span>
                                <span
                                    class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $skill->rate }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->rate }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Backend Skills -->
            <div
                class="bg-white dark:bg-transparent border border-gray-200 dark:border-neutral-700 hover:bg-gray-100 dark:hover:bg-white/10 dark:focus:bg-white/10 rounded-2xl p-8 transition-transform">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-server mr-2 text-blue-600"></i>
                    Backend Development
                </h3>
                <div class="space-y-4">
                    @foreach ($backendSkills as $skill)
                        <div>
                            <div class="flex justify-between mb-1">
                                <span
                                    class="text-base font-medium text-gray-700 dark:text-gray-200">{{ $skill->title }}</span>
                                <span
                                    class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $skill->rate }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->rate }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Icon Blocks -->
        <div class="max-w-[85rem] py-10 mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($skills as $skill)
                    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 hover:bg-gray-100 dark:border-neutral-700 dark:hover:bg-white/10 dark:focus:bg-white/10"
                        data-aos="fade-up" data-aos-delay="100">
                        <div
                            class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                            <i class="fa fa-{{ $skill->icon }} text-white text-xl"></i>
                        </div>
                        <div class="mt-3">
                            <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                {{ $skill->title }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
