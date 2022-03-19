<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BestAnswerRequest extends FormRequest
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
     * ベストアンサーのバリデーションのルール
     *
     * @return array
     */
    public function rules()
    {
        return [

            // 質問IDは必須
            'question_id' => 'required|numeric',

            // 回答ID, 回答コメントID, 質問コメントIDは必須項目ではない(NULLを許可)
            'answer_id' => 'numeric|nullable',
            'answer_comment_id' => 'numeric|nullable',
            'question_comment_id' => 'numeric|nullable',
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
