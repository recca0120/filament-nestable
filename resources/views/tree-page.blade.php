<x-filament-panels::page>
    <div
        wire:disabled="updateTree"
        x-data="nestableComponent"
        x-load-js="[
            @js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('filament-nestable', 'recca0120/filament-nestable'))
        ]"
    >
        <div class="flex gap-2 mb-4">
            <x-filament::button.group>
                <x-filament::button class="whitespace-nowrap"
                                    grouped="true"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="cursor-wait opacity-70"
                                    @click="toggle(false)"
                >
                    Expand All
                </x-filament::button>
                <x-filament::button class="whitespace-nowrap"
                                    grouped="true"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="cursor-wait opacity-70"
                                    @click="toggle(true)"
                >
                    Collapse All
                </x-filament::button>
            </x-filament::button.group>

            <x-filament::button
                wire:loading.attr="disabled"
                wire:loading.class="cursor-wait opacity-70"
                @click="updateTree"
            >
                <x-filament::loading-indicator class="h-4 w-4" wire:loading/>
                <span wire:loading.remove>Save</span>
            </x-filament::button>
        </div>
        <ol x-data="nestableTreeComponent">
            @foreach ($tree as $node)
                @include('filament-nestable::tree-item', ['node' => $node])
            @endforeach
        </ol>
    </div>
</x-filament-panels::page>

<script>
</script>
