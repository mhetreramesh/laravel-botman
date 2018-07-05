<?php

namespace App\Http\Controllers;

use BotMan\Drivers\Slack\SlackDriver;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class BotmanController extends Controller
{
    public function index(Request $request)
    {
        $config = [
             "slack" => [
                "token" => "xoxb-171989755222-394318306262-Y2RPxUQr7gey5rYPBopQtTZz"
             ]
        ];

        DriverManager::loadDriver(SlackDriver::class);

        $botman = BotManFactory::create($config);

        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });

        $botman->listen();

    }

    public function post(Request $request)
    {
        echo 'challenge';
    }
}
