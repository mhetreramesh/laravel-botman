<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

/*
$botman->hears('Hi', function ($bot) {
    $user = $bot->getUser();
    $bot->reply('Hello '.$user->getFirstName().' '.$user->getLastName());
    $bot->reply('Hello '.$user->getEmail());
    $bot->reply('Your username is: '.$user->getUsername());
    $bot->reply('Your ID is: '.$user->getId());
});
*/

use BotMan\BotMan\Middleware\ApiAi;

$dialogflow = ApiAi::create('45dbd332fb6c42b5bf37fcad5fa3e819')->listenForAction();

// Apply global "received" middleware
$botman->middleware->received($dialogflow);

// Apply matching middleware per hears command
$botman->hears('try', function (\BotMan\BotMan\BotMan $bot) {
    // The incoming message matched the "my_api_action" on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];

    $bot->reply("Testing");
})->middleware($dialogflow);

$botman->hears('Hi', BotManController::class.'@startConversation');

$botman->hears('start-health-check', \App\Http\Controllers\THCController::class.'@nextQuestion');

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});