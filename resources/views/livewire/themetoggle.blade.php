<flux:dropdown align="end" x-data x-init="$nextTick(() => { $flux.appearance = localStorage.getItem('theme') || 'system'; })">
    <flux:button variant="subtle" square>
        <flux:icon.sun x-show="$flux.appearance === 'light'" x-cloak variant="mini" />
        <flux:icon.moon x-show="$flux.appearance === 'dark'" x-cloak variant="mini" />
        <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" x-cloak variant="mini" />
        <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" x-cloak variant="mini" />
    </flux:button>

    <flux:menu>
        <flux:radio.group x-model="$flux.appearance" variant="segmented">
            <flux:radio value="light" icon="sun">Light</flux:radio>
            <flux:radio value="dark" icon="moon">Dark</flux:radio>
            <flux:radio value="system" icon="computer-desktop">System</flux:radio>
        </flux:radio.group>
    </flux:menu>
</flux:dropdown>
