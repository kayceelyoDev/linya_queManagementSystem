

<div class="flex items-center justify-center flex-col gap-6">
    <div class="w-100">
            <x-auth-header :title="__('Create a New User')" :description="__('Enter the account details below to create an account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="registerUser" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Full name')" />

        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" viewable />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" viewable />

        <!----select user role --->

        <flux:select wire:model="role" placeholder="Choose user role..." :label="__('Select user role')">
            <flux:select.option>admin</flux:select.option>
            <flux:select.option>staff</flux:select.option>
           
        </flux:select>
        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    </div>
    
</div>
