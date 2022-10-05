<?php

namespace App\Console\Commands;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $maildata = ["name"=> 'Ali Tahir',"dob"=>'17/5/2003'];
        
            Mail::to("Ali@example.com")->send(new WelcomeMail($maildata));
            
        return 0;
    }
}
