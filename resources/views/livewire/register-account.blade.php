<div class="flex items-center justify-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900/10">

    <div class="w-full max-w-lg bg-white dark:bg-gray-900/20 rounded-2xl shadow-lg p-8 space-y-6">

        {{-- Header --}}
        <x-auth-header 
            :title="__('Create a New User')" 
            :description="__('Enter the account details below to create an account')" 
        />

        {{-- Session Status --}}
        <x-auth-session-status class="text-center mb-4" :status="session('status')" />

        {{-- Form --}}
        <form method="POST" wire:submit.prevent="registerUser" class="flex flex-col gap-5">

            {{-- Name --}}
            <flux:input 
                wire:model="name" 
                :label="__('Name')" 
                type="text" 
                required 
                autofocus 
                autocomplete="name"
                :placeholder="__('Full name')" 
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

            {{-- Password --}}
            <flux:input 
                wire:model="password" 
                :label="__('Password')" 
                type="password" 
                required 
                autocomplete="new-password"
                :placeholder="__('Password')" 
                viewable 
            />

            {{-- Confirm Password --}}
            <flux:input 
                wire:model="password_confirmation" 
                :label="__('Confirm password')" 
                type="password" 
                required 
                autocomplete="new-password" 
                :placeholder="__('Confirm password')" 
                viewable 
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

            {{-- Submit Button --}}
            <div class="flex flex-col gap-3 mt-4">
                <flux:button 
                    type="submit" 
                    variant="primary" 
                    class="w-full px-6 py-3 text-lg font-medium" 
                    data-test="register-user-button"
                >
                    {{ __('Create Account') }}
                </flux:button>
            </div>

        </form>
    </div>

</div>
