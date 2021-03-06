<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CronJob extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cronjob:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update readers, circulations status';

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
     * @return mixed
     */
    public function fire() {
        //update reader status
        $readers = Reader::get();
        $now = Carbon\Carbon::now();
        foreach ($readers as $reader) {
            $diff = $now->diffInDays($reader->expired_at);
            if (!$reader->expired_at->lt($now) && $diff > 0) {
                Reader::where('id', '=', $reader->id)
                    ->update(array('expired' => true));
            }
        }
        $circulations = Circulation::get();
        foreach ($circulations as $circulation) {
            $diff = $now->diffInDays($circulation->expired_at);
            if (!$circulation->expired_at->lt($now) && $diff > 0) {
                Circulation::where('id', '=', $circulation->id)
                    ->update(array('expired' => true));
            }
        }
        //$this->info('Cronjob done');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return array(
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return array(
        );
    }

}
