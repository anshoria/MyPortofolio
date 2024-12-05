@extends('layouts.app')

@section('title', 'Blog')
@section('content')
    <!-- Card Blog -->
    <div class="min-h-[calc(100vh-185px)] max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        @if ($blogs->isEmpty())
            <!-- Empty State -->
            <div class="text-center mt-40 sm:mt-52 xl:mt-64" data-aos="fade-up">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">No stories yet</h3>
                <p class="mt-2 text-gray-600 dark:text-neutral-400">Stay tuned! Stories will be coming soon.</p>
            </div>
        @else
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Random stories</h2>
                <p class="mt-1 text-gray-600 dark:text-neutral-400">Just a bunch of cool stories i think you'll enjoy. No
                    theme, no rules - just good reads!</p>
            </div>
            <!-- End Title -->
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
                @foreach ($blogs as $blog)
                    <!-- Card -->
                    <a class="group hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-xl p-5 transition dark:hover:bg-white/10 dark:focus:bg-white/10"
                        href="{{ route('blog.show', $blog) }}">
                        <div class="aspect-w-16 aspect-h-10 relative">
                            <!-- Preload Skeleton -->
                            <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700 rounded-xl"
                                id="skeleton-blog-{{ $blog->id }}"></div>

                            <img class="w-full object-cover rounded-xl opacity-0 transition-opacity duration-300"
                                src="{{ asset('storage/' . $blog->cover_img) }}" alt="Blog Image" loading="lazy"
                                onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-blog-{{ $blog->id }}').style.display = 'none';">
                        </div>
                        <h3 class="mt-5 text-xl text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                            {{ $blog->title }}
                        </h3>
                        <p
                            class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                            Read more
                            <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </p>
                    </a>
                    <!-- End Card -->
                @endforeach
            </div>
            <!-- End Grid -->

            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
    <!-- End Card Blog -->
@endsection
