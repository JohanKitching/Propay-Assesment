<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\People;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send($id)
    {
        $people=people::find($id);
        $objMail = new \stdClass();
        $objMail->name = $people->name;
        $objMail->surname = $people->surname;;
        $objMail->email = $people->email;;

        Mail::to($people->email)->send(new SendEmail($objMail));
    }
}