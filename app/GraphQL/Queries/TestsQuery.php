<?php

namespace App\GraphQL\Queries;

use App\Test;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class TestsQuery extends Query
{
    protected $attributes = [
        'name' => 'tests',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Test'));
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        return Test::select($select)->with($with)->get();
    }
}