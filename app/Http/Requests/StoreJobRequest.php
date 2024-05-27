<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //! 'title' and  'salary' are comming from the name of the input of the from
        //! the id of the form is for the javascript.
        //? <form>
        //?  <input type="text" name="title" ... >
        //?  <input type="text" name="salary" ... >
        //? </form>
        return [
            'title' => 'required|min:3|max:50',
            'salary' => 'required|min:3|max:50',
            'image' => 'required',
        ];
    }
}
//'email' => ['required', 'regex:/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/']


// mimes:jpeg,png,jpg,gif,svg|max:2048'
