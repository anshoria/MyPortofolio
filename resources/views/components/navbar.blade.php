@php
    $settings = \App\Models\GeneralSettings::first();
@endphp
<!-- Navbar -->
<header
    class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white text-sm py-4 border-b border-gray-200 dark:border-[#272442] dark:bg-[#171527] transition-colors duration-200">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center justify-between">
            <a class="flex-none group w-24 h-0 flex justify-center items-center" href="{{ route('home') }}">
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="logo" loading="lazy">
            </a>
            <div class="sm:hidden flex justify-center items-center gap-x-2">
                <a class="group sm:hidden inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-r from-violet-600 to-blue-600 hover:from-violet-700 hover:to-blue-700 hover:shadow-lg border border-transparent text-white text-sm font-medium rounded-full py-2 px-4 dark:focus:ring-offset-gray-800"
                    href="/contact">
                    Hire Me!
                </a>
                <!-- Di bagian button navbar -->
                <button id="darkModeToggle2"
                    class="flex sm:hidden items-center justify-center w-10 h-10 rounded-lg transition-colors hover:bg-gray-100 dark:hover:bg-gray-800 mx-auto sm:mx-0">
                    <!-- Sun Icon (Light Mode) -->
                    <svg class="hidden dark:block w-5 h-5 text-gray-400 hover:text-gray-200"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (Dark Mode) -->
                    <svg class="block dark:hidden w-5 h-5 text-gray-600 hover:text-gray-800"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                <button type="button"
                    class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                    data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="navbar-collapse-with-animation"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-medium relative hover:text-blue-500 dark:hover:text-blue-500 {{ request()->routeIs('home') ? 'text-blue-500 sm:after:absolute sm:after:w-full sm:after:h-0.5 sm:after:bg-blue-500 sm:after:bottom-0 sm:after:left-0' : 'text-gray-600' }} text-center sm:text-left py-2" 
                    href="{{ route('home') }}"
                    aria-current="page">Home</a>
                 
                 <a class="font-medium relative hover:text-blue-500 dark:hover:text-blue-500 {{ request()->routeIs('about') ? 'text-blue-500 sm:after:absolute sm:after:w-full sm:after:h-0.5 sm:after:bg-blue-500 sm:after:bottom-0 sm:after:left-0' : 'text-gray-600' }} text-center sm:text-left py-2"
                    href="{{ route('about') }}">About</a>
                 
                 <a class="font-medium relative hover:text-blue-500 dark:hover:text-blue-500 {{ request()->routeIs('projects') ? 'text-blue-500 sm:after:absolute sm:after:w-full sm:after:h-0.5 sm:after:bg-blue-500 sm:after:bottom-0 sm:after:left-0' : 'text-gray-600' }} text-center sm:text-left py-2"
                    href="{{ route('projects') }}">Projects</a>
                 
                 <a class="font-medium relative hover:text-blue-500 dark:hover:text-blue-500 {{ request()->routeIs('blog.index') ? 'text-blue-500 sm:after:absolute sm:after:w-full sm:after:h-0.5 sm:after:bg-blue-500 sm:after:bottom-0 sm:after:left-0' : 'text-gray-600' }} text-center sm:text-left py-2"
                    href="{{ route('blog.index') }}">Blog</a>
                 
                 <a class="font-medium relative hover:text-blue-500 dark:hover:text-blue-500 {{ request()->routeIs('contact') ? 'text-blue-500 sm:after:absolute sm:after:w-full sm:after:h-0.5 sm:after:bg-blue-500 sm:after:bottom-0 sm:after:left-0' : 'text-gray-600' }} text-center sm:text-left py-2"
                    href="{{ route('contact') }}">Contact</a>

                <a class="group hidden sm:inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-r from-violet-600 to-blue-600 hover:from-violet-700 hover:to-blue-700 hover:shadow-lg border border-transparent text-white text-sm font-medium rounded-full py-2 px-4 dark:focus:ring-offset-gray-800"
                    href="{{ route('contact') }}">
                    Hire Me!
                </a>
                
                <!-- Di bagian button navbar -->
                <button id="darkModeToggle"
                    class="hidden sm:flex items-center justify-center w-10 h-10 rounded-lg transition-colors hover:bg-gray-100 dark:hover:bg-gray-800 mx-auto sm:mx-0">
                    <!-- Sun Icon (Light Mode) -->
                    <svg class="hidden dark:block w-5 h-5 text-gray-400 hover:text-gray-200"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (Dark Mode) -->
                    <svg class="block dark:hidden w-5 h-5 text-gray-600 hover:text-gray-800"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
