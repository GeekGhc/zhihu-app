<?php


namespace App\Mailer;

use Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template,$email,array $data)
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message)  use($email){
            $message->from('gehuachun@outlook.com', 'JellyBean');

            $message->to($email);
        });
    }
}