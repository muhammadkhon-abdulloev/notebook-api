<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookUpdateRequest extends FormRequest
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
            'name' => 'max:255', // SOME NAME SOME
            'company' => '', // SARTOJ Tech.
            'phone' => 'max:20', // +77777777777
            'email' => 'max:20', // admin@example.com
            'birthday' => 'max:10', // 2022-12-31
            'photo' => '', // photo.png
            'status' => '', // active | unactive | deleted
        ];
    }
}
