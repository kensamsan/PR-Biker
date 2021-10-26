<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CancelTravelPassApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'applications:cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel all travel pass application.';

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
        //
        DB::table('travel_passes')->whereNotIn('status',['cancelled','released','rejected'])->whereDate('departure_date','<',\Carbon\Carbon::now())->update(['status' => 'cancelled']);
    }
}
