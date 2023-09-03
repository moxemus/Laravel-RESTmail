<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(MailRequest $request): JsonResponse
    {
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

            if (Mail::failures()) {
                throw new \Exception(Mail::failures());
            }

            return $this->returnResponseOK();

        } catch (\Exception $e) {
            return $this->returnResponseError($e->getMessage());
        }
    }
}
