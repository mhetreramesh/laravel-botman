<?php

use Illuminate\Foundation\Inspiring;

$botman = resolve('botman');

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('send', function () use($botman) {
    $message = BotMan\BotMan\Messages\Outgoing\OutgoingMessage::create('Just for Fun');
    $botman->say($message, 'U5201HPF1', \BotMan\Drivers\Slack\SlackDriver::class);
})->describe('Send test message');
