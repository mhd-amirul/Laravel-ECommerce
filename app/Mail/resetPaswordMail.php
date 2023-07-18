<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPaswordMail extends Mailable 
// implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Hello@SingleEcommerce.com', "no reply")
                    ->subject("Reset Pasword Verification")
                    ->view('mail.ResetPassword')
                    ->with([
                        "uri"  => $this->item["uri"],
                        "name" => $this->item["name"]
                    ]);
    }
}
