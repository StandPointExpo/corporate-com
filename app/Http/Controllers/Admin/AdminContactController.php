<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Traits\Responseable;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    use Responseable;

    public function index()
    {
        $contact = Contact::firstOrCreate(['name' => 'standpoint.com.ua']);
        return view('admin.modules.contacts.index', compact('contact'));
    }

    public function update(Contact $contact, Request $request) //TODO CONTACT REQUEST
    {
        $contact->update($request->only(['address', 'email', 'phone']));
        return $this->backSuccess();
    }

}
