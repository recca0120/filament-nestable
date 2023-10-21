<?php

namespace Recca0120\FilamentNestable\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * @mixin QueryBuilder
 */
class Page extends Model
{
    use NodeTrait;

    protected $fillable = ['name'];
}
