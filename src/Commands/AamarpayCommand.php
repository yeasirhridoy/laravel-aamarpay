<?php

namespace Yahrdy\Aamarpay\Commands;

use Illuminate\Console\Command;

class AamarpayCommand extends Command
{
    public $signature = 'aamarpay';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
