<!-- Add this modal HTML before closing body tag -->
<div id="welcome-modal" class="fixed hidden inset-0 z-50">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-80 transition-opacity backdrop-blur-sm"></div>
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div data-aos="zoom-in"
                class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-gray-800 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100 dark:border-gray-700">
                <!-- Modal content -->
                <div class="relative overflow-hidden p-8">
                    <!-- Enhanced Icon with Animation -->
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            <!-- Subtle glow effect -->
                            <div class="absolute inset-0 bg-blue-500/20 dark:bg-blue-600/20 rounded-full opacity-70">
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                                <div class="p-4 bg-blue-200 dark:bg-blue-900/50 rounded-full relative">
                                    <!-- Font Awesome Waving Hand Icon -->
                                    <i class="fa-solid fa-hand text-blue-600 dark:text-blue-400 text-7xl rotate-45"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Thanks for visiting!
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            You've been here for a while. Would you like to play a game?<br>
                            <span class="text-blue-600 dark:text-blue-400 font-medium">Bet you can't type faster than me! 😎🚀</span>
                        </p>
                        <!-- Buttons -->
                        <div class="space-y-3 pt-4">
                            <button onclick="startTypingTest()"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-xl border border-transparent bg-gradient-to-r from-violet-600 to-blue-600 hover:from-violet-700 hover:to-blue-700 text-white transition-all duration-200 shadow-sm hover:shadow-md group">
                                Challenge Accepted!
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="m12 5 7 7-7 7" />
                                </svg>
                            </button>
                            <button onclick="dismissModal()"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-xl bg-gray-50 text-gray-500 hover:bg-gray-100 hover:text-gray-600 transition-all duration-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                Maybe Next Time
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script remains the same -->
<script>
    function shouldShowModal() {
        return !localStorage.getItem('modalDismissed');
    }

    function showModal() {
        if (shouldShowModal()) {
            const modal = document.getElementById('welcome-modal');
            modal.classList.remove('hidden');
        }
    }

    function dismissModal() {
        const modal = document.getElementById('welcome-modal');
        modal.classList.add('hidden');
        localStorage.setItem('modalDismissed', 'true');
    }

    function startTypingTest() {
        const modal = document.getElementById('welcome-modal');
        modal.classList.add('hidden');
        localStorage.setItem('modalDismissed', 'true');
        // Add your typing test logic here
        window.location.href = '/typing-test';
    }

    setTimeout(() => {
        if (shouldShowModal()) {
            showModal();
        }
    }, 10000);

    function resetModalState() {
        localStorage.removeItem('modalDismissed');
    }
</script>