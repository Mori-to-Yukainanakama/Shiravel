<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class AnswerCommentRequest extends FormRequest
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
            'answer_id'　,
            'content' => 'required|max:16384',
        ];
    }

    public function messages()
    {
        return [
            // タイトルがない時のエラーメッセージ
            'title.required' => 'タイトルは必ず入力してください',

            // タイトルの文字数が多い時のエラーメッセージ
            'title.max' => 'タイトルが長すぎます。30文字以内で投稿してください',

            // 質問内容がない時のエラーメッセージ
            'content.required' => '質問内容は必ず入力してください',

            'content.max' => '質問内容が長すぎます。16384文字以内で投稿してください',
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
