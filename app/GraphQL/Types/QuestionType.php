<?php

namespace App\GraphQL\Types;

use App\Question;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class QuestionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Question',
        'description' => 'Question data',
        'model' => Question::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the question',
            ],
            'test_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'test id  of the question',
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'type of question',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'description of the question',
            ],
            'answers' => [
                'type' => Type::listOf(GraphQL::type('Answer')),
                'description' => 'question answers',
                'args' => [
                    'isAnswer' => [
                        'type' => Type::boolean(),
                    ],
                 ],                
                'query' => function(array $args, $query, $ctx):void {
                    if(isset($args['isAnswer'])) {
                        $query->where('answers.isAnswer', '=', $args['isAnswer']);
                    }
                },
                
               
            ]
        ];
    }
}