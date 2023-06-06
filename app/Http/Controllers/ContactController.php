<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Contactform;

use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('contact');
    }


public function AdminContact(){

$contacts = Contact::all();
   return view('admin.contact.index',compact('contacts')); 
}


public function ContactAdd(){
    return view('admin.contact.create'); 
}

 public function StoreContact(Request $request){

    $validated = $request->validate([
        'email' => 'required',
        'phone' => 'required|min:10|max:10',
        'address' => 'required|min:10',
    ]);

    Contact::insert([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'created_at' => Carbon::now()
    ]);
return Redirect()->route('admin.contact')->with('success', 'Contact inserted Successfully');

 }


public function EditAdminContact($id){
    $contact=Contact::find($id);
return view('admin.contact.edit',compact('contact'));
}

public function UpdateContact(Request $request,$id){
    $validated = $request->validate([
        'email' => 'required',
        'phone' => 'required|min:10|max:10',
        'address' => 'required|min:10',
    ]);

    $update = Contact::find($id)->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
}

public function DeleteContact($id){
    $delete = Contact::find($id)->delete();

    return Redirect()->back()->with('success', 'Contact Deleted Successfully');
}



public function Contact (){

    $contacts = Contact::get()->first();
return view('pages.contact',compact('contacts'));
}


public function ContactForm(Request $request){

    $validated = $request->validate([
        'name'=>'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);

    Contactform::insert([
        'name'=>$request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
    ]);
return Redirect()->route('contact')->with('success', 'Message Send Successfully');

}


public function AdminMessage(){

$messages = Contactform::all();
return view('admin.contact.message',compact('messages'));

}


}


