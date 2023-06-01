<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Requests\Admin\AdminContactUpdateRequest;
use App\Http\Traits\Responseable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    use Responseable;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::with('language')->get();
        return view('admin.modules.contacts.index', compact('contacts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $contact = new Contact();
        $contact->load('language');
        return view('admin.modules.contacts.create', compact('contact'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Contact $contact)
    {
        $contact->load('language');
        return view('admin.modules.contacts.edit', compact('contact'));
    }


    /**
     * @param AdminContactUpdateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(AdminContactUpdateRequest $request)
    {
        $contact = new Contact();
        $contact = $contact->create($request->only([
            'name',
            'address',
            'email',
            'language_id'
        ]));
        $contact->phones()->delete();
        $phones = collect($request->phones);
        $phones->each(function ($phone) use ($contact) {
            $contact->phones()->create([
                'phone' => $phone
            ]);
        });
        return redirect(route('admin.contacts.edit', ['contact' => $contact]))
            ->with('success', 'Success.');
    }


    /**
     * @param Contact $contact
     * @param AdminContactUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, AdminContactUpdateRequest $request)
    {
        $contact->update($request->only([
            'name',
            'address',
            'email',
            'language_id'
        ]));
        $contact->phones()->delete();
        $phones = collect($request->phones);
        $phones->each(function ($phone) use ($contact) {
            $contact->phones()->create([
                'phone' => $phone
            ]);
        });
        return $this->backSuccess();
    }

    public function destroy(Contact $contact)
    {
        $contact->phones()->delete();
        $contact->delete();
        return $this->backSuccess();
    }

}
