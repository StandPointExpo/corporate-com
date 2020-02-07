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

        return $this->backSuccess(); //todo make custom mail message
    }

    /**
     * @param array $letter
     * @return mixed
     */
    protected function sendAndStoreLetter(array $letter)
    {
        \Mail::to(env('MAIL_TO_ADDRESS', $this->getDefaultMail()))->send(new LetterMail(collect($letter)));
        return  GuestLetter::create($letter);
    }

    /**
     * @return string
     */
    private function getDefaultMail() :string
    {
        return Contact::defaultMail()->first()->email;
    }
}
