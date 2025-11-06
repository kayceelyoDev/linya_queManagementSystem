<div class="flex flex-col gap-6 h-full w-full font-mono" wire:poll.1s>
    <!-- Top 3 Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Current Number -->
        <div class="relative aspect-video overflow-hidden rounded-xl   bg-gray-50 dark:bg-gray-900/20">
            <x-placeholder-pattern class="absolute inset-0 w-full h-full stroke-gray-400 dark:stroke-gray-300"
                title="Current Number" :count="$currentNum" />
        </div>

        <!-- Next Number -->
        <div class="relative aspect-video overflow-hidden rounded-xl   bg-gray-50 dark:bg-gray-900/20">
            <x-placeholder-pattern class="absolute inset-0 w-full h-full stroke-gray-400 dark:stroke-gray-300"
                title="Next Number" :count="$nextNum" />
        </div>

        <!-- Number of Queues -->
        <div class="relative aspect-video overflow-hidden rounded-xl   bg-gray-50 dark:bg-gray-900/20">
            <x-placeholder-pattern class="absolute inset-0 w-full h-full stroke-gray-400 dark:stroke-gray-300"
                title="Number of Queues" :count="$numOfQue" />
        </div>
    </div>

    <!-- Queue List Table -->
    <div class="relative flex-1 overflow-hidden rounded-xl border border-gray-300 dark:border-gray-600">
        <div class="p-4 bg-gray-50 dark:bg-gray-900/20 h-full rounded-lg shadow-none flex flex-col">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 font-mono">Queue List</h2>

            <div class="overflow-x-auto flex-1">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 font-mono">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xl font-semibold text-gray-900 dark:text-gray-100">#
                            </th>
                            <th class="px-6 py-3 text-left text-xl font-semibold text-gray-900 dark:text-gray-100">Queue
                                Number</th>
                            <th class="px-6 py-3 text-left text-xl font-semibold text-gray-900 dark:text-gray-100">User
                                ID</th>
                            <th class="px-6 py-3 text-left text-xl font-semibold text-gray-900 dark:text-gray-100">
                                Purpose</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                        @forelse($que as $index => $queue)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">{{ $queue->que_number }}
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">{{ $queue->user_id }}
                                </td>
                                <td class="px-6 py-4 text-lg">
                                    <flux:badge color="blue" size="lg"
                                        class="text-white dark:text-white dark:bg-blue-700 bg-blue-500">
                                        {{ $queue->purpose }}
                                    </flux:badge>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No queues available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
