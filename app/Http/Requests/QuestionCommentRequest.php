<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class QuestionCommentRequest extends FormRequest
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
            // 数字かどうか
            'user_id' => 'required|numeric',
            'question_id' => 'required|numeric',
            'content' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            // 回答内容がない時のエラーメッセージ
            'content.required' => '回答内容は必ず入力してください',

            'content.max' => '回答内容が長すぎます。255文字以内で投稿してください',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     * @throw HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'message' => __('バリデーションエラーが発生しました。'),
            'errors' => $validator->errors()->toArray(),
        ];

        throw new HttpResponseException(response()->json($data, 422));
    }
}


