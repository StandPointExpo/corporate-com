<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactPhone;
use Illuminate\Http\Request;

class BriefController extends Controller
{
    public function create()
    {
        $phones = ContactPhone::all();
        $contact = Contact::first();
        return view('briefs.create', compact('contact', 'phones'));
    }
}
