<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'contents' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'contents.required' => '内容不能为空',
            'contents.min:2'=>'错误~~内容必须是一个字符以上'
        ];
    }
}
