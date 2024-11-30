@extends('layouts.app')

@section('title', 'Typing Test')
@section('content')
    <div class="min-h-[calc(100vh-180px)] px-4 py-6 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <!-- Main Card -->
        <div class="max-w-4xl mx-auto">
            <!-- Language Selector -->
            <div
                class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-800 dark:border-gray-700 mb-4 sm:mb-6">
                <div class="p-3 sm:p-4">
                    <div class="flex justify-center gap-2">
                        <button onclick="changeLanguage('en')" id="en-btn"
                            class="py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <span class="hidden sm:inline">English</span>
                            <span class="sm:hidden">EN</span>
                        </button>
                        <button onclick="changeLanguage('id')" id="id-btn"
                            class="py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <span class="hidden sm:inline">Indonesia</span>
                            <span class="sm:hidden">ID</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Test Area -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-800 dark:border-gray-700">
                <div class="p-3 sm:p-4 md:p-5">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">
                            ⌨️ Speed Typing Test
                        </h2>
                        <div class="inline-flex gap-x-2">
                            <button id="start-btn"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                <span class="hidden sm:inline">Start Test</span>
                                <span class="sm:hidden">Start</span>
                            </button>
                            <button id="reset-btn"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.7 2.8"></path>
                                    <path d="M21 3v9h-9"></path>
                                </svg>
                                <span class="hidden sm:inline">Reset</span>
                            </button>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">
                        <!-- Timer Card -->
                        <div
                            class="bg-gray-50 border border-gray-200 rounded-xl p-3 sm:p-4 dark:bg-slate-900 dark:border-gray-700">
                            <div class="flex items-center gap-x-2">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <div>
                                    <p class="text-xs uppercase tracking-wide text-gray-500">Time Left</p>
                                    <h3 id="timer" class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">
                                        60</h3>
                                </div>
                            </div>
                        </div>

                        <!-- WPM Card -->
                        <div
                            class="bg-gray-50 border border-gray-200 rounded-xl p-3 sm:p-4 dark:bg-slate-900 dark:border-gray-700">
                            <div class="flex items-center gap-x-2">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 20V10"></path>
                                    <path d="M18 20V4"></path>
                                    <path d="M6 20v-4"></path>
                                </svg>
                                <div>
                                    <p class="text-xs uppercase tracking-wide text-gray-500">WPM</p>
                                    <h3 id="wpm" class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">0
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!-- Accuracy Card -->
                        <div
                            class="bg-gray-50 border border-gray-200 rounded-xl p-3 sm:p-4 dark:bg-slate-900 dark:border-gray-700">
                            <div class="flex items-center gap-x-2">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div>
                                    <p class="text-xs uppercase tracking-wide text-gray-500">Accuracy</p>
                                    <h3 id="accuracy" class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">
                                        0%</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Display -->
                    <div class="mb-4 sm:mb-6">
                        <div class="p-3 sm:p-4 bg-gray-50 border border-gray-200 rounded-xl dark:bg-slate-900 dark:border-gray-700 select-none"
                            onpaste="return false" oncut="return false" oncopy="return false">
                            <p id="text-display"
                                class="text-base sm:text-lg text-gray-800 dark:text-gray-200 leading-relaxed">
                            </p>
                        </div>
                    </div>

                    <!-- Input Area -->
                    <div class="mb-4 sm:mb-6">
                        <textarea id="input-area"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            rows="3" placeholder="Start typing here..." disabled></textarea>
                    </div>
                </div>
            </div>

            <!-- Leaderboard -->
            <div
                class="mt-4 sm:mt-6 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-800 dark:border-gray-700">
                <div class="p-3 sm:p-4 md:p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">
                            🏆 Top Scores
                        </h3>
                    </div>
                    <div id="leaderboard" class="space-y-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this enhanced modal HTML structure before the script tag -->
    <div id="score-modal" class="hidden">
        <!-- Background overlay with blur -->
        <div class="bg-gray-900/50 dark:bg-gray-800/50 fixed inset-0 z-[60] backdrop-blur-sm transition-all"></div>

        <!-- Modal -->
        <div
            class="fixed top-0 left-0 right-0 z-[70] w-full h-full overflow-x-hidden overflow-y-auto flex items-center justify-center">
            <div class="max-w-md w-full transform transition-all opacity-100 scale-100">
                <!-- Card -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-slate-900 dark:border-gray-700">
                    <!-- Celebration Header -->
                    <div class="relative h-32 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-t-xl overflow-hidden">
                        <div class="absolute inset-0">
                            <div class="celebration-confetti"></div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <span class="text-4xl animate-bounce inline-block">🎉</span>
                                <h3 class="mt-2 text-xl font-bold text-white">Top Score!</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="p-4 sm:p-7">
                        <div class="text-center mb-8">
                            <div class="flex justify-center mb-3">
                                <span
                                    class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500 dark:bg-blue-700 dark:border-blue-600 dark:text-blue-100">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                Congratulations!
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400" id="score-details">
                                You've made it to the top 5 with an amazing score!
                            </p>
                        </div>

                        <!-- Score Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-6 px-4">
                            <div class="text-center">
                                <span class="text-3xl font-bold text-gray-800 dark:text-white" id="modal-wpm">0</span>
                                <p class="text-sm text-gray-600 dark:text-gray-400">WPM</p>
                            </div>
                            <div class="text-center">
                                <span class="text-3xl font-bold text-gray-800 dark:text-white"
                                    id="modal-accuracy">0%</span>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Accuracy</p>
                            </div>
                        </div>

                        <!-- Name Input -->
                        <div class="relative mb-6">
                            <input type="text" id="player-name"
                                class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2"
                                placeholder="John Doe">
                            <label for="player-name"
                                class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-1.5 peer-[:not(:placeholder-shown)]:text-gray-500">Enter
                                your name</label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" id="skip-save"
                                class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-gray-300 hover:text-gray-600 hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all dark:border-gray-700 dark:text-gray-400 dark:hover:border-gray-600 dark:hover:text-gray-300 dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800">
                                Skip
                            </button>
                            <button type="button" id="save-score"
                                class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition-all dark:focus:ring-offset-gray-800">
                                Save Score
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tambahkan array quotes bahasa Indonesia
        const indonesianQuotes = [
            "Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia. - Nelson Mandela",
            "Belajar tanpa berpikir itu tidaklah berguna, tapi berpikir tanpa belajar itu sangatlah berbahaya. - Soekarno",
            "Jangan pernah menyerah sebelum mencoba, karena kita tidak akan pernah tahu hasilnya sebelum mencobanya. - BJ Habibie",
            "Hidup ini seperti sepeda. Agar tetap seimbang, kamu harus terus bergerak. - Albert Einstein",
            "Kesuksesan tidak datang dari apa yang diberikan oleh orang lain, tapi datang dari keyakinan dan kerja keras kita sendiri. - Ki Hajar Dewantara",
            "Berangkat dengan penuh keyakinan, berjalan dengan penuh keikhlasan, istiqomah dalam menghadapi cobaan. - KH. Ahmad Dahlan",
            "Jangan mengaku kalah sebelum mencoba, jangan mengaku gagal sebelum berperang. - Kartini",
            "Ilmu itu bukan yang dihafal, tetapi yang memberi manfaat. - Imam Syafi'i",
            "Orang boleh pandai setinggi langit, tapi selama ia tidak menulis, ia akan hilang di dalam masyarakat. - Pramoedya Ananta Toer",
            "Bermimpilah setinggi langit. Jika engkau jatuh, engkau akan jatuh di antara bintang-bintang. - Soekarno"
        ];

        // Inisialisasi variabel global
        let currentLanguage = 'en';
        let currentText = '';
        let timer;
        let timeleft = 60;
        let isTestActive = false;
        let startTime;
        let errors = 0;
        let totalChars = 0;
        let scores = [];

        // Function to fetch scores from database
        async function fetchScores() {
            try {
                const response = await fetch(`/api/typing-scores?language=${currentLanguage}`);
                const data = await response.json();
                scores = data;
                updateLeaderboard();
            } catch (error) {
                console.error('Error fetching scores:', error);
            }
        }

        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Fungsi untuk menyimpan skor yang diperbarui
        async function saveScore(scoreData) {
            try {
                // Hitung avg_score sebelum mengirim ke server
                const avg_score = Math.round((scoreData.wpm * 0.3 + scoreData.accuracy * 0.7));
                const dataToSend = {
                    ...scoreData,
                    avg_score
                };

                const response = await fetch('/api/typing-scores', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(dataToSend)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to save score');
                }

                const data = await response.json();
                await fetchScores(); // Refresh scores after saving
                return data;
            } catch (error) {
                console.error('Error saving score:', error);
                throw error;
            }
        }
        // Mengambil elemen DOM
        const textDisplay = document.getElementById('text-display');
        const inputArea = document.getElementById('input-area');
        const startBtn = document.getElementById('start-btn');
        const resetBtn = document.getElementById('reset-btn');
        const timerDisplay = document.getElementById('timer');
        const wpmDisplay = document.getElementById('wpm');
        const accuracyDisplay = document.getElementById('accuracy');
        const leaderboard = document.getElementById('leaderboard');
        const scoreModal = document.getElementById('score-modal');
        const playerNameInput = document.getElementById('player-name');
        const saveScoreBtn = document.getElementById('save-score');
        const skipSaveBtn = document.getElementById('skip-save');

        // Inisialisasi cache quotes kosong
        let quotesCache = {
            en: [],
            id: []
        };

        // Function to check if score is in top 5
        function isTopScore(newScore) {
            const langScores = scores.filter(score => score.language === currentLanguage);
            if (langScores.length < 5) return true;

            const newAvgScore = Math.round((newScore.wpm * 0.3 + newScore.accuracy * 0.7));
            const lowestTopScore = langScores
                .map(score => score.avg_score)
                .sort((a, b) => b - a)[4];

            return newAvgScore > lowestTopScore;
        }

        function updateLeaderboard() {
            const langScores = scores.filter(score => score.language === currentLanguage);

            // Sort menggunakan avg_score
            langScores.sort((a, b) => {
                if (b.avg_score !== a.avg_score) {
                    return b.avg_score - a.avg_score;
                }
                if (b.wpm !== a.wpm) {
                    return b.wpm - a.wpm;
                }
                if (b.accuracy !== a.accuracy) {
                    return b.accuracy - a.accuracy;
                }
                if (b.timeleft !== a.timeleft) {
                    return b.timeleft - a.timeleft;
                }
                return new Date(b.created_at) - new Date(a.created_at);
            });

            // Update leaderboard display
            leaderboard.innerHTML = langScores.slice(0, 5).map((score, index) => {
                const medals = ['🥇', '🥈', '🥉', '4️⃣', '5️⃣'];
                const displayName = score.name || 'Anonymous';
                const timeleftDisplay = score.timeleft !== undefined ? `${score.timeleft}s left` : '-';

                return `
    <div class="flex gap-x-2 sm:gap-x-3 bg-gray-50 border border-gray-200 rounded-xl p-2 sm:p-4 dark:bg-slate-900 dark:border-gray-700">
        <div class="text-lg sm:text-2xl">${medals[index]}</div>
        <div class="grow min-w-0"> <!-- Tambahkan min-w-0 untuk menangani overflow -->
            <div class="flex flex-col gap-2">
                <!-- Nama dan WPM -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 sm:gap-2">
                    <div class="flex items-center gap-2 min-w-0"> <!-- Container untuk nama dan WPM -->
                        <p class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-gray-200 truncate">
                            ${displayName} - ${score.wpm} WPM
                        </p>
                    </div>
                    <!-- Time left badge -->
                    <div class="self-start"> <!-- Container untuk membatasi lebar badge -->
    <span class="inline-flex items-center gap-1 py-0.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 whitespace-nowrap">
        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <polyline points="12 6 12 12 16 14"/>
        </svg>
        ${timeleftDisplay}
    </span>
</div>
                </div>
                
                <!-- Avg Score dan Accuracy -->
                <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm">
                    <span class="text-gray-600 dark:text-gray-400">
                        Avg Score: ${score.avg_score}
                    </span>
                    <span class="inline-flex items-center py-1 px-2 rounded-full font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-300">
                        Accuracy: ${score.accuracy}%
                    </span>
                </div>
            </div>
        </div>
    </div>
    `;
            }).join('');
        }


        // Fungsi untuk mengambil quotes dari API Quotable
        async function fetchQuotes(language) {
            try {
                // Jika bahasa Indonesia, langsung kembalikan quotes statis
                if (language === 'id') {
                    return indonesianQuotes;
                }

                const params = new URLSearchParams({
                    limit: '10',
                    minLength: '100',
                    maxLength: '100',
                    tags: 'famous-quotes,technology,wisdom'
                });

                const apiUrl = `https://api.quotable.io/quotes/random?${params}`;
                const response = await fetch(apiUrl);

                if (!response.ok) {
                    throw new Error('Failed to fetch quotes');
                }

                const data = await response.json();
                return data.map(quote => `${quote.content} - ${quote.author}`);
            } catch (error) {
                console.error('Error fetching quotes:', error);
                return language === 'id' ? indonesianQuotes : [];
            }
        }

        // Fungsi untuk memperbarui cache quotes dengan retry mechanism
        async function updateQuotesCache(language) {
            showLoadingState();
            let retries = 3;

            while (retries > 0) {
                try {
                    const quotes = await fetchQuotes(language);
                    if (quotes && quotes.length > 0) {
                        quotesCache[language] = quotes;
                        break;
                    }
                    retries--;
                } catch (error) {
                    console.error(`Failed to fetch quotes, retries left: ${retries}`);
                    retries--;
                    if (retries > 0) {
                        await new Promise(resolve => setTimeout(resolve, 1000));
                    }
                }
            }

            hideLoadingState();

            if (quotesCache[language].length === 0) {
                try {
                    const singleQuote = await fetchSingleQuote(language);
                    if (singleQuote) {
                        quotesCache[language] = [singleQuote];
                    }
                } catch (error) {
                    console.error('Failed to fetch single quote:', error);
                }
            }
        }

        // Fungsi tambahan untuk mengambil single quote sebagai backup
        async function fetchSingleQuote(language) {
            try {
                if (language === 'id') {
                    return indonesianQuotes[Math.floor(Math.random() * indonesianQuotes.length)];
                }

                const params = new URLSearchParams({
                    maxLength: '100',
                    minLength: '50'
                });

                const apiUrl = `https://api.quotable.io/random?${params}`;
                const response = await fetch(apiUrl);

                if (!response.ok) {
                    throw new Error('Failed to fetch single quote');
                }

                const quote = await response.json();
                return `${quote.content} - ${quote.author}`;
            } catch (error) {
                console.error('Error fetching single quote:', error);
                return language === 'id' ?
                    indonesianQuotes[Math.floor(Math.random() * indonesianQuotes.length)] :
                    null;
            }
        }

        // Function to show loading state
        function showLoadingState() {
            startBtn.disabled = true;
            startBtn.innerHTML = `
        <span class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-white rounded-full" role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </span>
        Loading...
    `;
        }

        // Function to hide loading state
        function hideLoadingState() {
            startBtn.disabled = false;
            startBtn.innerHTML = `
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="5 3 19 12 5 21 5 3"></polygon>
        </svg>
        <span class="hidden sm:inline">Start Test</span>
        <span class="sm:hidden">Start</span>
    `;
        }

        // Fungsi untuk memulai test
        async function startTest() {
            if (quotesCache[currentLanguage].length === 0) {
                await updateQuotesCache(currentLanguage);
            }

            if (quotesCache[currentLanguage].length === 0) {
                alert('Unable to fetch quotes. Please check your internet connection and try again.');
                return;
            }

            currentText = quotesCache[currentLanguage][Math.floor(Math.random() * quotesCache[currentLanguage].length)];
            textDisplay.textContent = currentText;
            isTestActive = true;
            inputArea.disabled = false;
            inputArea.value = '';
            inputArea.focus();
            startBtn.disabled = true;
            resetBtn.disabled = false;
            startTime = new Date();
            errors = 0;
            totalChars = 0;

            timeleft = 60;
            timer = setInterval(() => {
                timeleft--;
                timerDisplay.textContent = timeleft;
                if (timeleft <= 0) endTest();
            }, 1000);
        }

        // Fungsi untuk mereset test
        // Fungsi untuk mereset test
        function resetTest() {
            // Bersihkan event listener pada modal sebelumnya
            const saveScoreBtn = document.getElementById('save-score');
            const skipSaveBtn = document.getElementById('skip-save');

            // Remove old event listeners
            const newSaveBtn = saveScoreBtn.cloneNode(true);
            const newSkipBtn = skipSaveBtn.cloneNode(true);
            saveScoreBtn.parentNode.replaceChild(newSaveBtn, saveScoreBtn);
            skipSaveBtn.parentNode.replaceChild(newSkipBtn, skipSaveBtn);

            // Reset state modal
            const modal = document.getElementById('score-modal');
            modal.classList.add('hidden');
            newSaveBtn.innerHTML = 'Save Score';
            newSaveBtn.disabled = false;
            newSkipBtn.innerHTML = 'Skip';
            newSkipBtn.disabled = false;

            // Reset test
            clearInterval(timer);
            timeleft = 60;
            timerDisplay.textContent = timeleft;
            isTestActive = false;
            inputArea.value = '';
            inputArea.disabled = true;
            startBtn.disabled = false;
            resetBtn.disabled = true;
            wpmDisplay.textContent = '0';
            accuracyDisplay.textContent = '0%';
            currentText = quotesCache[currentLanguage][Math.floor(Math.random() * quotesCache[currentLanguage].length)];
            textDisplay.textContent = currentText;
        }

        // Modify the endTest function to handle the enhanced modal
        async function endTest() {
            clearInterval(timer);
            isTestActive = false;
            inputArea.disabled = true;

            const inputText = inputArea.value;
            const originalText = textDisplay.textContent;

            let correctChars = 0;
            for (let i = 0; i < inputText.length; i++) {
                if (inputText[i] === originalText[i]) {
                    correctChars++;
                }
            }

            const timeElapsed = (new Date() - startTime) / 1000 / 60;
            const wordsTyped = inputText.trim().split(/\s+/).length;
            const wpm = Math.round(wordsTyped / timeElapsed);
            const accuracy = Math.round((correctChars / inputText.length) * 100);

            const newScore = {
                wpm,
                accuracy,
                timeleft: timeleft,
                language: currentLanguage
            };

            try {
                if (isTopScore(newScore)) {
                    document.getElementById('modal-wpm').textContent = wpm;
                    document.getElementById('modal-accuracy').textContent = accuracy + '%';

                    const modal = document.getElementById('score-modal');
                    const saveBtn = document.getElementById('save-score');
                    const skipBtn = document.getElementById('skip-save');
                    const playerNameInput = document.getElementById('player-name');
                    modal.classList.remove('hidden');

                    setTimeout(() => {
                        playerNameInput.focus();
                    }, 100);

                    const saveHandler = async () => {
                        try {
                            saveBtn.innerHTML =
                                '<span class="animate-spin inline-block w-4 h-4 border-[2px] border-current border-t-transparent text-white rounded-full"></span> Loading...';
                            saveBtn.disabled = true;
                            skipBtn.disabled = true;

                            const playerName = document.getElementById('player-name').value.trim();
                            newScore.name = playerName || 'Anonymous';
                            await saveScore(newScore);

                            modal.classList.add('opacity-0');
                            setTimeout(() => {
                                modal.classList.add('hidden');
                                modal.classList.remove('opacity-0');
                            }, 300);
                        } catch (error) {
                            saveBtn.innerHTML = 'Save Score';
                            saveBtn.disabled = false;
                            skipBtn.disabled = false;
                            alert('Failed to save score: ' + error.message);
                        }
                    };

                    document.getElementById('save-score').addEventListener('click', saveHandler, {
                        once: true
                    });

                    document.getElementById('skip-save').addEventListener('click', async () => {
                        try {
                            skipBtn.innerHTML =
                                '<span class="animate-spin inline-block w-4 h-4 border-[2px] border-current border-t-transparent text-gray-500 rounded-full"></span> Saving...';
                            skipBtn.disabled = true;
                            saveBtn.disabled = true;

                            newScore.name = 'Anonymous';
                            await saveScore(newScore);

                            modal.classList.add('opacity-0');
                            setTimeout(() => {
                                modal.classList.add('hidden');
                                modal.classList.remove('opacity-0');
                            }, 300);
                        } catch (error) {
                            skipBtn.innerHTML = 'Skip';
                            skipBtn.disabled = false;
                            saveBtn.disabled = false;
                            alert('Failed to save score: ' + error.message);
                        }
                    }, {
                        once: true
                    });
                } else {
                    showCompletionToast(wpm, accuracy, false);
                }
            } catch (error) {
                console.error('Error in endTest:', error);
                alert('Failed to process score. Please try again.');
            }
        }

        // Function to show completion toast
        function showCompletionToast(wpm, accuracy, isTop5) {
            const message = isTop5 ? `WPM: ${wpm} | Accuracy: ${accuracy}%` :
                `WPM: ${wpm} | Accuracy: ${accuracy}% - You are not in top 5, try again!`;
            const icon = isTop5 ?
                `<path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>` :
                `<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>`;
            const bgColor = isTop5 ?
                'bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100' :
                'bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100';

            const toastHtml = `
        <div id="finish-toast" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700" role="alert">
            <div class="p-4 sm:p-5">
                <div class="flex gap-x-4">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-${isTop5 ? 'green' : 'yellow'}-50 ${bgColor}">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                ${icon}
                            </svg>
                        </span>
                    </div>
                    <div class="grow">
                        <h3 class="font-semibold text-gray-800 dark:text-white">Test Complete!</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            ${message}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    `;

            const toastContainer = document.createElement('div');
            toastContainer.className = 'fixed bottom-0 right-0 z-50 p-4';
            toastContainer.innerHTML = toastHtml;
            document.body.appendChild(toastContainer);

            setTimeout(() => {
                toastContainer.remove();
            }, 5000); // Increased to 5 seconds for better readability
        }

        // Event listener untuk input
        inputArea.addEventListener('input', () => {
            if (!isTestActive) return;

            const inputText = inputArea.value;
            const originalText = textDisplay.textContent;

            let correctChars = 0;
            let errors = 0;
            let html = '';

            // Membandingkan setiap karakter dan menghitung yang benar/salah
            for (let i = 0; i < originalText.length; i++) {
                if (i >= inputText.length) {
                    html += originalText[i];
                } else if (inputText[i] === originalText[i]) {
                    html += `<span class="text-green-600 dark:text-green-400">${originalText[i]}</span>`;
                    correctChars++;
                } else {
                    html += `<span class="text-red-600 dark:text-red-400">${originalText[i]}</span>`;
                    errors++;
                }
            }

            textDisplay.innerHTML = html;

            // Hanya menghitung accuracy dari karakter yang sudah diketik
            const typedChars = inputText.length;
            const currentAccuracy = typedChars > 0 ?
                Math.round((correctChars / typedChars) * 100) :
                100;

            // Menghitung WPM
            const timeElapsed = (new Date() - startTime) / 1000 / 60;
            const wordsTyped = inputText.trim().split(/\s+/).length;
            const currentWPM = Math.round(wordsTyped / timeElapsed);

            // Update tampilan
            wpmDisplay.textContent = currentWPM;
            accuracyDisplay.textContent = `${currentAccuracy}%`;

            // Cek apakah test selesai
            if (inputText.length === originalText.length) {
                endTest();
            }
        });

        // Fungsi untuk mengubah bahasa
        function changeLanguage(lang) {
            currentLanguage = lang;

            // Update button styles
            document.getElementById('en-btn').className = lang === 'en' ?
                'py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600' :
                'py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600';

            document.getElementById('id-btn').className = lang === 'id' ?
                'py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600' :
                'py-2 px-3 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600';

            // Update text only if test is not active
            if (!isTestActive && quotesCache[lang].length > 0) {
                currentText = quotesCache[lang][Math.floor(Math.random() * quotesCache[lang].length)];
                textDisplay.textContent = currentText;
            }

            updateLeaderboard();
        }

        // Event listeners untuk tombol
        startBtn.addEventListener('click', startTest);
        resetBtn.addEventListener('click', resetTest);

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + Enter to start test
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                if (!isTestActive && !startBtn.disabled) {
                    startTest();
                }
            }

            // Escape to reset test
            if (e.key === 'Escape') {
                if (isTestActive) {
                    resetTest();
                }
            }

            // Close modal with Escape
            if (e.key === 'Escape' && !scoreModal.classList.contains('hidden')) {
                skipSaveBtn.click();
            }
        });

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', async () => {
            showLoadingState();
            try {
                await Promise.all([
                    updateQuotesCache('en'),
                    updateQuotesCache('id'),
                    fetchScores()
                ]);
            } catch (error) {
                console.error('Failed to initialize:', error);
            } finally {
                hideLoadingState();
                changeLanguage('en');
            }
        });


        // Prevent paste using keyboard shortcuts
        inputArea.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) &&
                (e.key === 'v' || // Prevent paste
                    e.key === 'c' || // Prevent copy
                    e.key === 'x')) { // Prevent cut
                e.preventDefault();
            }
        });
    </script>
@endsection
