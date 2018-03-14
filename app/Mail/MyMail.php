<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class MyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email_body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_body)
    {
        $this->email_body = $email_body;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('coucou@laravel.dev')
            ->view('pages.email.myMail');
    }
}
