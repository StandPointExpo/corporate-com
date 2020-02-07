<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Requests\Admin\AdminContactUpdateRequest;
use App\Http\Traits\Responseable;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    use Responseable;

    public function index()
    {
        $contact = Contact::firstOrCreate(['name' => 'standpoint.com.ua']);
        return view('admin.modules.contacts.index', compact('contact'));
    }

    public function update(Contact $contact, AdminContactUpdateRequest $request)
    {
        $contact->update($request->only(['address', 'email', 'phone']));
        return $this->backSuccess();
    }

}
