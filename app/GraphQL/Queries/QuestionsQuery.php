<?php

namespace App\GraphQL\Queries;

use App\Question;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class QuestionsQuery extends Query
{
    protected $attributes = [
        'name' => 'questions',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Question'));
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        return Question::select($select)->with($with)->get();
    }
}