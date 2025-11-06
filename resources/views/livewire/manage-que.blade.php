<div wire:poll.1s class="flex flex-col gap-5 font-mono px-6 py-6">

    {{-- Stats Cards --}}
    <div class="flex flex-wrap justify-around gap-6">
        {{-- Current Serving --}}
        <div class="relative w-80 md:w-120 h-50 rounded-2xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <x-placeholder-pattern
                class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"
                title="Current Serving"
                :count="$currentQue->que_number ?? 0"
            />
        </div>

        {{-- Pending Queue --}}
        <div class="relative  w-80 md:w-120 h-50 rounded-2xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <x-placeholder-pattern
                class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"
                title="Pending Queue"
                :count="$currentQueCount"
            />
        </div>
    </div>

    {{-- Current Serving Details --}}
    <div class="p-6 bg-white dark:bg-gray-900/30 rounded-2xl shadow-md w-full mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Current Serving</h2>

        @if($currentQue)
            <div class="flex flex-col gap-4 p-6 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 font-mono">
                <div class="text-gray-800 dark:text-gray-100 text-2xl">
                    <span class="font-semibold ">Name:</span> {{ $currentQue->user->name ?? 'Unknown User' }}
                </div>
                <div class="text-gray-800 dark:text-gray-100 text-2xl">
                    <span class="font-semibold">Purpose:</span> 
                    <flux:badge color="blue" size="md" class="bg-blue-500 dark:bg-blue-700 text-white dark:text-white">
                        {{ $currentQue->purpose }}
                    </flux:badge>
                </div>
                <div class="text-gray-800 dark:text-gray-100 text-2xl">
                    <span class="font-semibold">Queue Number:</span> {{ $currentQue->que_number }}
                </div>
                <div class="mt-6 text-start">
                    <flux:button wire:click="nextQueue" color="blue" class="px-6 py-3 text-lg rounded-2xl">
                        Next Queue
                    </flux:button>
                </div>
            </div>
        @else
            <div class="text-center text-gray-500 dark:text-gray-400 py-6 text-lg">
                No one is being served currently.
            </div>
        @endif
    </div>

    {{-- Queue List Table --}}
    <div class="p-6 bg-white dark:bg-gray-900/30 rounded-2xl shadow-md w-full mx-auto overflow-x-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Queue List</h2>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-md">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">#</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Queue Number</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">User ID</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Purpose</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($queues as $index => $queue)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $queue->que_number }}</td>
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $queue->user_id }}</td>
                        <td class="px-6 py-4">
                            <flux:badge color="blue" size="sm" class="bg-blue-500 dark:bg-blue-700 text-white dark:text-white">
                                {{ $queue->purpose }}
                            </flux:badge>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400 text-lg">
                            No queues available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
