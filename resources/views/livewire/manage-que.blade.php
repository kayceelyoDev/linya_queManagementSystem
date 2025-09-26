<div wire:poll.1s class="">
    <div class="flex auto-rows-min gap-4 flex-wrap items-center justify-around">

        {{-- Current Serving --}}
        <div class="relative aspect-video overflow-hidden w-150 h-50 md:h-70 rounded-xl border border-neutral-200 dark:border-neutral-700">
           
                <x-placeholder-pattern 
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" 
                    title="Current Serving" :count="$currentQue->que_number ?? 0"
                />
        </div>

        {{-- Pending Que (example placeholder) --}}
        <div class="relative aspect-video overflow-hidden w-150 h-50 md:h-70 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern 
                class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" 
                title="Pending Que" 
                :count="$currentQueCount " 
            />
        </div>
    </div>



    <div class="p-4 bg-white dark:bg-gray-400/30 rounded-lg shadow-md max-w-full mt-10 mx-auto">
    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Current Serving</h2>

    @if($currentQue)
        <div class="flex flex-col gap-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="text-gray-800 dark:text-gray-100">
                <span class="font-semibold">Name:</span> {{ $currentQue->user->name ?? 'Unknown User' }}
            </div>
            <div class="text-gray-800 dark:text-gray-100">
                <span class="font-semibold">Purpose:</span> {{ $currentQue->purpose }}
            </div>
            <div class="text-gray-800 dark:text-gray-100">
                <span class="font-semibold">Queue Number:</span> {{ $currentQue->que_number }}
            </div>
        <div class="mt-4 text-start">
            <button 
                wire:click="nextQueue" 
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Next Queue
            </button>
        </div>
        </div>
        
    @else
        <div class="text-gray-500 dark:text-gray-400 text-center py-4">
            No one is being served currently.
        </div>
    @endif
</div>



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
                @foreach($queues as $index => $queue)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->que_number }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->user_id }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $queue->purpose }}</td>
                    </tr>
                @endforeach

                @if($queues->isEmpty())
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
