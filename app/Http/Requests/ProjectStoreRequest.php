<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
        dd($this);
        return [
            'office_id'                         => 'required|exists:offices,id',
            'title'                             => 'required|max:255|unique:projects,title',
            'ref_pap_type_id'                   => 'required|exists:ref_pap_types,id',
            'regular_program'                   => 'required|bool',
        ];
    }

    public function messages()
    {
        return [
            'title.unique'      => 'The PAP title you have submitted has already been taken.',
        ];
    }
}
