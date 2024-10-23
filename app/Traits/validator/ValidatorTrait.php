<?php
namespace App\Traits\validator;

use Exception;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;

trait ValidatorTrait
{

    //?todo check validate done or not
    public function validate($request, array $rules, array $messages = [], array $attributes = [])
    {

        // ! valditaion
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        return true;

    }

    //todo check validate service (google , github) done or not
    public function servicevalidate($request, array $rules, array $messages = [], array $attributes = [])
    {

        // ! valditaion
        $validator = Validator::make($request, $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        return true;

    }


    //todo check validate done or not for python
    public function validatepy($request, array $rules, array $messages = [], array $attributes = [])
    {

        // ! valditaion
        $validator = Validator::make($request, $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        return true;

    }

}