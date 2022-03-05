<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // trueにしたらフォームリクエストの利用が許可される
        return true;
        // 以下のようにすれば、パスごとに適用できる
        // if ($this->path() == 'sample') {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric',
            'title' => 'required',
            'content' => 'required',
            'is_solved' => 'boolean',
            'is_answered' => 'booloean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必ず入力してください',
            'content.required' => '質問内容は必ず入力してください',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $data = [
            'message' => __('The given data was invalid.'),
            'errors' => $validator->errors()->toArray(),
        ];

        throw new HttpResponseException(response()->json($data, 422));
    }
}
