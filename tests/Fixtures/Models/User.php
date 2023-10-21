<?php

namespace Recca0120\FilamentNestable\Tests\Fixtures\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    protected $fillable = ['name', 'email'];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
