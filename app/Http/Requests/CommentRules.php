<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRules extends FormRequest
{
    public function messages()
    {
        return [
            'name.required' => '名字不能为空',
            'name.max' => '名字长度不能大于20',
            'comment.required' => '留言不能为空',
            'comment.max' => '留言度不能大于500字符',
        ];
    }
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
            'name' => 'required',
            'comment' => 'required|max:500',
        ];
    }
}
