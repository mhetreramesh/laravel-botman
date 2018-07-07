<?php

namespace App\Http\Controllers;

use App\Conversations\THCQuestionConversation;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class THCController extends Controller
{
    public function sendQuestion()
    {
        $botman = app('botman');
        $users = ['U5201HPF1', 'U50FGMEC8'];
        foreach($users as $userId) {
            $botman->startConversation(new THCQuestionConversation(), $userId, \BotMan\Drivers\Slack\SlackDriver::class);
        }
    }

    public function nextQuestion(BotMan $bot)
    {
        $bot->startConversation(new THCQuestionConversation());
    }

    /**
     * Catch slack command 'lets-send-health'
     */
    public function sendMyQuestion()
    {
        $botman = app('botman');
        $users = ['U5201HPF1', 'U50FGMEC8'];
        foreach($users as $userId) {
            $botman->startConversation(new THCQuestionConversation(), $userId, \BotMan\Drivers\Slack\SlackDriver::class);
        }
    }
}
