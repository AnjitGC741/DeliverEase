<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // return view('contact-us');
    }

    public function sendEmail(Request $request)
    {
        
        // $details = [
        //     'name' => $request->name,
        //     'email'=> $request->email,
        //     'phone'=> $request->phone,
        //     'message' => $request->message
        // ];
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
        ]);
        $from = 'test@gmail.com';
        if($this->isOnline()){
            $mail_data = [
                'recipient' => 'bjcrest123@gmail.com',
                'fromEmail' =>"test@gmail.com",
                'fromName' =>$request->name,
                'subject'=>'test subject',
                'body'=>$request->message
            ];
            \Mail::send('email-template',$mail_data, function($message) use($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['fromEmail'],$mail_data['fromName'])
            ->subject($mail_data['subject']);
            });
            return redirect()->back()->with('Success','Email sent!');
        }else{
            return redirect()->back()->withInput()->with('error','Check your Internet Connection');
        }
    Mail::to('bjcrest123@gmail.com')->send(new ContactMail($details));
    return back()->with('message_sent','Your message has been sent succesfully!');
    }
    
    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site,"r")){
            return true;
        }else{
            return false;
        }
    }
}


    
<<<<<<< HEAD
    



=======
>>>>>>> ad2316aa223780ce5f995b33185a3bca0aa526fe
    






