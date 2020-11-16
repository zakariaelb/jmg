<?php

namespace App\Console\Commands;

use App\Mail\NotifyUserByMail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification by email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$user = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        $data=['title'=> 'Prog', 'body'=> 'php'];
        foreach($emails as $email){
            //how to send email
            Mail::to($email) ->send(new NotifyUserByMail($data));
        }
    }
}
