<?php

namespace Recca0120\FilamentNestable\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Page extends Model
{
    use NodeTrait;

    protected $fillable = ['name'];
}
