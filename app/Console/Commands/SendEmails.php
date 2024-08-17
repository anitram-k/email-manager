<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\EmailRepositoryInterface;

class SendEmails extends Command {

    /**
     * The email repository instance.
     *
     * @var \App\Repositories\EmailRepositoryInterface
     */
    protected $emailRepository;

    /**
     * EmailController constructor.
     *
     * @param \App\Repositories\EmailRepositoryInterface $emailRepository
     */
    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        parent::__construct();
        $this->emailRepository = $emailRepository;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = $this->emailRepository->select();

        foreach ($emails as $email) {
            
            $this->emailRepository->update($email->id, ['sent_count' => $email->sent_count + 1]);
        }

    }
}
