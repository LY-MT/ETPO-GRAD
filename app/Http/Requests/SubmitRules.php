<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRules extends FormRequest
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

    public function messages()
    {
        return [
            'image.url' => '配图链接错误',
            'vcode.required' => '验证码不能为空',
            'qq.required' => 'QQ不能为空',
            'qq.max' => 'QQ长度不能大于20',
            'qq.min' => 'QQ长度不能小于4',
            'name.required' => '名字不能为空',
            'name.max' => '名字长度不能大于20',
            'subtitle.required' => '副标题不能为空',
            'subtitle.max' => '副标题长度不能大于100字符',
            'content.required' => '留言不能为空',
            'content.max' => '留言度不能大于500字符',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'image' => 'url',
            'vcode' => 'required',
            'qq' => 'required|max:20|min:4',
            'name' => 'required|max:20',
            'subtitle' => 'required|max:100',
            'content' => 'required|max:500',
        ];
    }
}
