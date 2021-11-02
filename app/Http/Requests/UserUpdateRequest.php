<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=> 'required|string',
            'last_name' => 'required|string',
            'office_id' => 'required|exists:offices,id',
            'role_id'   => 'required|exists:roles,id',
            'username'  => 'required|unique:users,username,' . $this->id,
        ];
    }
}
