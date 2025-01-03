@extends('layouts.app')

@push('meta-seo')
<meta name="description" content="Hi, Saya adalah fullstack developer. Saya menyediakan jasa pembuatan website dan juga menyediakan template website yang siap pakai.">
<meta name="keywords" content="anshoria, pembuatan website, template website">

{{-- meta social --}}
@php
    $settings = \App\Models\GeneralSettings::first();
@endphp

<meta property="og:title" content="anshoria">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="anshoria">
<meta property="og:description" content="Hi, Saya adalah fullstack developer. Saya menyediakan jasa pembuatan website dan juga menyediakan template website yang siap pakai.">
<meta property="og:image" content="{{ asset('storage/' . $settings->logo) }}">

@endpush

@section('title', 'Hi, welcome to my portofolio website!')

@section('content')
    <!-- Hero Section -->
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10" data-aos="fade-up">
        <!-- Announcement Banner -->
        <div class="flex justify-center">
            <a class="inline-flex items-center gap-x-2 bg-white/70 backdrop-blur-xl border border-gray-200 text-sm text-gray-800 p-1 ps-3 rounded-full transition hover:border-gray-300 dark:bg-gray-800/70 dark:border-gray-700 dark:hover:border-gray-600 dark:text-gray-200"
                href="#">
                Available for hire
                <span
                    class="py-1.5 px-2.5 inline-flex justify-center items-center gap-x-2 rounded-full bg-gradient-to-r from-violet-600 to-blue-600 font-semibold text-sm text-white">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </span>
            </a>
        </div>

        <!-- Title -->
        <div class="mt-8 max-w-3xl text-center mx-auto backdrop-blur-sm rounded-lg">
            <h1
                class="block font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-blue-600 text-4xl md:text-6xl lg:text-7xl animate-gradient">
                Hi, I'm Anshori
            </h1>
            <div class="mt-6 text-lg sm:text-xl text-gray-600 dark:text-gray-300">
                <span class="inline-flex items-center gap-x-2">
                    <span class="size-2 bg-blue-600 rounded-full animate-pulse"></span>
                    {{ $homepage->title }}
                </span>
            </div>
        </div>

        <!-- Description -->
        <div class="mt-5 max-w-3xl text-center mx-auto backdrop-blur-sm rounded-lg">
            <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                {{ $homepage->description }}
            </p>
        </div>

        <!-- Buttons -->
        <div class="mt-10 gap-4 flex justify-center">
            <a class="group inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-r from-violet-600 to-blue-600 hover:from-violet-700 hover:to-blue-700 border border-transparent text-white text-sm font-medium rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white py-3.5 px-7 dark:focus:ring-offset-gray-800"
                href="/projects">
                View My Work
                <svg class="flex-shrink-0 size-4 transition-transform group-hover:translate-x-1"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </a>
            <a class="group inline-flex justify-center items-center gap-x-3 text-center bg-white/90 backdrop-blur-xl hover:bg-white border text-gray-800 text-sm font-medium rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition py-3.5 px-7 dark:bg-gray-800/90 dark:hover:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
                href="{{ route('contact') }}">
                Contact Me
                <svg class="flex-shrink-0 size-4 transition-transform group-hover:translate-x-1"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>


    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" data-aos="zoom-in">
            <!-- Icon Block -->
            <div
                class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 backdrop-blur-sm dark:backdrop-blur-md hover:bg-gray-100 dark:border-neutral-700 dark:hover:bg-white/10 dark:focus:bg-white/10">
                <!-- Icon -->
                <div
                    class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                    <i class="fa fa-building text-white text-xl"></i>
                </div>
                <!-- End Icon -->

                <div class="mt-3">
                    <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Company Profile
                    </h3>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div
                class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 backdrop-blur-sm dark:backdrop-blur-md hover:bg-gray-100 dark:border-neutral-700 dark:hover:bg-white/10 dark:focus:bg-white/10">
                <!-- Icon -->
                <div
                    class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                    <i class="fa fa-globe text-white text-xl"></i>
                </div>
                <!-- End Icon -->

                <div class="mt-3">
                    <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Portal Layanan
                    </h3>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div
                class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 backdrop-blur-sm dark:backdrop-blur-md hover:bg-gray-100 dark:border-neutral-700 dark:hover:bg-white/10 dark:focus:bg-white/10">
                <!-- Icon -->
                <div
                    class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                    <i class="fa fa-location-arrow text-white text-xl"></i>
                </div>
                <!-- End Icon -->

                <div class="mt-3">
                    <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Landing Page
                    </h3>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div
                class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 backdrop-blur-sm dark:backdrop-blur-md hover:bg-gray-100 dark:border-neutral-700 dark:hover:bg-white/10 dark:focus:bg-white/10">
                <!-- Icon -->
                <div
                    class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                    <i class="fa fa-bag-shopping text-white text-xl"></i>
                </div>
                <!-- End Icon -->

                <div class="mt-3">
                    <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Sistem Penjualan
                    </h3>
                </div>
            </div>
            <!-- End Icon Block -->

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Icon Blocks -->

    @if ($ctaProject)
        <!-- CTA Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Main Content Container with Background -->
                <div class="relative z-10 rounded-3xl overflow-hidden" data-aos="fade-up">
                    <!-- Background Image with Overlay -->
                    <div class="absolute inset-0 z-0">
                        <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db?q=80&w=2115&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Modern workspace" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 to-gray-900/90"></div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 p-8 md:p-12">
                        <div class="max-w-2xl text-center mx-auto">
                            <!-- Discount Badge -->
                            <span
                                class="inline-flex items-center gap-2 py-2 px-4 rounded-full text-sm font-medium bg-blue-600 text-white mb-8">
                                Opening Sale - {{ $ctaProject->discount_percentage }}% Off
                            </span>

                            <h2 class="text-2xl font-bold md:text-3xl text-white mb-4">
                                Get {{ $ctaProject->discount_percentage }}% Off - First Launch Sale
                            </h2>
                            <p class="mt-3 text-lg text-gray-300">
                                Limited time offer on my website templates. Get started today and save big on your next
                                project!
                            </p>

                            <!-- CTA Buttons -->
                            <div class="mt-8 flex justify-center gap-4">
                                <a class="py-3 px-6 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-all duration-300"
                                    href="{{ route('katalog') }}">
                                    Get Template
                                </a>
                                <a class="py-3 px-6 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full bg-white/10 text-white hover:bg-white/20 transition-all duration-300"
                                    href="{{ route('contact') }}" target="_blank">
                                    Contact Me
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <!-- Projects Section -->
    <div class="relative py-16 sm:py-24">
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Section Title -->
            <div class="max-w-2xl mx-auto text-center mb-12">
                <h2
                    class="pb-4 text-3xl font-bold md:text-4xl lg:text-5xl bg-clip-text text-transparent bg-gradient-to-r from-violet-600 to-blue-600">
                    Featured Projects
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Discover my latest work and creative endeavors</p>
            </div>

            <!-- Project Grid -->
            <div class="grid lg:grid-cols-2 gap-8" data-aos="fade-up">
                @foreach ($featuredProjects as $project)
                    <div
                        class="group relative block rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl">
                        <!-- Clickable div with conditional data-hs-overlay -->
                        <div class="cursor-pointer"
                            @if (is_null($project->url)) data-hs-overlay="#project-modal-{{ $project->id }}"
                            @else
                                 onclick="window.open('{{ $project->url }}', '_blank')" @endif>
                            <div class="relative h-[400px] overflow-hidden">
                                <!-- Preload Skeleton -->
                                <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                    id="skeleton-{{ $project->id }}"></div>

                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900/90 z-10"></div>

                                <img class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110 opacity-0"
                                    loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}"
                                    onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $project->id }}').style.display = 'none';">

                                <!-- Project Info Overlay -->
                                <div class="absolute bottom-0 inset-x-0 z-20 p-6">
                                    <div class="flex flex-col">
                                        <div class="flex items-center gap-x-3 mb-3">
                                            <span
                                                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-600 text-white">
                                                {{ $project->category }}
                                            </span>
                                            <span class="text-white/70 text-sm">{{ $project->year }}</span>
                                        </div>
                                        <h3
                                            class="text-2xl font-semibold text-white group-hover:text-blue-400 transition-colors">
                                            {{ $project->title }}
                                        </h3>
                                        <p class="mt-2 text-white/90 line-clamp-2">
                                            {{ $project->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>



            <!-- View All Button -->
            <div class="mt-12 text-center" data-aos="fade-up">
                <a class="group inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-r from-violet-600 to-blue-600 hover:from-violet-700 hover:to-blue-700 text-white text-sm font-medium rounded-full py-3 px-8 hover:shadow-lg transition-all duration-300"
                    href="/projects">
                    View All Projects
                    <svg class="flex-shrink-0 size-4 transition-transform group-hover:translate-x-1"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="relative z-10 bg-gradient-to-tr from-gray-800 to-gray-900  dark:bg-gradient-to-tr dark:from-blue-800 dark:to-purple-900 rounded-3xl p-8 md:p-16"
                data-aos="fade-up">
                <div class="max-w-2xl text-center mx-auto">
                    <h2 class="text-2xl font-bold md:text-3xl text-white">
                        Let's Build Something Amazing Together
                    </h2>
                    <p class="mt-3 text-gray-300">
                        Have a project in mind? I'm always open to discussing new opportunities and ideas.
                    </p>
                    <div class="mt-8 flex justify-center gap-4">
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('contact') }}">
                            Get in Touch
                        </a>
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-white text-white hover:bg-white hover:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('projects') }}">
                            View Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CTA Section -->

    @foreach ($featuredProjects as $project)
        @if (is_null($project->url))
            <div id="project-modal-{{ $project->id }}" class="hs-overlay hidden [--overlay-backdrop:static]">
                <!-- Backdrop with blur -->
                <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50"></div>

                <!-- Modal Dialog -->
                <div class="fixed inset-0 z-[60] overflow-y-auto overflow-x-hidden">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <!-- Modal Content -->
                        <div class="relative max-w-lg w-full bg-white rounded-xl shadow-lg dark:bg-gray-800">


                            <!-- Modal Body -->
                            <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                <!-- Animated Icon -->
                                <span
                                    class="mb-6 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </span>

                                <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-white">
                                    Website Not Available
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400">
                                    I'm sorry, but this project's website is currently not accessible. The project might be
                                    in development or temporarily unavailable.
                                </p>

                                <div class="mt-6">
                                    <button type="button"
                                        class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                        data-hs-overlay="#project-modal-{{ $project->id }}">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initParticles();
            document.addEventListener('DOMContentLoaded', () => {
                HSOverlay.init();
            });
        });
    </script>
    <!-- Initialize Preline -->
@endsection
