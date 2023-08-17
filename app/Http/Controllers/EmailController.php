<?php

namespace App\Http\Controllers;

use App\Mail\EmailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function sendMailWithAttachment(Request $request ,$id)
    {
        $customer_emails =  User::find($id);
        $customer_email =  User::find($id)->email;
        $details = [
            'name' => $customer_emails->name,
            'phone' => $customer_emails->phone,
            'email' => $customer_emails->email,
        ];
        Mail::to($customer_email)->send(new EmailSend( $details));
        return back()->with('success','Email send successfully!');
    }
    public function multipleEmail(Request $request)
    {
        // return print_r($request->check);
        foreach($request->check as $id){
            $customer_emails =  User::find($id);
            $customer_email =  User::find($id)->email;
            $details = [
                'name' => $customer_emails->name,
                'phone' => $customer_emails->phone,
                'email' => $customer_emails->email,
            ];
            Mail::to($customer_email)->send(new EmailSend( $details));
        }
        return back()->with('success','Email send successfully!');
    }
}
