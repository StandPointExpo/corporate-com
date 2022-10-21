<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use App\Contact;

class BriefMail extends Mailable
{
    use Queueable, SerializesModels;

    public $companyName;
    public $companyPerson;
    public $companyNumber;
    public $companyEmail;
    public $briefValue;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $data)
    {
        $this->companyName = $data->get('company_name');
        $this->companyPerson = $data->get('company_person');
        $this->companyNumber = $data->get('company_number');
        $this->companyEmail = $data->get('company_email');
        $this->briefValue = collect($data->all());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('MAIL_TO_ADDRESS', Contact::defaultMail()->first()->email))
        ->subject('=?utf-8?Q?=F0=9F=94=A5?=  New brief')
        ->view('emails.brief');
    }
}
