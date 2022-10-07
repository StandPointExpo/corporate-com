<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Requests\Admin\AdminContactUpdateRequest;
use App\Http\Traits\Responseable;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    use Responseable;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contact = Contact::firstOrCreate(['name' => 'standpoint-expo.com']);
        return view('admin.modules.contacts.index', compact('contact'));
    }

    /**
     * @param Contact $contact
     * @param AdminContactUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, AdminContactUpdateRequest $request)
    {
        $contact->update($request->only(['address', 'email']));
        $contact->phones()->delete();
        $phones = collect($request->phones);
        $phones->each(function ($phone) use ($contact) {
            $contact->phones()->create([
                'phone' => $phone
            ]);
        });
        return $this->backSuccess();
    }

}
