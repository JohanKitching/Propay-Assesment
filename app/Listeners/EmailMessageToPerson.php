<?php

namespace App\Listeners;

use App\Events\PersonAdded;
use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailMessageToPerson
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PersonAdded  $event
     * @return void
     */
    public function handle(PersonAdded $event)
    {
        /// Data for e-mail
        $objMail = new \stdClass();
        $objMail->name = $event->request->name;
        $objMail->surname = $event->request->surname;
        $objMail->email = $event->request->email;
        $objMail->action = $event->request->mailAction;
        //send mail
        Mail::to($event->request->email)->send(new SendEmail($objMail));

    }
}
