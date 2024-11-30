@extends('layouts.app')

@section('title', 'Article')
@section('content')
    <!-- Blog Article -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                        <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                            href="{{ route('blog.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                            Back to Blog
                        </a>

                        <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">{{ $blog->title }}</h2>

                        <div class="flex items-center gap-x-5">
                            <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                href="#">
                                {{ $blog->category }}
                            </a>
                            <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200">
                                {{ $blog->published->format('F d, Y') }}
                            </p>
                        </div>

                        <div class="prose max-w-none dark:prose-invert dark:text-gray-300">
                            {!! $blog->content !!}
                        </div>

                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                            <div class="flex justify-end items-center gap-x-1.5">
                                <!-- Like Button -->
                                <button type="button" onclick="likeBlog({{ $blog->id }})"
                                    class="hs-tooltip-toggle flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                                    <svg class="size-4 transition-transform duration-300 hover:scale-110"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                    </svg>
                                    <span id="likes-count">{{ $blog->likes }}</span>
                                </button>

                                <!-- Comments Button -->
                                <button type="button" data-hs-overlay="#comment-modal"
                                    class="inline-flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z" />
                                    </svg>
                                    {{ $blog->comments->count() }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div
                class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                <div class="sticky top-0 start-0 py-8 lg:ps-8">
                    <!-- Author Info -->
                    <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700">
                        <a class="block shrink-0 focus:outline-none" href="#">
                            <img class="size-10 rounded-full"
                                src="https://api.dicebear.com/9.x/initials/svg?seed={{ $blog->author }}" alt="Avatar">
                        </a>

                        <div class="grow">
                            <h5 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                {{ $blog->author }}
                            </h5>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                {{ $blog->job }}
                            </p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @foreach ($blogs as $latestblog)
                            <!-- Media -->
                            <a class="group flex items-center gap-x-6 focus:outline-none"
                                href="{{ route('blog.show', $latestblog) }}">
                                <div class="grow">
                                    <span
                                        class="text-sm font-bold text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600 dark:text-neutral-200 dark:group-hover:text-blue-500 dark:group-focus:text-blue-500">
                                        {{ $latestblog->title }}
                                    </span>
                                </div>

                                <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                    <!-- Preload Skeleton -->
                                    <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700" 
                                        id="skeleton-latest-{{ $latestblog->id }}"></div>
                                    
                                    <img class="size-full absolute top-0 start-0 object-cover rounded-lg opacity-0 transition-opacity duration-300"
                                        src="{{ asset('storage/' . $latestblog->cover_img) }}" 
                                        alt="Blog Image"
                                        loading="lazy"
                                        onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-latest-{{ $latestblog->id }}').style.display = 'none';">
                                </div>
                            </a>
                            <!-- End Media -->
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('components.comments-modal', ['blog' => $blog])

    <script>
        let cooldownTimer;
        const cooldownDuration = 5000; // Cooldown duration in milliseconds (5 seconds)

        function likeBlog(blogId) {
            const likeButton = document.querySelector(`button[onclick="likeBlog(${blogId})"]`);
            const likeIcon = likeButton.querySelector('svg');

            // Check if the button is in cooldown state
            if (likeButton.classList.contains('cooldown')) {
                // Display error message for spam likes
                alert('Dont spam like!');
                return;
            } else {
                // Toggle fill effect
                if (likeIcon.getAttribute('fill') === 'none') {
                    likeIcon.setAttribute('fill', 'currentColor');
                    likeButton.classList.add('text-blue-600');
                } else {
                    likeIcon.setAttribute('fill', 'none');
                    likeButton.classList.remove('text-blue-600');
                }

                // Add cooldown class to the button
                likeButton.classList.add('cooldown');

                // Make the fetch request
                fetch(`/blog/${blogId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('likes-count').textContent = data.likes;
                    });


            }
            // Set a cooldown timer
            cooldownTimer = setTimeout(() => {
                likeButton.classList.remove('cooldown');
            }, cooldownDuration);

        }
    </script>
@endsection
