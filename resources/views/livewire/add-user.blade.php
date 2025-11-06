<div class="space-y-6 font-mono">

    <div class="w-full flex flex-col gap-4 md:flex-row items-center justify-around">
        <div>
            <h1 class="text-2xl">Admin Dashboard</h1>
        </div>

        <div class="flex items-center justify-center">
            <flux:button href="/registerUser" icon:trailing="plus" class="text-xl">
                Add user
            </flux:button>
        </div>
    </div>

    <div class="overflow-x-auto" wire:poll.1s>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr class="">
                    <th class="px-6 py-3 text-left  text-xl font-semibold text-gray-900 dark:text-gray-100">Name</th>
                    <th class="px-6 py-3 text-left  text-xl font-semibold text-gray-900 dark:text-gray-100">role</th>
                    <th class="px-6 py-3 text-left  text-xl font-semibold text-gray-900 dark:text-gray-100">status</th>
                    <th class="px-6 py-3 text-left  text-xl font-semibold text-gray-900 dark:text-gray-100">action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                @foreach ($users as $userlist)
                    <tr>
                        <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">{{ $userlist->name }}</td>
                        <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">{{ $userlist->role }}</td>
                        <td class="px-6 py-4 text-lg">
                            <flux:badge color="{{ $userlist->status === 'online' ? 'green' : 'red' }}" size="sm"
                                class="{{ $userlist->status === 'online'
                                    ? 'dark:text-green-100 dark:bg-green-700'
                                    : 'dark:text-red-100 dark:bg-red-700' }}">
                                {{ ucfirst($userlist->status) }}
                            </flux:badge>

                        </td>
                        <td class="px-6 py-4 text-lg text-gray-800 dark:text-gray-200">
                            <flux:button href="{{route('updateUser.edit', $userlist->id)}}"  icon:trailing="arrow-down-tray" class="p-0  h-1">
                                Update User
                            </flux:button>
                        </td>
                @endforeach

            </tbody>
        </table>
    </div>


</div> 
