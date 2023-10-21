<?php

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Collection;
use Recca0120\FilamentNestable\Tests\Fixtures\Filament\Resources\Pages\TreePage;
use Recca0120\FilamentNestable\Tests\Fixtures\Models\Page;
use Symfony\Component\DomCrawler\Crawler;
use function Pest\Livewire\livewire;

beforeEach(function () {
    Page::create([
        'name' => 'Foo',
        'children' => [
            [
                'name' => 'Bar',
                'children' => [
                    ['name' => 'Fizz'],
                    ['name' => 'Buzz'],
                ],
            ],
        ],
    ]);
});

it('can render tree page', closure: function () {
    $rootSelector = '[x-data=nestableComponent] > [x-data=nestableTreeComponent] > [x-data=nestableItemComponent]';
    $childrenSelector = ':scope > div > [x-data=nestableTreeComponent] > [x-data="nestableItemComponent"]';

    $component = livewire(TreePage::class);
    $crawler = new Crawler($component->html());

    $pick = static function (Crawler $node) use ($childrenSelector, &$pick) {
        return $node->filter($childrenSelector)->each(static fn(Crawler $node) => array_filter([
            'name' => $node->filter('span')->first()->text(),
            'children' => $pick($node),
        ]));
    };

    $tree = $crawler->filter($rootSelector)->each(fn(Crawler $node) => [
        'name' => $node->filter('span')->first()->text(),
        'children' => $pick($node),
    ]);

    expect($tree[0])->toMatchArray([
        'name' => 'Foo',
        'children' => [
            [
                'name' => 'Bar',
                'children' => [
                    ['name' => 'Fizz'],
                    ['name' => 'Buzz'],
                ],
            ],
        ],
    ]);
});

it('can update tree', closure: function () {
    $newTree = [
        'name' => 'Foo',
        'children' => [
            [
                'name' => 'Bar',
                'children' => [
                    ['name' => 'Buzz'],
                    ['name' => 'Fizz'],
                ],
            ],
        ],
    ];

    $component = livewire(TreePage::class);
    $component->dispatch('update-tree', $newTree);

    $pick = static function (array $node) use (&$pick) {
        return array_filter([
            'name' => $node['name'],
            'children' => array_map(static fn(array $node) => $pick($node), $node['children']),
        ]);
    };

    /** @var Collection $collection */
    $collection = Page::defaultOrder()->get();
    /** @var Model $tree */
    $tree = $collection->toTree()->first();

    expect($pick($tree->toArray()))->toMatchArray($newTree);
});
