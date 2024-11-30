@php
    $settings = \App\Models\GeneralSettings::first();
@endphp

@extends('layouts.app')

@section('title', 'Contact')
@section('content')
    <!-- Contact Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl lg:max-w-5xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                    Let's Connect!
                </h1>
                <p class="mt-1 text-gray-600 dark:text-neutral-400">
                    Have a project in mind? I'm always excited to collaborate on new ideas and opportunities.
                </p>
            </div>

            <div class="mt-12 grid items-center lg:grid-cols-2 gap-6 lg:gap-16">
                <!-- Form Card -->
                <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700" data-aos="fade-right">
                    <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                        Share Your Vision With Me
                    </h2>

                    <form action="https://formspree.io/f/mwpkrqrq" method="POST">
                        <div class="grid gap-4">
                            <div>
                                <label for="hs-name-contacts-1" class="sr-only">Name</label>
                                <input type="text" name="hs-name-contacts-1" id="hs-name-contacts-1" required
                                    class="py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="What's your name?">
                            </div>
                            <div>
                                <label for="hs-email-contacts-1" class="sr-only">Email</label>
                                <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1" required
                                    autocomplete="email"
                                    class="py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="your.email@example.com">
                            </div>

                            <div>
                                <label for="hs-phone-number-1" class="sr-only">Phone Number</label>
                                <input type="text" name="hs-phone-number-1" id="hs-phone-number-1"
                                    class="py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Your phone number (optional)">
                            </div>

                            <div>
                                <label for="hs-about-contacts-1" class="sr-only">Message</label>
                                <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4" required
                                    class="py-3 px-4 block w-full border rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Tell me about your project..."></textarea>
                            </div>
                        </div>

                        <div class="mt-4 grid">
                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 3 3 9-3 9 19-9Z" />
                                    <path d="M6 12h16" />
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Form Card -->

                {{-- Contact Information --}}
<div class="divide-y divide-gray-200 dark:divide-neutral-800" data-aos="fade-left">
    <!-- Phone Block -->
    <div class="flex gap-x-7 py-6">
        <div class="flex size-12 rounded-lg bg-gray-100 text-blue-600 dark:bg-neutral-800 dark:text-blue-500 items-center justify-center">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
        </div>
        <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Let's Talk</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Call me directly for quick inquiries or urgent matters.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300" href="tel:{{ $contact->hp }}">
                {{ $contact->hp }}
            </a>
        </div>
    </div>

    <!-- Location Block -->
    <div class="flex gap-x-7 py-6">
        <div class="flex size-12 rounded-lg bg-gray-100 text-blue-600 dark:bg-neutral-800 dark:text-blue-500 items-center justify-center">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
        </div>
        <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Location</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Based in {{ $contact->location }}</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Available for remote work worldwide</p>
        </div>
    </div>

    <!-- WhatsApp Block -->
    <div class="flex gap-x-7 py-6">
        <div class="flex size-12 rounded-lg bg-gray-100 text-blue-600 dark:bg-neutral-800 dark:text-blue-500 items-center justify-center">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 21l1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"/>
            </svg>
        </div>
        <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">WhatsApp Me</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Prefer chat? I'm just a message away.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-green-600 hover:text-green-800 dark:text-green-500 dark:hover:text-green-400" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp) }}" target="_blank">
                Message on WhatsApp
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 7h10v10"/>
                    <path d="M7 17 17 7"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Email Block -->
    <div class="flex gap-x-7 py-6">
        <div class="flex size-12 rounded-lg bg-gray-100 text-blue-600 dark:bg-neutral-800 dark:text-blue-500 items-center justify-center">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"/>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
        </div>
        <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Email Me</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">For detailed inquiries and professional correspondence</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300" href="mailto:{{ $contact->email }}">
                {{ $contact->email }}
            </a>
        </div>
    </div>
</div>
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
                        Ready to Create Something Extraordinary?
                    </h2>
                    <p class="mt-3 text-gray-300">
                        Let's collaborate and turn your vision into reality. Your next amazing project starts with a
                        conversation.
                    </p>
                    <div class="mt-8 flex justify-center gap-4">
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ asset('storage/' . $settings->cv) }}" target="_blank">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" x2="12" y1="15" y2="3" />
                            </svg>
                            Download Resume
                        </a>
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-white text-white hover:bg-white hover:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('projects') }}">
                            View Portfolio
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CTA Section -->

    <!-- Social Media Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 mx-auto" data-aos="zoom-in">
        <div class="max-w-2xl mx-auto text-center mb-10">
            <h2 class="text-2xl font-bold md:text-3xl text-gray-800 dark:text-white">
                Connect With Me
            </h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">
                Follow me on social media to stay updated with my latest projects and insights
            </p>
        </div>

        <div class="flex justify-center gap-6">
            @if ($settings->github)
                <!-- GitHub -->
                <a href="{{ $settings->github }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
                        <path d="M9 18c-4.51 2-5-2-7-2" />
                    </svg>
                </a>
            @endif

            @if ($settings->linkedin)
                <!-- LinkedIn -->
                <a href="{{ $settings->linkedin }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                        <rect width="4" height="12" x="2" y="9" />
                        <circle cx="4" cy="4" r="2" />
                    </svg>
                </a>
            @endif

            @if ($settings->x)
                <!-- X (Twitter) -->
                <a href="{{ $settings->x }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4l11.733 16h4.267l-11.733-16zM4 20l6.768-6.768M20 4l-6.768 6.768"></path>
                    </svg>
                </a>
            @endif

            @if ($settings->instagram)
                <!-- Instagram -->
                <a href="{{ $settings->instagram }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                    </svg>
                </a>
            @endif

            @if ($settings->tiktok)
                <!-- TikTok -->
                <a href="{{ $settings->tiktok }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" />
                    </svg>
                </a>
            @endif

            @if ($settings->youtube)
                <!-- YouTube -->
                <a href="{{ $settings->youtube }}" target="_blank"
                    class="size-16 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" />
                    </svg>
                </a>
            @endif
        </div>
    </div>
    <!-- End Social Media Section -->
@endsection
