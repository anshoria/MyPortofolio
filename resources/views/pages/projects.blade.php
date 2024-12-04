@extends('layouts.app')

@section('title', 'Projects')
@section('content')
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">
            @foreach($projects as $project)
            <!-- Card -->
            <a href="{{ route('projects.show', $project) }}" 
               class="group block rounded-xl overflow-hidden focus:outline-none sm:hover:bg-gray-100 sm:dark:hover:bg-white/10 sm:dark:focus:bg-white/10"
               data-aos="fade-up" 
               data-aos-delay="100">
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
                            {{ Str::limit(strip_tags($project->description), 180) }}
                        </p>
                        <p class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-blue-600 dark:text-neutral-200">
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
    </div>
    <!-- End Card Blog -->
@endsection