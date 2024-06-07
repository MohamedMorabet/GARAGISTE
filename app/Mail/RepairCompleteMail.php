<?php
// app/Mail/RepairCompleteMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RepairCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $repair;
    public $invoice;

    public function __construct($data)
    {
        $this->repair = $data['repair'];
        $this->invoice = $data['invoice'];
    }

    public function build()
    {
        return $this->markdown('emails.repair_complete')
                    ->with([
                        'repair' => $this->repair,
                        'invoice' => $this->invoice,
                    ]);
    }
}
