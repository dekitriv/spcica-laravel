<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends MyController
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return json_encode(Message::all());
        }
        return view('pages.main.contact', $this->data);
    }

    public function store(ContactRequest $request){

        try{
            $contact = Message::create($request->except("_token"));
            return redirect()->route('contact.index')->with('success', 'You have successfully sent a message!');

        } catch (\Exception $e){
            return redirect()->route('contact.index')->with('errorMessage', $e->getMessage());
        }

    }

    public function destroy($id)
    {
        if(Message::destroy($id)){
            return "Successfully deleted";
        }
        return "Error";
    }
}
