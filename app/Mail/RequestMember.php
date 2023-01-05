<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestMember extends Mailable
{
    use Queueable, SerializesModels;

    private $name ;
    private $email;
    private $msg;
    private $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $msg, $attach)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
        $this->attach = $attach;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
                    ->subject('Requested Member')
                    ->with(['name'=> $this->name, 'email'=>$this->email, 'msg'=> $this->msg])
                    ->attach($this->attach, [
                            'as' => 'career.pdf',
                            'mime' => 'application/pdf',
                            ]);
    }
}
