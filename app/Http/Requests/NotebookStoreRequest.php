<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'company' => '',
            'phone' => 'required|max:20',
            'email' => 'required|max:20',
            'birthday' => 'max:10', // 2022-12-31
            'photo' => '',
            'status' => ''
        ];
    }
}
