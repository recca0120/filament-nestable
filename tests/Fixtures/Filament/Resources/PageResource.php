<?php

namespace Recca0120\FilamentNestable\Tests\Fixtures\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Recca0120\FilamentNestable\Tests\Fixtures\Models\Page;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    public static function form(Form $form): Form
    {
        return $form;
    }

    public static function table(Table $table): Table
    {
        return $table;
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\TreePage::route('/index'),
        ];
    }
}
