@extends('layouts.app')

@section('title', $project->title)
@section('content')
    <!-- Project Article -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                        <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                            href="{{ route('projects') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                            Back to Projects
                        </a>

                        <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">{{ $project->title }}</h2>

                        <div class="flex items-center gap-x-5">
                            @if ($project->category)
                                <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200"
                                    href="#">
                                    {{ $project->category }}
                                </a>
                            @endif
                            <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200">
                                {{ $project->year }}
                            </p>
                        </div>

                        <!-- Main Project Image -->
                        <div class="relative rounded-xl overflow-hidden">
                            <!-- Preload Skeleton -->
                            <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                id="skeleton-main-{{ $project->id }}"></div>

                            <img class="w-full aspect-video object-cover opacity-0"
                                src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" loading="lazy"
                                onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-main-{{ $project->id }}').style.display = 'none';">
                        </div>

                        <!-- Project Description -->
                        <div
                            class="prose max-w-none text-gray-800 dark:text-gray-200 dark:prose-invert
                        prose-headings:font-bold
                        prose-p:mt-4 prose-p:mb-4
                        prose-ul:list-disc prose-ul:ml-4 prose-ul:my-4
                        prose-ol:list-decimal prose-ol:ml-4 prose-ol:my-4
                        prose-li:mt-1
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline">
                            {!! $project->description !!}
                        </div>

                        <!-- Project Images -->
                        @if ($project->images)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach (json_decode($project->images) as $index => $image)
                                    <div class="relative rounded-xl overflow-hidden">
                                        <!-- Preload Skeleton -->
                                        <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                            id="skeleton-{{ $index }}-{{ $project->id }}"></div>

                                        <img class="w-full aspect-video object-cover opacity-0"
                                            src="{{ asset('storage/' . $image) }}"
                                            alt="{{ $project->title }} image {{ $index + 1 }}" loading="lazy"
                                            onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $index }}-{{ $project->id }}').style.display = 'none';">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div
                class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                <div class="sticky top-0 start-0 py-8 lg:ps-8">
                    <!-- Project Info -->
                    <div class="mb-8">
                        <div class="space-y-4">
                            <button type="button"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                @if ($project->url) onclick="window.open('{{ $project->url }}', '_blank')"
                                        @else
                                            data-hs-overlay="#project-modal-{{ $project->id }}" @endif>
                                Visit Website
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                    <polyline points="15 3 21 3 21 9" />
                                    <line x1="10" y1="14" x2="21" y2="3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Related Projects -->
                    @if ($relatedProjects && $relatedProjects->count() > 0)
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Related Projects</h3>

                            @foreach ($relatedProjects as $relatedProject)
                                <!-- Project Card -->
                                <a class="group flex items-center gap-x-6"
                                    href="{{ route('projects.show', $relatedProject) }}">
                                    <div class="grow line-clamp-3">
                                        <span
                                            class="text-sm font-bold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-500">
                                            {{ $relatedProject->title }}
                                        </span>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ strip_tags($relatedProject->description) }}
                                        </p>
                                    </div>

                                    <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                        <!-- Preload Skeleton -->
                                        <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                            id="skeleton-related-{{ $relatedProject->id }}"></div>

                                        <img class="size-full absolute top-0 start-0 object-cover rounded-lg opacity-0"
                                            src="{{ asset('storage/' . $relatedProject->image) }}"
                                            alt="{{ $relatedProject->title }}" loading="lazy"
                                            onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-related-{{ $relatedProject->id }}').style.display = 'none';">
                                    </div>
                                </a>
                                <!-- End Project Card -->
                            @endforeach
                        </div>
                    @endif

                    <!-- Share Section -->
                    <div class="mt-8">
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700">
                            <div class="p-4 sm:p-6">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                                    Share Project
                                </h3>
                                <div class="flex gap-2">
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->title) }}"
                                        target="_blank"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg font-medium bg-gray-50 text-gray-700 shadow-sm align-middle hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                        </svg>
                                        Share
                                    </a>

                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                        target="_blank"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-lg font-medium bg-gray-50 text-gray-700 shadow-sm align-middle hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                        Share
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Project Article -->

    <!-- Modal for projects without URL -->
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
                                I'm sorry, but this projects is currently not accessible. The project might be
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            HSOverlay.init();
        });
    </script>
@endsection
