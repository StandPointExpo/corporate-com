<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\LetterRequest;
use App\Http\Traits\Responseable;
use App\Mail\LetterMail;
use App\GuestLetter;

class LetterController extends Controller
{
    use Responseable;

    public function send(LetterRequest $request)
    {

        $this->sendAndStoreLetter($request->validated());

        return redirect()->to(url()->previous() . '#bottomMessageBlock')->with('success', __('ui.send_success')); //todo make custom mail message
    }

    /**
     * @param array $letter
     * @return mixed
     */
    protected function sendAndStoreLetter(array $letter)
    {

        GuestLetter::create($letter);
        return  \Mail::to(env('MAIL_TO_ADDRESS', $this->getDefaultMail()))->send(new LetterMail(collect($letter)));
    }

    /**
     * @return string
     */
    private function getDefaultMail() :string
    {
        return Contact::defaultMail()->first()->email;
    }
}
