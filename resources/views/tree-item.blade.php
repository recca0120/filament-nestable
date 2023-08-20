@php
    $id = $node->id;
    $name = $node->name;
    $depth = $node->depth;
    $icon = $node->icon ?? null;
    $children = $node->children ?? collect();
@endphp
<li class="mt-2"
    x-data="nestableItemComponent"
    @sort="updateChildren"
    :collapsed="collapsedAll"
    x-sortable-item="{{ $id }}"
>
    <div @class([
        'bg-white rounded-lg border border-gray-300 flex w-full gap-2',
        'dark:bg-gray-900 dark:border-white/10',
    ])>
        <button type="button" x-sortable-handle @class([
            'bg-gray-50 rounded-l-lg border-r border-gray-300 px-1',
            'dark:bg-gray-800 dark:border-white/10',
        ])>
            <x-heroicon-o-arrows-up-down class="text-gray-400 w-8 h-4"/>
        </button>

        <div class="flex py-2">
            @if ($icon)
                <x-dynamic-component :component="$icon" class="w-8 h-4"/>
            @endif

            <span>{{ $name }}</span>

            <div x-show="children.length > 0">
                <button
                        class="px-2 text-gray-500 appearance-none"
                        type="button"
                        @click="toggle"
                >
                    <x-heroicon-o-chevron-right
                            class="w-3.5 h-3.5 transition ease-in-out duration-200"
                            x-bind:style="style"
                    />
                </button>
            </div>
        </div>
    </div>
    <div x-show="!collapsed">
        <ol class="ms-4" x-data="nestableTreeComponent">
            @foreach ($children as $child)
                @include('filament-nestable::tree-item', ['node' => $child])
            @endforeach
        </ol>
    </div>
</li>
