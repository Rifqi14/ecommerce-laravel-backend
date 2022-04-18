<?php

namespace App\Http\Requests\Area\Country;

use App\Http\Requests\Pagination\PaginationRequest;

class ListRequest extends PaginationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable',
            'code' => 'nullable',
            'phone_code' => 'nullable',
        ];
    }
}
