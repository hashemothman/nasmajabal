<?php

namespace App\Http\Requests;

use App\Traits\APIResponseTrait;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreHelpCenterRequest extends FormRequest
{
    use APIResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name'=>'required|string',
            'phone'    =>'required|string',
            'email'    =>'required|email:rfc,dns',
            'subject'  =>'required|string',
            'message'  =>'required|string',
            'status' =>'required|string',
        ];
    }
    protected function failedValidation(Validator $validator): void
    {
        $errorMessage = $validator->errors()->all();
        $errorMessage = (string) array_pop($errorMessage);
        throw new HttpResponseException(
            response: $this->unprocessableResponse(
                $errorMessage
            )
        );
    }
}
