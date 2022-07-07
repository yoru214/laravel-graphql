<?php

namespace App\GraphQL\Queries;

use App\Models\Question;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;


class QuestionQuery extends Query
{
    protected $attributes = [
        'name' => 'question',
    ];

    public function type(): Type
    {
        return GraphQL::type('Question');
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
        return Question::select($select)->with($with)->get();
    }
}