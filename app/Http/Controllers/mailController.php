<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class mailController extends Controller
{
    private function getRules()
    {
        return [
            'from_email' => 'email',
            'from_name' => 'min:1|max:998',
            'to_email' => 'required|array',
            'to_email.*' => 'email',
            'to_name' => 'min:1|max:998',
            'subject' => 'required|min:1|max:998', // client can see about 60-70
            'body' => 'required|min:1|max:384000',
            'BCC' => 'array',
            'BCC.*' => 'email',
            'CC' => 'array',
            'CC.*' => 'email',
        ];
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), $this->getRules());

        if ($validator->fails()) {
            return $this->jsonResponse(['result' => 'Validation error', 'data' => $validator->errors()->messages()], 400);
        }

        $from_email = $request['from_email'] ?? env('MAIL_USERNAME');
        $from_name = $request['from_name'] ?? '';
        $to_email = $request['to_email'];
        $to_name = $request['to_name'];
        $subject = $request['subject'];
        $body = $request['body'];
        $bcc = $request['bcc'];
        $cc = $request['cc'];


        try {
            Mail::send('email.test', [], function ($message)
            use ($from_email, $from_name, $to_email, $to_name, $subject, $body, $bcc, $cc) {

                $message->to($to_email, $to_name)->subject($subject);
                $message->cc($cc);
                $message->bcc($bcc);
                $message->from($from_email, $from_name);
            });

            if (Mail::failures())
                throw new \Exception(Mail::failures());

            return $this->jsonResponse(['result' => 'good']);

        } catch (\Exception $e) {
            return $this->jsonResponse(['result' => 'Error', 'data' => $e->getMessage()], 400);
        }
    }
}
