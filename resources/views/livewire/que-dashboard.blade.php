<div wire:poll.1s class="space-y-12 px-6 py-8 font-mono">
    <div class="flex flex-col md:flex-row gap-10 justify-center">
        {{-- Current Serving --}}
        <div class="relative aspect-video w-full md:w-96 h-64 rounded-2xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg hover:shadow-xl transition-transform duration-300 transform hover:scale-105">
            <x-placeholder-pattern 
                class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" 
                title="Current Serving" 
                :count="$currentNumber" 
            />
        </div>

        {{-- Your Number --}}
        <div class="relative aspect-video w-full md:w-96 h-64 rounded-2xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg hover:shadow-xl transition-transform duration-300 transform hover:scale-105">
            <x-placeholder-pattern 
                class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" 
                title="Your Number" 
                :count="$userQueNumber" 
            />
        </div>
    </div>

    {{-- Queue Form --}}
    <div class="flex flex-col items-center mt-12 space-y-6">
        @if($isHaveQue <= 0)
            <h1 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">Get Queue Number</h1>

            <select class="w-72 px-5 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" wire:model="purpose">
                <option value="">Select purpose</option>
                <option value="Tuition Payment">Tuition Payment</option>
                <option value="General Uniforms">General Uniforms</option>
                <option value="PE Uniforms">PE Uniforms</option>
                <option value="Document Payment">Document Payment</option>
                <option value="Graduation Payment">Graduation Payment</option>
                <option value="ID Payment">ID Payment</option>
                <option value="More">More</option>
            </select>

            <flux:button wire:click="addque" color="blue" size="base" class="px-8 py-3 text-lg rounded-2xl">Get Number</flux:button>
        @endif
    </div>
</div>
