    @extends('layouts.app')

    @section('title', 'Katalog')

    @section('content')
        <!-- Cards Section -->
        <div class="max-w-[85rem] min-h-[calc(100vh-180px)] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            @if ($catalogs->isEmpty())
                <!-- Empty State -->
                <div class="text-center mt-40 sm:mt-52 xl:mt-64" data-aos="fade-up">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">No templates available yet</h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">I'm currently working on it.
                        Check back soon!</p>
                </div>
            @else
                <!-- Title -->
                <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Website Templates</h2>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Butuh website dinamis yang bisa diupdate kapan saja?
                        Dapatkan template website profesional yang mudah dikelola. Cocok untuk mengembangkan bisnis Anda ke
                        dunia digital! 🚀</p>
                </div>
                <!-- End Title -->
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($catalogs as $catalog)
                        <!-- Card -->
                        <div
                            class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md transition-all duration-300 dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div
                                class="h-52 flex flex-col justify-center items-center rounded-t-xl">
                                <div class="relative w-full h-full overflow-hidden rounded-t-xl">
                                    <!-- Preload Skeleton -->
                                    <div class="absolute inset-0 animate-pulse bg-gray-200 dark:bg-gray-700"
                                        id="skeleton-{{ $catalog->id }}"></div>

                                    <!-- Image -->
                                    <img class="w-full h-full object-cover opacity-0 transition-opacity duration-300"
                                        src="{{ asset('storage/' . ($catalog->catalog_img ?? $catalog->image)) }}"
                                        alt="{{ $catalog->title }}" loading="lazy"
                                        onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $catalog->id }}').style.display = 'none';">
                                </div>
                            </div>

                            <div class="p-4 md:p-6 flex-grow">
                                <div class="flex justify-between items-center mb-3">
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                                        {{ $catalog->category }}
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800/30 dark:text-gray-400">
                                        {{ $catalog->year }}
                                    </span>
                                </div>
                                <h3
                                    class="text-xl font-semibold text-gray-800 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-500 transition-colors">
                                    {{ $catalog->title }}
                                </h3>
                                <p class="mt-3 text-gray-600 dark:text-gray-400">
                                    {!! Str::limit(strip_tags($catalog->description), 120) !!}
                                </p>
                            </div>

                            <div
                                class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                                @if ($catalog->url)
                                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-bl-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 transition-colors dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800"
                                        href="{{ $catalog->url }}" target="_blank">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View Demo
                                    </a>
                                @endif
                                <a href="{{ route('catalogs.show', $catalog) }}"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-br-xl bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <!-- End Card -->
                    @endforeach
                </div>
                <!-- End Grid -->

                <!-- Pagination -->
                @if ($catalogs->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $catalogs->links() }}
                    </div>
                @endif
                <!-- End Pagination -->
            @endif
        </div>
        <!-- End Cards Section -->
    @endsection
