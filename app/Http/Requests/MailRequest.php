<?php

namespace App\Http\Requests;

class MailRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_name' => 'min:1|max:998',
            'to_email' => 'required|array',
            'to_email.*' => 'email',
            'to_name' => 'min:1|max:998',
            'subject' => 'required|min:1|max:998',
            'body' => 'required|min:1|max:384000',
            'BCC' => 'array',
            'BCC.*' => 'email',
            'CC' => 'array',
            'CC.*' => 'email',
        ];
    }
}
