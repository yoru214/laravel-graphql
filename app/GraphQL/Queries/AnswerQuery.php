<?php

namespace App\GraphQL\Queries;

use App\Answers;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;


class AnswerQuery extends Query
{
    protected $attributes = [
        'name' => 'answer',
    ];

    public function type(): Type
    {
        return GraphQL::type('Answer');
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
        return Answers::findOrFail($args['id']);
    }

}