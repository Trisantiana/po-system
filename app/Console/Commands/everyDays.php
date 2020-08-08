<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\ListWebsite;


class everyDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'days:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update expired_at setiap hari';

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
        $listWebsite = ListWebsite::all();
        foreach ($listWebsite as $key => $listWebsite) {
            $storedProcedure = DB::select("call web_expired(".$listWebsite->id.")")->daily();
        }

        echo "Website Update Succesfully";
    }
}
