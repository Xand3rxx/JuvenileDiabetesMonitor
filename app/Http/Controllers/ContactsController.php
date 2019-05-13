<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Notifications\SendContactNotification;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;

class ContactsController extends Controller
{
    // Get index Page(/)
    public function getIndex(){
        return view('contact.index');
    }

    // Send email from Contact Us page(/)
    public function sendEmail(Request $request){
        // return view('contact.sendEmail');

        $this->validate($request, [
            'fullname' => 'required|max:255|string',
            'email' => 'required|email|max:255',
            'message' => 'required'
        ]);

        Notification::route('mail', 'test@gmail.com')
                    ->notify(new SendContactNotification($request));

        Session::flash('success', 'Email was sent successfully');

        //Show field values
        // return $request;

        return redirect()->route('pages.index');
    }
}
