<div class="" wire:poll.1s>
       <div class="flex auto-rows-min gap-4 flex-wrap items-center justify-around">
            <div class="relative aspect-video overflow-hidden w-150 h-50 md:h-70 rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" title="Current Serving" :count="$currentNumber "/>
            </div>
            <div class="relative aspect-video overflow-hidden  w-150 h-50 md:h-70 rounded-xl border border-neutral-200 dark:border-neutral-700" >
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" title="Your Number" :count="$userQueNumber"/>
            </div>
        </div>

        <div class="">
            <div class=" mt-10 h-full flex-col items-center justify-center">
            @if($isHaveQue <= 0)
                <div class="text-center text-2xl">
                    <h1>Get Que Number</h1>
                </div>
                <div class=" flex-col text-center mt-10">
                    <select name="" id="" wire:model="purpose" >
                        <option value="" class=" bg-gray-500">Select purpose</option>
                        <option value="Tuition Payment" class=" bg-gray-500">Tuition Payment</option>
                        <option value="General Uniforms" class=" bg-gray-500">General Uniforms</option>
                        <option value="PE Uniforms" class=" bg-gray-500">PE Uniforms</option>
                        <option value="Document Payment" class=" bg-gray-500">Document Payment</option>
                        <option value="Graduation Payment" class=" bg-gray-500">Graduation Payment</option>
                        <option value="ID Payment" class=" bg-gray-500">ID Payment</option>
                        <option value="More" class=" bg-gray-500">More</option>
                    </select>
                </div>
                
                <div class="flex justify-center mt-10">
                    <button class="bg-gray-500/20 w-30 h-10 rounded-2xl cursor-pointer" wire:click="addque">Get Number</button>
                </div>
                @endif
            </div>
        </div>
</div>
 


