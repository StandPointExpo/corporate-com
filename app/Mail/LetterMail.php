<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class LetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $feedbackName;
    public $feedbackEmail;
    public $feedbackSubject;
    public $feedbackText;


    /**
     * FeedbackMail constructor.
     * @param Collection $data
     */
    public function __construct(Collection $data)
    {
        $this->feedbackText     = $data->get('message');
        $this->feedbackSubject  = $data->get('subject');
        $this->feedbackEmail    = $data->get('email');
        $this->feedbackName     = $data->get('name');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address', Contact::defaultMail()->first()->email))
            ->subject('Feedback message from standpoint.com.ua')
            ->view('emails.feedback');
    }
}
