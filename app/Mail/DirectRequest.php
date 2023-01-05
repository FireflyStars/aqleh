<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DirectRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname ;
    public $email;
    public $msg;
    public $company;
    public $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $company, $phone, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
        $this->company = $company;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.direct')
                    ->subject('direct request')
                    ->with(['name'=> $this->name, 'email'=>$this->email, 'msg'=> $this->msg , 'company'=> $this->company, 'phone'=> $this->phone]);
    }
}
