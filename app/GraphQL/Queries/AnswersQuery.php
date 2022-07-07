<?php

namespace App\GraphQL\Queries;

use App\Models\Answers;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;


class AnswersQuery extends Query
{
    protected $attributes = [
        'name' => 'answers',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Answer'));
    }
    

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        return Answers::select($select)->with($with)->get();
    }

    
}