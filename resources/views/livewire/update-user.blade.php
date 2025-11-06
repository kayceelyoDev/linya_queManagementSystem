<div class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-lg bg-white dark:bg-gray-900/20 rounded-2xl shadow-lg p-8 space-y-6">
        
        {{-- Header --}}
        <x-auth-header 
            :title="__('Update User Credentials')" 
            :description="__('Enter the account details below to update an account')" 
        />

        {{-- Session Status --}}
        <x-auth-session-status class="text-center" :status="session('status')" />

        {{-- Form --}}
        <form method="POST" wire:submit.prevent="updateUser" class="flex flex-col gap-6">

            {{-- Name --}}
            <flux:input 
                wire:model="name" 
                :label="__('Name')" 
                type="text" 
                required 
                autofocus 
                autocomplete="name"
                :placeholder="__('Full name')" 
                :value="old('name', $user->name ?? '')"
            />

            {{-- Email --}}
            <flux:input 
                wire:model="email" 
                :label="__('Email address')" 
                type="email" 
                required 
                autocomplete="email"
                placeholder="email@example.com" 
            />

            {{-- User Role --}}
            <flux:select 
                wire:model="role" 
                placeholder="Choose user role..." 
                :label="__('Select user role')"
            >
                <flux:select.option>admin</flux:select.option>
                <flux:select.option>staff</flux:select.option>
            </flux:select>

            {{-- Buttons --}}
            <div class="flex flex-col gap-4 mt-4">
                <flux:button 
                    type="submit" 
                    variant="primary" 
                    class="w-full px-6 py-3 text-lg font-medium"
                    data-test="update-user-button"
                >
                    {{ __('Update Account') }}
                </flux:button>

                <flux:button 
                    wire:click="deleteAccount" 
                    variant="danger" 
                    class="w-full px-6 py-3 bg-red-500 text-white hover:bg-red-600 transition"
                    data-test="delete-user-button"
                    type="button"
                >
                    {{ __('Delete Account') }}
                </flux:button>
            </div>
        </form>
    </div>
</div>
