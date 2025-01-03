@extends('layouts.app')

@push('meta-seo')
<meta name="description" content="{{ Str::limit(strip_tags($catalog->description), 150, '...baca selengkapnya') }}">
<meta name="keywords" content="artikel anshoria, article anshoria, {{ $blog->title }}">

{{-- meta social --}}
<meta property="og:title" content="{{ $catalog->title }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="anshoria">
<meta property="og:description" content="{{ Str::limit(strip_tags($catalog->description), 150, '...baca selengkapnya') }}">
<meta property="og:image" content="{{ asset('storage/' . ($catalog->catalog_img ?? $catalog->image)) }}">

@endpush

@section('title', $catalog->title)

@section('content')
    <!-- Blog Article Layout -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">

        @if (session('success'))
            <div id="sessionAlert"
                class="fixed top-4 right-4 z-[60] transition-all duration-300 ease-out transform translate-x-full opacity-0">
                <div class="bg-white border border-gray-100 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 w-80">
                    <!-- Header -->
                    <div class="flex items-center px-4 pt-4">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 flex items-center justify-center bg-green-100 rounded-full dark:bg-green-900">
                                <svg class="h-6 w-6 text-green-600 dark:text-green-300" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Success!</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Order submitted successfully!</p>
                        </div>
                        <button onclick="closeSessionAlert()" class="ml-auto">
                            <svg class="h-5 w-5 text-gray-400 hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="p-4">
                        <p class="text-sm text-gray-700 dark:text-gray-200">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Breadcrumb -->
        <nav class="py-4">
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <li class="text-sm">
                    <a class="flex items-center text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500"
                        href="{{ route('katalog') }}">
                        <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="mx-2">/</span>
                    </a>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200">
                    {{ $catalog->title }}
                </li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 lg:pb-8">
                <div class="space-y-8">
                    <!-- Header -->
                    <div>
                        <div class="space-y-3">
                            <h1 class="text-2xl font-bold md:text-3xl lg:text-4xl dark:text-white">
                                {{ $catalog->title }}
                            </h1>
                            <!-- Badges -->
                            <div class="flex flex-wrap gap-3">
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                                    {{ $catalog->category }}
                                </span>
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800/30 dark:text-gray-400">
                                    {{ $catalog->year }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image with Preloader -->
                    <div class="relative group">
                        <div class="aspect-video overflow-hidden rounded-xl">
                            <!-- Preloader Skeleton -->
                            <div class="absolute inset-0 bg-gray-100 animate-pulse dark:bg-gray-800"
                                id="skeleton-{{ $catalog->id }}"></div>
                            <!-- Image -->
                            <img class="w-full h-full object-cover rounded-xl opacity-0 transition duration-300"
                                src="{{ asset('storage/' . ($catalog->catalog_img ?? $catalog->image)) }}"
                                alt="{{ $catalog->title }}"
                                onload="this.classList.remove('opacity-0'); document.getElementById('skeleton-{{ $catalog->id }}').style.display='none';">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-3">
                        <h2 class="text-2xl font-bold dark:text-white">Deskripsi</h2>
                        <div class="prose max-w-none dark:prose-invert dark:text-gray-200">
                            {!! $catalog->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Sidebar -->
            <div class="lg:col-span-1 pb-8">
                <div class="lg:sticky lg:top-20 space-y-6">
                    <!-- Price Card -->
<div class="bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800" id="priceCard">
    <div class="p-4 md:p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                    {{ $catalog->category }}
                </span>
                @if($catalog->discount_percentage)
                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-rose-100 text-rose-800 dark:bg-rose-800/30 dark:text-rose-500">
                    Save {{ $catalog->discount_percentage }}%
                </span>
            </div>
            
            <div class="hs-tooltip">
                <div class="hs-tooltip-toggle">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    <span
                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                        role="tooltip">
                        Tidak termasuk biaya hosting dan domain
                    </span>
                </div>
            </div>
            @endif
        </div>

        <!-- Price Section -->
        <div class="mb-6">
            @if($catalog->discount_percentage)
                <div class="flex items-baseline gap-2">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Rp{{ number_format($catalog->final_price, 0, ',', '.') }}
                    </h3>
                    <span class="text-lg text-gray-500 line-through dark:text-gray-400">
                        Rp{{ number_format($catalog->price, 0, ',', '.') }}
                    </span>
                </div>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    *Limited time offer
                </p>
            @else
                <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                    Rp{{ number_format($catalog->price, 0, ',', '.') }}
                </h3>
            @endif
        </div>

        <!-- Features List -->
        <div class="space-y-3">
            <h4 class="text-sm font-medium text-gray-800 dark:text-gray-200">What's included:</h4>
            <ul class="space-y-2">
                <li class="flex items-center gap-x-2">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="text-gray-600 dark:text-gray-400">Free installation service</span>
                </li>
                <li class="flex items-center gap-x-2">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="text-gray-600 dark:text-gray-400">24/7 support</span>
                </li>
                <li class="flex items-center gap-x-2">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="text-gray-600 dark:text-gray-400">Source code</span>
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 grid gap-3">
            <!-- Order Form Toggle Button -->
            <button type="button" data-hs-overlay="#orderModal"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                    <path d="M3 6h18" />
                    <path d="M16 10a4 4 0 0 1-8 0" />
                </svg>
                Order Now
            </button>

            <!-- WhatsApp Contact -->
            <a href="https://wa.me/6281254402608" target="_blank"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
                Need Help?
            </a>
        </div>
    </div>
</div>

                    @if ($catalog->url)
                        <div
                            class="mt-6 bg-gradient-to-br from-gray-50 to-gray-100 border shadow-sm rounded-xl dark:from-gray-800/50 dark:to-gray-800 dark:border-gray-700">
                            <div class="p-4 md:p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Live Demo</h4>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                                        Preview
                                    </span>
                                </div>

                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    Try before you buy! Experience all features firsthand.
                                </p>

                                <a href="{{ $catalog->url }}" target="_blank"
                                    class="w-full inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none py-2.5 px-4 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-900">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Demo
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M7 17l9.2-9.2M17 17V8m0 0H8" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Fixed Order Button -->
    <div class="lg:hidden fixed bottom-3 right-3 z-[50] animate-bounce" id="mobile-order-button">
        <button onclick="scrollToPriceCard()"
            class="flex justify-center items-center w-10 h-10 rounded-full bg-blue-600 text-white shadow-lg hover:bg-blue-700 transition-colors duration-200">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                <path d="M3 6h18" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
        </button>
    </div>


    <!-- JavaScript for Toggle and Submit -->
    <script>
        document.addEventListener('scroll', function() {
            const priceCard = document.getElementById('priceCard');
            const tombol = document.getElementById('mobile-order-button');

            if (priceCard) {
                const rect = priceCard.getBoundingClientRect();
                const isVisible = rect.top >= 0 && rect.bottom <= window.innerHeight;

                if (isVisible) {
                    tombol.classList.add('hidden'); // Tambahkan class 'hidden' jika priceCard terlihat penuh
                } else {
                    tombol.classList.remove('hidden'); // Hapus class 'hidden' jika priceCard keluar dari viewport
                }
            }
        });


        function scrollToPriceCard() {
            const priceCard = document.getElementById('priceCard');
            const tombol = document.getElementById('mobile-order-button');
            if (priceCard) {
                priceCard.scrollIntoView({
                    behavior: 'smooth'
                });
            }
            tombol.classList.add('hidden');
        }
    </script>
@endsection

@section('modal')

    <!-- Order Modal -->
    <div id="orderModal"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto bg-black bg-opacity-40">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="relative flex flex-col w-full bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <!-- Header -->
                <div class="flex justify-between items-center py-4 px-6 border-b dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                        Order {{ $catalog->title }}
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#orderModal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 overflow-y-auto">
                    <form id="orderForm" class="grid gap-6">
                        <input type="hidden" name="template_id" value="{{ $catalog->id }}">

                        <!-- Form Grid -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">
                                    Full Name
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium mb-2 dark:text-white">
                                    Email
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium mb-2 dark:text-white">
                                    Phone Number
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    required>
                            </div>

                            <!-- Business Name -->
                            <div class="sm:col-span-2">
                                <label for="business_name" class="block text-sm font-medium mb-2 dark:text-white">
                                    Business Name
                                    <span class="text-xs text-gray-500">(Optional)</span>
                                </label>
                                <input type="text" id="business_name" name="business_name"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            </div>

                            <!-- Notes -->
                            <div class="sm:col-span-2">
                                <label for="notes" class="block text-sm font-medium mb-2 dark:text-white">Additional
                                    Notes</label>
                                <textarea id="notes" name="notes" rows="4"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-base focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Any specific requirements..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="flex justify-end items-center gap-x-2 py-4 px-6 border-t dark:border-gray-700">
                    <button type="button"
                        class="py-2.5 px-4 inline-flex items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#orderModal">
                        Cancel
                    </button>
                    <button type="button" id="submitButton"
                        onclick="submitDetailOrder({{ $catalog->id }}, '{{ $catalog->title }}')"
                        class="py-2.5 px-4 inline-flex items-center gap-2 rounded-lg border border-transparent font-semibold bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:ring-offset-gray-800">
                        <span class="flex items-center gap-2">
                            <!-- Default State -->
                            <span class="inline-flex items-center gap-2" id="submitDefaultState">
                                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Submit Order
                            </span>

                            <!-- Loading State -->
                            <span class="items-center gap-2 hidden" id="submitLoadingState">
                                <svg class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Processing...
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Show notification when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('sessionAlert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('slide-in');
                    alert.classList.remove('translate-x-full', 'opacity-0');
                }, 100);

                // Auto hide after 5 seconds
                setTimeout(() => {
                    closeSessionAlert();
                }, 5000);
            }
        });

        function closeSessionAlert() {
            const alert = document.getElementById('sessionAlert');
            if (alert) {
                alert.classList.add('slide-out');
                alert.classList.remove('slide-in');

                // Remove element after animation
                setTimeout(() => {
                    alert.remove();
                }, 1000);
            }
        }

        async function submitDetailOrder(templateId, templateName) {
            const form = document.getElementById('orderForm');
            const formData = new FormData(form);

            // Validate required fields
            const required = ['name', 'email', 'phone'];
            let isValid = true;
            required.forEach(field => {
                const value = formData.get(field);
                const input = document.getElementById(field);

                if (!value) {
                    isValid = false;
                    input.classList.add('border-red-500');
                    input.classList.add('focus:border-red-500');
                    input.classList.add('focus:ring-red-500');
                } else {
                    input.classList.remove('border-red-500');
                    input.classList.remove('focus:border-red-500');
                    input.classList.remove('focus:ring-red-500');
                }
            });

            if (!isValid) {
                const errorAlert = document.createElement('div');
                errorAlert.innerHTML = `
            <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-[60]">
                <div class="bg-white border border-red-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex p-4 gap-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700 dark:text-gray-200">
                                Please fill in all required fields.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        `;
                document.body.appendChild(errorAlert);
                setTimeout(() => errorAlert.remove(), 3000);
                return;
            }

            try {
                // Show loading state
                submitButton.disabled = true;
                submitDefaultState.classList.add('hidden');
                submitLoadingState.classList.remove('hidden');
                submitLoadingState.classList.add('inline-flex');

                const response = await fetch('/order', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        template_id: templateId,
                        template_name: templateName,
                        name: formData.get('name'),
                        email: formData.get('email'),
                        phone: formData.get('phone'),
                        business_name: formData.get('business_name') || 'Not provided',
                        notes: formData.get('notes') || 'No additional notes'
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    // Close modal
                    HSOverlay.close(document.getElementById('orderModal'));

                    // Reset form
                    form.reset();

                    // Reload page to show success message
                    window.location.reload();
                } else {
                    throw new Error(data.message || 'Something went wrong');
                }
            } catch (error) {
                console.error('Order error:', error);
                const errorAlert = document.createElement('div');
                errorAlert.innerHTML = `
            <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-[60]">
                <div class="bg-white border border-red-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex p-4 gap-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700 dark:text-gray-200">
                                ${error.message}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        `;
                document.body.appendChild(errorAlert);
                setTimeout(() => errorAlert.remove(), 3000);
            }
        }
    </script>
@endsection
