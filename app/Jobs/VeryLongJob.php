<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleMail;
use App\Models\Article;

class VeryLongJob implements ShouldQueue
{

    /**
     * Create a new job instance.
     */
    protected $article;
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::send(new ArticleMail($this->article));
    }
}
