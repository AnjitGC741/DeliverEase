<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact-us');
    }

    public function sendEmail(Request $request)
    {
    $details = [
        'name' => $request->name,
        'email'=> $request->email,
         'phone'=> $request->phone,
         'msg' => $request->msg
    ];
    
       if($this->isOnline()){
        $mail_data = [
            'recipient' => 'bjcrest123@gmail.com',
            'fromEmail' =>$request->name,
            'fromName' =>$request->name,
            'subject'=>$request->subject,
            'body'=>$request->message
    
   ];
   \Mail::send('email-template',$mail_data, function($message) use($mail_data){
    $message->to($mail_data['reciepent'])
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
}



  //public function isOnline($site = "https://youtube.com/"){
    if(@fopen($site,"r")){
        return true;
   }else{
   return false;
  }
//}
    







