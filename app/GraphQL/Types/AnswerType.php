<?php

namespace App\GraphQL\Types;

use App\Models\Answers;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AnswerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Answer',
        'description' => 'Answer data',
        'model' => Answers::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the answer',
            ],
            'question_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'question id  of the answer',
            ],
            'isAnswer' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'if answer is the correct answer',
            ],
            'value' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'value of the answer'
            ]
        ];
    }
}