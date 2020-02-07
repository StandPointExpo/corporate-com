<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Traits\Responseable;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use Responseable;

    public function send(FeedbackRequest $request)
    {
        \Mail::to(env('MAIL_TO_ADDRESS'))->send(new FeedbackMail(collect($request->validated())));

        return $this->backSuccess(); //todo make custom mail message
    }
}
