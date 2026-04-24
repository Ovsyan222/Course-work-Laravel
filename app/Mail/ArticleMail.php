<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))
            ->to('ovsyannikov.danila@internet.ru')
            ->with('article', $this->article)
            ->view('mail.article');
    }
}
