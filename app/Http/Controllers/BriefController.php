<?php

namespace App\Http\Controllers;

use App\Brief;
use App\Contact;
use App\ContactPhone;
use App\Http\Requests\BriefForm;
use App\Mail\BriefMail;
use Illuminate\Support\Facades\Log;

class BriefController extends Controller
{
    public function create()
    {
        $phones = ContactPhone::all();
        $contact = Contact::first();
        if(is_null($contact)) {
            $contact = [];
            $contact['email'] = '';
            $contact['phone'] = '';
        };

        return view('briefs.create', compact('contact', 'phones'));
    }

    public function store(BriefForm $request)
    {
        try {
            $data = [];
            $data['uuid'] = $request->get('uuid');
            $data['company_name'] = $request->get('company_name');
            $data['company_person'] = $request->get('company_person');
            $data['company_number'] = $request->get('company_number');
            $data['email'] = $request->get('company_email');
            $data['value'] = json_encode($request->all());

            Brief::create($data);
            \Mail::to(env('MAIL_TO_ADDRESS', Contact::defaultMail()->first()->email))->send(new BriefMail(collect($request->all())));
            return redirect()->back()->with('success', 'Success!');
        } catch (\Exception$e) {
            Log::error($e->getMessage());
            Log::info('Brief data' . $request->all());
        }
    }
}
