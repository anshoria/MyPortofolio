@extends('layouts.app')

@section('title', 'Projects')
@section('content')
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">
            @foreach($projects as $project)
            <!-- Card -->
            <div class="group block rounded-xl overflow-hidden cursor-pointer focus:outline-none sm:hover:bg-gray-100 sm:dark:hover:bg-white/10 sm:dark:focus:bg-white/10"
                @if($project->url)
                    onclick="window.open('{{ $project->url }}', '_blank')"
                @else
                    data-hs-overlay="#project-modal-{{ $project->id }}"
                @endif
                data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
                    <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
                        <!-- Preload Skeleton -->
                        <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700" id="skeleton-{{ $project->id }}"></div>
                        
                        <img class="group-hover:scale-105 group-focus:scale-105 transition duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl opacity-0"
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}" 
                            loading="lazy"
                            onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $project->id }}').style.display = 'none';">
                            
                        @if($project->category)
                        <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                            {{ $project->category }}
                        </span>
                        @endif
                    </div>

                    <div class="grow">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                            {{ $project->title }}
                        </h3>
                        <p class="mt-3 text-gray-600 dark:text-neutral-400">
                            {{ $project->description }}
                        </p>
                        <p class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-blue-600 dark:text-neutral-200">
                            Visit website
                            <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Modal for projects without URL -->
            @if(is_null($project->url))
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
                                <span class="mb-6 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
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
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->

    <!-- Initialize Preline -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            HSOverlay.init();
        });
    </script>
@endsection