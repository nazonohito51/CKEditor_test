<?php

namespace App\Http\Requests;

class TestRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|between:3,13|reservedUrl',
            'email' => 'required|validMailDomain'
        ];
    }

    public function messages()
    {
        return [
            'name.reserved_url' => 'このブログURLは使用できません。',
            'email.valid_mail_domain' => 'このメールアドレスは使用できません。',
        ];
    }
}
