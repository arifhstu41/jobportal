<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Verify extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Payment Verification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $response = Http::get(route('payment.verify.cron'));
        $this->info("Success");
    }
}
