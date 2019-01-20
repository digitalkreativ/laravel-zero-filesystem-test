<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Storage;
use LaravelZero\Framework\Commands\Command;

class TestCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'test {mode}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Test with filesystem storing with Storage facade';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        try {
            $this->info('Write file using just Storage ' );
            Storage::put('test-local.txt', 'Test Local ' . time() . PHP_EOL );
        } catch ( \Exception $ex ){
            $this->error( __CLASS__ . ' ' . __FUNCTION__ . ' - ' . $ex->getMessage() );
        }

        try {

            $this->info('Write file to current working directory using Storage and disk "cwd"');
            Storage::disk('cwd')->put('test-cwd.txt', 'Test ' . time() . PHP_EOL);
        } catch ( \Exception $ex ){
            $this->error( __CLASS__ . ' ' . __FUNCTION__ . ' - ' . $ex->getMessage() );
        }

        $this->info('DONE');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
