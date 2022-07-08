<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Env;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\models\people;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Data
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @var data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from=\Config::get('mail.from');
        return $this->from($from['address'])
            ->view('mails.html')
            ->text('mails.plain');
    }
}