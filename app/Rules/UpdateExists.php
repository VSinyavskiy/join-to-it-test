<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpdateExists implements Rule
{
    /**
    * Define updated model from request
    */
    public $model;


    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->model->{$attribute} != $value) {
            $result = is_null($this->model::where($attribute, $value)->first());
        } 

        return $result ?? true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.update_exists');
    }
}