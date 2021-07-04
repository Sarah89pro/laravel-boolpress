<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    //Save Contacts on DB and notify with email
    public function store(Request $request) {
        //Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=> $validator->errors()]);
        }

        $data = $request->all();

        //Instance
        $new_contact = new Contact();

        //population
        $new_contact->fill($data); //fillable

        //Save on DB
        $new_contact->save();

        //Send email to admin
        Mail::to('admin@site.it')->send(new ContactMessage($data));



        return response()->json($data);
    }
}
