<?php

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('logs:clear', function() {
  exec('echo "" > ' . storage_path('logs/laravel.log'));
  $this->info('Logs have been cleared');
})->describe('Clear log files');

Schedule::command('model:prune')->yearly();