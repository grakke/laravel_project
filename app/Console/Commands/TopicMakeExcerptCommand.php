<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TopicMakeExcerptCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topics:excerpt';

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
     * @return mixed
     */
    public function handle()
    {
        echo 'hello world';exit;
        //
        //        $topics = Topic::all();
        //        $transfer_count = 0;
        //
        //        foreach ($topics as $topic) {
        //            if (empty($topic->excerpt))
        //            {
        //                $topic->excerpt = Topic::makeExcerpt($topic->body);
        //                $topic->save();
        //                $transfer_count++;
        //            }
        //        }
        //        $this->info("Transfer old data count: " . $transfer_count);
        //        $this->info("It's Done, have a good day.");
    }
}
