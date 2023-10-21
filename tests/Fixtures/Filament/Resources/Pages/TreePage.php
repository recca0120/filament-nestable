<?php

namespace Recca0120\FilamentNestable\Tests\Fixtures\Filament\Resources\Pages;

use Illuminate\Support\Enumerable;
use Kalnoy\Nestedset\Collection;
use Kalnoy\Nestedset\QueryBuilder;
use Recca0120\FilamentNestable\Tests\Fixtures\Filament\Resources\PageResource;

class TreePage extends \Recca0120\FilamentNestable\TreePage
{
    protected static string $resource = PageResource::class;

    public function getBreadcrumb(): ?string
    {
        return 'TreePage';
    }

    protected function getTree(): Enumerable
    {
        /** @var PageResource $resource */
        $resource = static::getResource();
        /** @var QueryBuilder $query */
        $query = $resource::getEloquentQuery();
        /** @var Collection $collection */
        $collection = $query->defaultOrder()->get();

        return $collection->toTree();
    }

    protected function updateTree(array $data): void
    {
        /** @var PageResource $resource */
        $resource = static::getResource();
        /** @var QueryBuilder $query */
        $query = $resource::getEloquentQuery();
        $query->rebuildTree($data);
    }
}
