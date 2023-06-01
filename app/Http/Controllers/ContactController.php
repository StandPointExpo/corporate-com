<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $lang = app()->getLocale();

        $contact = Contact::whereHas('language', function ($query) use ($lang) {
            $query->where('name', $lang);
        })->latest()->first();

        return view('contacts', compact('contact'));
    }
}
