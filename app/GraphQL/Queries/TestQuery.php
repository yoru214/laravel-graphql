<?php

namespace App\GraphQL\Queries;

use App\Models\Test;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;


class TestQuery extends Query
{
    protected $attributes = [
        'name' => 'test',
    ];

    public function type(): Type
    {
        return GraphQL::type('Test');
    }

    public function args():array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        return Test::select($select)->with($with)->get();
    }
}