<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailReply;
use App\Mail\RequestMember;
use App\Mail\DirectRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Contact;
use App\RequestManager;
use File;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index', 'sendRequest']);
    }

    public function index(){
        if (app()->getLocale() == 'en') {
            $manager = RequestManager::select(['id', 'title', 'role', 'email', 'img_url'])->where('type', 'contactus')->first();

        }else{
            $manager = RequestManager::select(['id', 'title_ar as title', 'role_ar as role', 'email', 'img_url'])->where('type', 'contactus')->first();            
        }
        return view('frontend.contactus', ['manager'=> $manager]);
    }
    /**
     * Show requested contact list
     */
    public function show()
    {
        # code...
        $contacts = Contact::all();
        return view('backend.contactlist', ['contacts'=>$contacts]);
    }

    /**
     * delete requested contact
     */
    public function destroy($id)
    {
        # code...
        $contact = Contact::find($id);
        // File::delete(public_path($contact->cv_path));
        $contact->delete();
        return response()->json('success');
    }


    /**
     * Send request to Aqleh
     */
     public function sendRequest(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'cv_file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            $contact = new Contact();
            $ext = $request->cv_file->extension();
            $name = $request->file('cv_file')->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $unique = Str::random(7);
            $request->file('cv_file')->move(public_path('contacts/'.$request->email.'/'), $name.$unique.'.'.$ext);
            $file_path = 'contacts/'.$request->email.'/'.$name.$unique.'.'.$ext;
            $contact->cv_path = $file_path;
            $contact->cv_url = asset($file_path);

            $contact->fullname = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();
            Mail::to(config('mail.to'))->send(new RequestMember($request->name, $request->email, $request->message, public_path($contact->cv_path)));
            if (Mail::failures()) {
                  return response()->json(false);
            }else{
                  return response()->json(true);
            }   
        }            
     }
    /**
     * Send direct request to dealer
     */
     public function sendDirectRequest(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=>$validator->errors()]);
        }else{
            Mail::to($request->mail_to)->send(new DirectRequest($request->fullname, $request->email, $request->message, public_path($contact->cv_path)));
            if (Mail::failures()) {
                  return response()->json(false);
            }else{
                  return response()->json(true);
            }
        }            
     }

    /**
     * Send reply to contactor
     */

     public function sendReply(Request $request, $id)
     {
         # code...
         $contact = Contact::find($id);
         Mail::to($contact->email)->send(new MailReply($request->subject, $request->message));
    
         if (Mail::failures()) {
              return response()->json(false);
         }else{
              return response()->json(true);
        }   
     }
}
 