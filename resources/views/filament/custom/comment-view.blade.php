<div class="space-y-4 p-4">
    <!-- Main Comment -->
    <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
        <div class="flex items-start gap-x-3">
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ $comment->name }}
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="mt-1 text-gray-800 dark:text-gray-200">
                    {{ $comment->comment }}
                </p>
                <div class="mt-2 flex items-center gap-x-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $comment->like }} likes
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Replies -->
    @if($comment->replies->count() > 0)
        <div class="ml-8 space-y-4">
            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                Replies ({{ $comment->replies->count() }})
            </h4>
            @foreach($comment->replies as $reply)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
                    <div class="flex items-start gap-x-3">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $reply->name }}
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $reply->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="mt-1 text-gray-800 dark:text-gray-200">
                                {{ $reply->comment }}
                            </p>
                            <div class="mt-2 flex items-center gap-x-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $reply->like }} likes
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>