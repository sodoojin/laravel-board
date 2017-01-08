<?php


namespace Core\Services;


use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\LaravelValidator;

abstract class BaseService
{
    /**
     * @param LaravelValidator $validator
     * @param $rule
     * @param $data
     * @throws ValidatorException
     */
    protected function validate(LaravelValidator $validator, $rule, $data)
    {
        if ( ! $validator->with($data)->passes($rule)) {
            throw new ValidatorException($validator->errorsBag());
        }
    }
}