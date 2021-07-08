<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    var $data = "";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {   
        $this->data = $data; 
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        print_r($this->data); die; 

        return $this->markdown('emails.welcome')->subject('Thanks for Your Application!')->with($this->data);
    }
}
