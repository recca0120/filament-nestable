<?php

namespace Recca0120\FilamentNestable;

use Filament\Resources\Pages\Page;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;

abstract class TreePage extends Page
{
    protected static string $view = 'filament-nestable::tree-page';

    abstract protected function getTree(): Enumerable;

    abstract protected function doUpdateTree(array $data): void;

    #[Renderless]
    #[On('update-tree')]
    public function updateTree(...$data): void
    {
        $this->doUpdateTree($data);
    }

    public function getViewData(): array
    {
        return ['tree' => $this->getTree()];
    }
}
