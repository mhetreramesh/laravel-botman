<?php

namespace App\Http\Controllers;

use App\Conversations\THCQuestionConversation;
use App\Conversations\ExampleConversation;

class ClientController extends Controller
{
    public function accountDetails()
    {
        $botman = app('botman');
        $users = ['U5201HPF1', 'U50FGMEC8'];
        foreach($users as $userId) {
            $botman->startConversation(new THCQuestionConversation(), $userId, \BotMan\Drivers\Slack\SlackDriver::class);
        }
    }
}
