
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl" wire:poll.1s>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" title="Current Number" :count="$currentNum"/>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" title="Next Number" :count="$nextNum"/>
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" title="Number of Que" :count="$numOfQue"/>
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 bg-white dark:bg-gray-400/30 mt-2 h-full rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Queue List</h2>

    <div class="overflow-x-auto h-55">
        <table class="min-w-full bg-white  dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800 text-left">
                    <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">#</th>
                    <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">Queue Number</th>
                    <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">User ID</th>
                    <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">Purpose</th>
                </tr>
            </thead>
            <tbody>
                @foreach($que as $index => $queue)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->que_number }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->user_id }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->purpose }}</td>
                    </tr>
                @endforeach

                @if($que->isEmpty())
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                            No queues available.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>

