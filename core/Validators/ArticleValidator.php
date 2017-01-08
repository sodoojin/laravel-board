<?php

namespace Core\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ArticleValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|min:10|max:20',
            'content' => 'required|min:10',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'min:10|max:20',
            'content' => 'min:10',
        ],
   ];
}
