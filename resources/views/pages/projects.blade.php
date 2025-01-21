@extends('layouts.app')

@push('meta-seo')
    <meta name="description" content="Discover my latest work and creative endeavors">
    <meta name="keywords" content="project anshoria, projek anshori, portofolio anshori">

    {{-- meta social --}}
    @php
        $settings = \App\Models\GeneralSettings::first();
    @endphp

    <meta property="og:title" content="Projects - anshoria">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="anshoria">
    <meta property="og:description" content="Discover my latest work and creative endeavors">
    <meta property="og:image" content="{{ asset('storage/' . $settings->logo) }}">
@endpush

@section('title', 'Projects')
@section('content')
    <div class="min-h-[calc(100vh-210px)] relative ">
        <!-- Category Navigation -->
        <div class="max-w-[85rem] px-3.5 sm:px-6 lg:px-8 mx-auto mt-6">
            <div class="relative">
                <div id="category-tabs" class="flex overflow-x-auto gap-2 hide-scrollbar scrollbar-hide">
                    <a href="{{ route('projects', ['category' => 'all']) }}"
                        class="category-tab relative inline-flex items-center whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 
                {{ $selectedCategory === 'all' ? 'bg-blue-600 text-white active' : 'bg-gray-100 text-gray-800 hover:bg-blue-600 hover:text-white dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-600' }}"
                        onclick="handleCategoryClick(event)">
                        <span>Semua</span>
                        <div class="loading-spinner ml-2 hidden">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('projects', ['category' => $category]) }}"
                            class="category-tab relative inline-flex items-center whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                    {{ $selectedCategory === $category ? 'bg-blue-600 text-white active' : 'bg-gray-100 text-gray-800 hover:bg-blue-600 hover:text-white dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-600' }}"
                            onclick="handleCategoryClick(event)">
                            <span>{{ $category }}</span>
                            <div class="loading-spinner ml-2 hidden">
                                <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div
                    class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white dark:from-gray-900 to-transparent pointer-events-none">
                </div>
            </div>
        </div>

        <!-- Card Blog -->
        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">
                @foreach ($projects as $project)
                    <!-- Card -->
                    <a href="{{ route('projects.show', $project) }}"
                        class="group block rounded-xl overflow-hidden focus:outline-none sm:hover:bg-gray-100 sm:dark:hover:bg-white/10 sm:dark:focus:bg-white/10">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
                            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
                                <!-- Preload Skeleton -->
                                <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                    id="skeleton-{{ $project->id }}"></div>

                                <img class="group-hover:scale-105 group-focus:scale-105 transition duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl opacity-0"
                                    src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    loading="lazy"
                                    onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $project->id }}').style.display = 'none';">

                                @if ($project->category)
                                    <span
                                        class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                                        {{ $project->category }}
                                    </span>
                                @endif
                            </div>

                            <div class="grow">
                                <h3
                                    class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                                    {{ $project->title }}
                                </h3>
                                <p class="mt-3 text-gray-600 dark:text-neutral-400 line-clamp-3 sm:line-clamp-2">
                                    {{ strip_tags($project->description) }}
                                </p>
                                <div class="flex flex-wrap items-center mt-3 gap-1">
                                    @foreach ($project->tech_stack as $tech)
                                        <span
                                            class="inline-flex items-center gap-x-1.5 py-1 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">{{ $tech }}</span>
                                    @endforeach

                                </div>
                                <p
                                    class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-blue-600 dark:text-neutral-200">
                                    View details
                                    <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- End Card -->
                @endforeach
            </div>
            <!-- End Grid -->

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                @if ($projects->hasPages())
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($projects->onFirstPage())
                            <span
                                class="relative inline-flex items-center rounded-l-md px-3 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-600 hover:text-white focus:z-20 focus:outline-offset-0 cursor-not-allowed">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $projects->appends(['category' => $selectedCategory])->previousPageUrl() }}"
                                class="relative inline-flex items-center rounded-l-md px-3 py-2 text-gray-600 ring-1 ring-inset ring-gray-300 hover:bg-blue-600 hover:text-white focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($projects->getUrlRange(max(1, $projects->currentPage() - 2), min($projects->lastPage(), $projects->currentPage() + 2)) as $page => $url)
                            @if ($page == $projects->currentPage())
                                <span aria-current="page"
                                    class="relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-500">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}&category={{ $selectedCategory }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-blue-600 hover:text-white dark:text-white focus:z-20 focus:outline-offset-0">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($projects->hasMorePages())
                            <a href="{{ $projects->appends(['category' => $selectedCategory])->nextPageUrl() }}"
                                class="relative inline-flex items-center rounded-r-md px-3 py-2 text-gray-600 ring-1 ring-inset ring-gray-300 hover:bg-blue-600 hover:text-white focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <span
                                class="relative inline-flex items-center rounded-r-md px-3 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-600 hover:text-white focus:z-20 focus:outline-offset-0 cursor-not-allowed">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    </nav>
                @endif
            </div>

        </div>
        <!-- End Card Blog -->
    </div>

    <script>
        function handleCategoryClick(event) {
            event.preventDefault();
            const link = event.currentTarget;
            const spinner = link.querySelector('.loading-spinner');

            // Show spinner on clicked tab
            spinner.classList.remove('hidden');

            // Update active state immediately
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white', 'active');
                tab.classList.add('bg-gray-100', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-gray-300');
            });

            link.classList.remove('bg-gray-100', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-gray-300');
            link.classList.add('bg-blue-600', 'text-white', 'active');

            // Scroll to active tab
            const tabRect = link.getBoundingClientRect();
            const container = document.getElementById('category-tabs');
            const containerRect = container.getBoundingClientRect();

            container.scrollTo({
                left: link.offsetLeft - (containerRect.width / 2) + (tabRect.width / 2),
                behavior: 'smooth'
            });

            // Navigate after small delay
            setTimeout(() => {
                window.location.href = link.href;
            }, 300);
        }

        // Initial scroll to active tab
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('category-tabs');
            const activeTab = container.querySelector('.active');

            if (activeTab) {
                const tabRect = activeTab.getBoundingClientRect();
                const containerRect = container.getBoundingClientRect();

                container.scrollTo({
                    left: activeTab.offsetLeft - (containerRect.width / 2) + (tabRect.width / 2),
                    behavior: 'smooth'
                });
            }
        });
    </script>

    <!-- Add this CSS to your stylesheet -->
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
