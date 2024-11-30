<div id="comment-modal" class="hs-overlay hidden [--overlay-backdrop:static] scroll-smooth">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-80 transition-opacity backdrop-blur-sm"></div>

    <div class="fixed inset-0 z-[70] overflow-y-auto">
        <div class="flex min-h-full items-end sm:items-center justify-center sm:p-4">
                <div class="relative w-full max-w-2xl overflow-hidden rounded-t-xl sm:rounded-xl bg-white shadow-xl dark:bg-gray-800 transform opacity-100 
                    translate-y-full sm:translate-y-0 
                    transition-transform duration-300 
                    sm:transition-none"
                    id="modal-content">
                    <!-- Modal Header dengan Shadow -->
                    <div
                        class="sticky top-0 z-50 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-x-3">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                    Comments
                                </h3>
                                <span
                                    class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                    {{ $blog->comments->count() }}
                                </span>
                            </div>
                            <button type="button"
                                class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-sm text-gray-500 transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 dark:hover:bg-gray-700"
                                data-hs-overlay="#comment-modal">
                                <span class="sr-only">Close</span>
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="p-4 sm:p-6 overflow-y-auto" style="max-height: calc(100vh - 200px);">
                        <!-- Comment Form -->
                        <form id="comment-form" class="mb-8 bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
                            @csrf
                            <div class="mb-4">
                                <label for="comment-name"
                                    class="block text-sm font-medium mb-2 dark:text-white">Name</label>
                                <input type="text" id="comment-name" name="name" required
                                    class="py-3 px-4 block text-base w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    placeholder="Your name" style="font-size: 16px;">
                            </div>
                            <div class="mb-4">
                                <label for="comment-text"
                                    class="block text-sm font-medium mb-2 dark:text-white">Comment</label>
                                <textarea id="comment-text" name="comment" required rows="3"
                                    class="text-base py-3 px-4 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    placeholder="Leave your comment here..."></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" id="comment-submit-btn"
                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    <span>Post comment</span>
                                    <svg class="hidden animate-spin size-4 text-white" id="comment-loading"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <!-- Comments List -->
                        <div id="comments-list" class="space-y-4">
                            @foreach ($blog->comments()->whereNull('parent_id')->latest()->take(5)->get() as $comment)
                                <div
                                    class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                                    <div class="flex gap-x-3">
                                        <img class="size-8 rounded-full"
                                            src="https://api.dicebear.com/9.x/initials/svg?seed={{ $comment->name }}"
                                            alt="User Avatar">
                                        <div class="grow">
                                            <div class="flex items-center justify-between mb-1">
                                                <div>
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                        {{ $comment->name }}
                                                    </span>
                                                    <span class="block text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="text-gray-800 dark:text-gray-200">{{ $comment->comment }}</p>
                                            <div class="mt-2 flex items-center gap-x-3">
                                                <button type="button" onclick="likeComment({{ $comment->id }})"
                                                    class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400 transition-all duration-300">
                                                    <svg class="size-4 transition-transform duration-300 hover:scale-110"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                    </svg>
                                                    <span
                                                        class="comment-likes-{{ $comment->id }}">{{ $comment->like }}</span>
                                                </button>
                                                <button type="button" onclick="toggleReplyForm({{ $comment->id }})"
                                                    class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path
                                                            d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                                    </svg>
                                                    Reply
                                                </button>
                                            </div>

                                            <!-- Reply Form -->
                                            <div id="reply-form-{{ $comment->id }}" class="hidden mt-4 ml-8">
                                                <form onsubmit="submitReply(event, {{ $comment->id }})"
                                                    class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                                    <div class="mb-4">
                                                        <label
                                                            class="block text-sm font-medium mb-2 dark:text-white">Name</label>
                                                        <input type="text" name="name" required
                                                            class="text-base py-2 px-3 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                            placeholder="Your name">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label
                                                            class="block text-sm font-medium mb-2 dark:text-white">Reply</label>
                                                        <textarea name="comment" required rows="3"
                                                            class="text-base py-2 px-3 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                            placeholder="Write your reply..."></textarea>
                                                    </div>
                                                    <div class="flex justify-end gap-x-2">
                                                        <button type="button"
                                                            onclick="toggleReplyForm({{ $comment->id }})"
                                                            class="py-2 px-3 inline-flex text-sm font-medium rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-50 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" id="reply-submit-btn-${commentId}"
                                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <span>Post Reply</span>
                                                            <svg class="hidden animate-spin size-4 text-white"
                                                                id="reply-loading-${commentId}"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24">
                                                                <circle class="opacity-25" cx="12"
                                                                    cy="12" r="10" stroke="currentColor"
                                                                    stroke-width="4">
                                                                </circle>
                                                                <path class="opacity-75" fill="currentColor"
                                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Replies List -->
                                            <div id="replies-{{ $comment->id }}" class="mt-4 ml-8 space-y-4">
                                                @foreach ($comment->replies as $reply)
                                                    <div
                                                        class="group bg-gray-50 dark:bg-gray-900 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                                                        <div class="flex gap-x-3">
                                                            <img class="size-8 rounded-full"
                                                                src="https://api.dicebear.com/9.x/initials/svg?seed={{ $reply->name }}"
                                                                alt="User Avatar">
                                                            <div class="grow">
                                                                <div class="flex items-center justify-between mb-1">
                                                                    <div>
                                                                        <span
                                                                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                                            {{ $reply->name }}
                                                                        </span>
                                                                        <span
                                                                            class="block text-sm text-gray-500 dark:text-gray-400">
                                                                            {{ $reply->created_at->diffForHumans() }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p class="text-gray-800 dark:text-gray-200">
                                                                    {{ $reply->comment }}</p>
                                                                <div class="mt-2 flex items-center gap-x-3">
                                                                    <button type="button"
                                                                        onclick="likeComment({{ $reply->id }})"
                                                                        class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                                                        <svg class="size-4"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path
                                                                                d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                                        </svg>
                                                                        <span
                                                                            class="comment-likes-{{ $reply->id }}">{{ $reply->like }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- Load More Button -->
                        @if ($blog->comments()->whereNull('parent_id')->count() > 5)
                            <div class="mt-6 text-center">
                                <button type="button" onclick="loadMoreComments()" id="load-more-btn"
                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">
                                    <span>Load more comments</span>
                                    <!-- Normal Icon -->
                                    <svg class="size-4" id="load-more-icon" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                    <!-- Loading Spinner -->
                                    <svg class="hidden animate-spin size-4" id="loading-spinner"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        let displayedCommentIds = new Set();
        // Tambahkan ini setelah deklarasi displayedCommentIds
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua comment yang sudah ada di halaman
            const existingComments = document.querySelectorAll('#comments-list > div');
            existingComments.forEach(comment => {
                // Ekstrak ID dari button like atau reply yang ada di comment
                const likeButton = comment.querySelector('button[onclick^="likeComment"]');
                if (likeButton) {
                    const commentId = likeButton.getAttribute('onclick').match(/\d+/)[0];
                    displayedCommentIds.add(parseInt(commentId));
                }
            });
        });
        // Handle comment form submission
        document.getElementById('comment-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('comment-submit-btn');
            const loadingIcon = document.getElementById('comment-loading');

            try {
                submitBtn.disabled = true;
                loadingIcon.classList.remove('hidden');

                const formData = new FormData(this);

                // Menggunakan formData langsung tanpa JSON stringify
                const response = await fetch(`/blog/{{ $blog->id }}/comment`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(await response.text());
                }

                const comment = await response.json();
                displayedCommentIds.add(comment.id);

                const commentsList = document.getElementById('comments-list');
                const commentHtml = `
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                <div class="flex gap-x-3">
                    <img class="size-8 rounded-full" src="https://api.dicebear.com/9.x/initials/svg?seed=${comment.name}" alt="User Avatar">
                    <div class="grow">
                        <div class="flex items-center justify-between mb-1">
                            <div>
                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">${comment.name}</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">Just now</span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-200">${comment.comment}</p>
                        <div class="mt-2 flex items-center gap-x-3">
                            <button type="button" onclick="likeComment(${comment.id})" class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                </svg>
                                <span class="comment-likes-${comment.id}">0</span>
                            </button>
                            <button type="button" onclick="toggleReplyForm(${comment.id})" class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                                Reply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
                commentsList.insertAdjacentHTML('afterbegin', commentHtml);

                // Reset form
                this.reset();

            } catch (error) {
                console.error('Error:', error);
            } finally {
                submitBtn.disabled = false;
                loadingIcon.classList.add('hidden');
            }
        });

        // Load more comments
        let page = 1;

        async function loadMoreComments() {
            const loadMoreBtn = document.getElementById('load-more-btn');
            const loadMoreIcon = document.getElementById('load-more-icon');
            const loadingSpinner = document.getElementById('loading-spinner');

            try {
                loadMoreBtn.disabled = true;
                loadMoreIcon.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');

                const response = await fetch(`/blog/{{ $blog->id }}/comments?page=${++page}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error(await response.text());
                }

                const data = await response.json();

                if (data.data.length > 0) {
                    const commentsList = document.getElementById('comments-list');

                    data.data.forEach(comment => {
                        // Skip jika comment sudah ditampilkan
                        if (displayedCommentIds.has(comment.id)) {
                            return;
                        }

                        displayedCommentIds.add(comment.id);
                        const commentDate = new Date(comment.created_at);
                        const timeAgo = formatTimeAgo(commentDate);

                        const commentHtml = `
                <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                    <div class="flex gap-x-3">
                        <img class="size-8 rounded-full" src="https://api.dicebear.com/9.x/initials/svg?seed=${comment.name}" alt="User Avatar">
                        <div class="grow">
                            <div class="flex items-center justify-between mb-1">
                                <div>
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">${comment.name}</span>
                                    <span class="block text-sm text-gray-500 dark:text-gray-400">${timeAgo}</span>
                                </div>
                            </div>
                            <p class="text-gray-800 dark:text-gray-200">${comment.comment}</p>
                            <div class="mt-2 flex items-center gap-x-3">
                                <button type="button" onclick="likeComment(${comment.id})" class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                    </svg>
                                    <span class="comment-likes-${comment.id}">${comment.like || 0}</span>
                                </button>
                                <button type="button" onclick="toggleReplyForm(${comment.id})" class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                    </svg>
                                    Reply
                                </button>
                            </div>

                            <!-- Reply Form -->
                            <div id="reply-form-${comment.id}" class="hidden mt-4 ml-8">
                                <form onsubmit="submitReply(event, ${comment.id})" class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium mb-2 dark:text-white">Name</label>
                                        <input type="text" name="name" required
                                            class="text-base py-2 px-3 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="Your name">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium mb-2 dark:text-white">Reply</label>
                                        <textarea name="comment" required rows="3"
                                            class="text-base py-2 px-3 block w-full border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="Write your reply..."></textarea>
                                    </div>
                                    <div class="flex justify-end gap-x-2">
                                        <button type="button" onclick="toggleReplyForm(${comment.id})"
                                            class="py-2 px-3 inline-flex text-sm font-medium rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-50 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:focus:ring-1 dark:focus:ring-gray-600">
                                            <span>Post Reply</span>
                                            <svg class="hidden animate-spin size-4 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Replies Container -->
                            <div id="replies-${comment.id}" class="mt-4 ml-8 space-y-4">
                                ${comment.replies ? comment.replies.map(reply => {
                                    const replyDate = new Date(reply.created_at);
                                    const replyTimeAgo = formatTimeAgo(replyDate);
                                    return `
                                        <div class="group bg-gray-50 dark:bg-gray-900 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                                            <div class="flex gap-x-3">
                                                <img class="size-8 rounded-full" src="https://api.dicebear.com/9.x/initials/svg?seed=${reply.name}" alt="User Avatar">
                                                <div class="grow">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <div>
                                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">${reply.name}</span>
                                                            <span class="block text-sm text-gray-500 dark:text-gray-400">${replyTimeAgo}</span>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-800 dark:text-gray-200">${reply.comment}</p>
                                                    <div class="mt-2 flex items-center gap-x-3">
                                                        <button type="button" onclick="likeComment(${reply.id})" 
                                                            class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                            </svg>
                                                            <span class="comment-likes-${reply.id}">${reply.like || 0}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `}).join('') : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `;
                        commentsList.insertAdjacentHTML('beforeend', commentHtml);
                    });
                }

                // Hide button if no more pages
                if (!data.next_page_url) {
                    loadMoreBtn.style.display = 'none';
                }

            } catch (error) {
                console.error('Error:', error);
                alert('Failed to load more comments. Please try again.');
            } finally {
                loadMoreBtn.disabled = false;
                loadMoreIcon.classList.remove('hidden');
                loadingSpinner.classList.add('hidden');
            }
        }

        // Helper function to format timestamps (tidak berubah)
        function formatTimeAgo(date) {
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            const diffInMinutes = Math.floor(diffInSeconds / 60);
            const diffInHours = Math.floor(diffInMinutes / 60);
            const diffInDays = Math.floor(diffInHours / 24);

            if (diffInSeconds < 60) {
                return 'just now';
            } else if (diffInMinutes < 60) {
                return `${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''} ago`;
            } else if (diffInHours < 24) {
                return `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
            } else if (diffInDays < 30) {
                return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
            } else {
                return date.toLocaleDateString();
            }
        }

        // Existing scripts...

        function toggleReplyForm(commentId) {
            // Cari form reply untuk comment awal
            const originalForm = document.getElementById(`reply-form-${commentId}`);
            if (originalForm) {
                originalForm.classList.toggle('hidden');
                return;
            }

            // Cari form reply untuk loaded comments
            const loadedForm = document.getElementById(`reply-form-${commentId}-loaded`);
            if (loadedForm) {
                loadedForm.classList.toggle('hidden');
                return;
            }
        }

        // Function untuk reply comment
        async function submitReply(event, commentId) {
            event.preventDefault();

            const form = event.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const loadingIcon = form.querySelector('svg.animate-spin');

            try {
                submitBtn.disabled = true;
                loadingIcon?.classList.remove('hidden');

                const formData = new FormData(form);
                formData.append('parent_id', commentId);

                const response = await fetch(`/blog/{{ $blog->id }}/comment/${commentId}/reply`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(await response.text());
                }

                const reply = await response.json();

                const repliesList = document.getElementById(`replies-${commentId}`);
                const replyHtml = `
            <div class="group bg-gray-50 dark:bg-gray-900 rounded-xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 p-4">
                <div class="flex gap-x-3">
                    <img class="size-8 rounded-full" src="https://api.dicebear.com/9.x/initials/svg?seed=${reply.name}" alt="User Avatar">
                    <div class="grow">
                        <div class="flex items-center justify-between mb-1">
                            <div>
                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    ${reply.name}
                                </span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">
                                    Just now
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-800 dark:text-gray-200">${reply.comment}</p>
                        <div class="mt-2 flex items-center gap-x-3">
                            <button type="button" onclick="likeComment(${reply.id})" 
                                class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                </svg>
                                <span class="comment-likes-${reply.id}">0</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
                repliesList.insertAdjacentHTML('afterbegin', replyHtml);

                form.reset();
                toggleReplyForm(commentId);

            } catch (error) {
                console.error('Error:', error);
            } finally {
                submitBtn.disabled = false;
                loadingIcon?.classList.add('hidden');
            }
        }

        // Function untuk like comment
        let cooldown2Timer;
        const cooldown2Duration = 5000; // Cooldown duration in milliseconds (5 seconds)

        function likeComment(commentId) {
            const likeButton = document.querySelector(`button[onclick="likeComment(${commentId})"]`);
            const likeIcon = likeButton.querySelector('svg');

            // Check if the button is in cooldown state
            if (likeButton.classList.contains('cooldown2')) {
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
                likeButton.classList.add('cooldown2');

                fetch(`/blog/{{ $blog->id }}/comment/${commentId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector(`.comment-likes-${commentId}`).textContent = data.likes;
                    });
            }
            // Set a cooldown timer
            cooldown2Timer = setTimeout(() => {
                likeButton.classList.remove('cooldown2');
            }, cooldown2Duration);

        }


        // TRANSISI MODAL TAMPILAN MOBILE
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('comment-modal');
            const modalContent = document.getElementById('modal-content');

            // Fungsi untuk mengecek apakah dalam mode mobile
            function isMobile() {
                return window.innerWidth < 640; // sm breakpoint Tailwind
            }

            // Fungsi untuk membuka modal
            function openModal() {
                modal.classList.remove('hidden');
                if (isMobile()) {
                    // Trigger reflow
                    void modal.offsetWidth;
                    modalContent.classList.remove('translate-y-full');
                }
            }

            // Fungsi untuk menutup modal
            function closeModal() {
                if (isMobile()) {
                    modalContent.classList.add('translate-y-full');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                } else {
                    modal.classList.add('hidden');
                }
            }

            // Update tombol open modal
            document.querySelectorAll('[data-hs-overlay="#comment-modal"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal();
                });
            });

            // Update tombol close modal
            document.querySelectorAll('[data-hs-overlay="#comment-modal"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        e.preventDefault();
                        closeModal();
                    }
                });
            });

            // Update tombol close di dalam modal
            const closeButton = modal.querySelector('button[data-hs-overlay="#comment-modal"]');
            if (closeButton) {
                closeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    closeModal();
                });
            }
        });
    </script>
