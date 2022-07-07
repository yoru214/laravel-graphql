<?php

namespace App\GraphQL\Types;

use App\Test;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TestType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Test',
        'description' => 'Test data',
        'model' => Test::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the test',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'type of test',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'description of the test',
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'category of test',
            ],
            'questions' => [
                'type' => Type::listOf(GraphQL::type('Question')),
                'description' => 'test questions',
            ]
        ];
    }
}